<?php

namespace Yanhaoli\TwillDevtools;

use Illuminate\Contracts\Http\Kernel;
use Yanhaoli\TwillDevtools\Http\Middleware\InjectDevtools;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class TwillDevtoolsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerRoutes();
        $this->registerMiddleware(InjectDevtools::class);
        $this->loadViewsFrom(
            __DIR__.'/../resources/views', 'twill-devtools'
        );
    }

    public function register()
    {

    }

    /**
     * Register the package routes.
     *
     * @return void
     */
    private function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
                $this->loadRoutesFrom(__DIR__.'/Http/routes.php');
            }
        );
    }

    /**
     * Register the Devtools Middleware
     *
     * @param  string $middleware
     */
    protected function registerMiddleware($middleware)
    {
        $kernel = $this->app[Kernel::class];
        $kernel->pushMiddleware($middleware);
    }

    /**
     * Get the route group configuration array.
     *
     * @return array
     */
    private function routeConfiguration()
    {
        $supportSubdomainRouting = config('twill.support_subdomain_admin_routing', false);

        $middlewares = [
            'web'
        ];

        $domain = config('twill.admin_app_url');

        if ($supportSubdomainRouting) {
            array_unshift($middlewares, 'supportSubdomainRouting');
            $domain = config('twill.admin_app_subdomain', 'admin') . '.{subdomain}.' . config('app.url');
        }

        return [
            'domain' => $domain,
            'namespace' => 'Yanhaoli\TwillDevtools\Http\Controllers',
            'as' => 'admin.',
            'prefix' => 'twill-devtools',
            'middleware' => $middlewares,
        ];
    }
}

