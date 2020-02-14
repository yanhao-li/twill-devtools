<?php

namespace Yanhaoli\TwillDevtools\Repositories;

use Closure;
use Illuminate\Support\Str;
use Illuminate\Routing\Route;
use Illuminate\Routing\Router;
use Illuminate\Routing\Controller;

class RouteRepository
{
    public function getRoutes() {
        $routes = collect(app(Router::class)->getRoutes())
            ->filter(function ($route) {
                return Str::startsWith($route->getName(), 'admin');
            })
            ->map(function ($route) {
                return $this->getRouteInformation($route);
            })
            ->all();
            
        return $routes;
    }

        /**
     * Get the route information for a given route.
     *
     * @param  \Illuminate\Routing\Route  $route
     * @return array
     */
    protected function getRouteInformation(Route $route)
    {
        return [
            'domain' => $route->domain(),
            'method' => implode('|', $route->methods()),
            'uri'    => $route->uri(),
            'name'   => $route->getName(),
            'action' => ltrim($route->getActionName(), '\\'),
            'middleware' => $this->getRouteMiddleware($route),
        ];
    }

    /**
     * Get before filters.
     *
     * @param  \Illuminate\Routing\Route  $route
     * @return string
     */
    protected function getRouteMiddleware($route)
    {
        return collect($route->gatherMiddleware())->map(function ($middleware) {
            return $middleware instanceof Closure ? 'Closure' : $middleware;
        })->implode(',');
    }

}