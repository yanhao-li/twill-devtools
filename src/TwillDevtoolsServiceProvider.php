<?php

namespace Yanhaoli\TwillDevtools;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class TwillDevtoolsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerRoutes();
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
        });
    }

    /**
     * Get the route group configuration array.
     *
     * @return array
     */
    private function routeConfiguration()
    {
        return [
            'domain' => null,
            'namespace' => 'Yanhaoli\TwillDevtools\Http\Controllers',
            'prefix' => 'twill-devtools',
            'middleware' => null,
        ];
    }
}

