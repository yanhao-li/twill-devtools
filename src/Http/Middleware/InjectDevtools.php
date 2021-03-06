<?php

namespace Yanhaoli\TwillDevtools\Http\Middleware;

use Yanhaoli\TwillDevtools\TwillDevtools;
use Closure;

class InjectDevtools
{
    public function __construct(TwillDevtools $devtools)
    {
        $this->devtools = $devtools;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            /** @var \Illuminate\Http\Response $response */
            $response = $next($request);
        } catch (Exception $e) {
            $response = $this->handleException($request, $e);
        } catch (Error $error) {
            $e = new FatalThrowableError($error);
            $response = $this->handleException($request, $e);
        }

        return $this->modifyResponse($request, $response);
    }

    /**
     * Handle the given exception.
     *
     * (Copy from Illuminate\Routing\Pipeline by Taylor Otwell)
     *
     * @param $passable
     * @param  Exception $e
     * @return mixed
     * @throws Exception
     */
    protected function handleException($passable, Exception $e)
    {
        if (! $this->container->bound(ExceptionHandler::class) || ! $passable instanceof Request) {
            throw $e;
        }

        $handler = $this->container->make(ExceptionHandler::class);

        $handler->report($e);

        return $handler->render($passable, $e);
    }

    private function modifyResponse($request, $response)
    {
        $content = $response->getContent();
        // $jsPath = route('admin.twill-devtools.assets.js');
        $jsPath = 'http://localhost:8080/dist/main.js';
        $injectedBody = '<div id="twill-devtools"></div><script type="text/javascript" src="' . $jsPath . '"></script>';
        $pos = strripos($content, '</body>');

        if (false !== $pos) {
            $content = substr($content, 0, $pos) . $injectedBody . substr($content, $pos);
        }

        $response->setContent($content);
        return $response;
    }
}