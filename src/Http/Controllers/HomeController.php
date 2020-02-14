<?php

namespace Yanhaoli\TwillDevtools\Http\Controllers;

use Closure;
use Illuminate\Support\Str;
use Illuminate\Routing\Route;
use Illuminate\Routing\Router;
use Illuminate\Routing\Controller;
use Yanhaoli\TwillDevtools\Repositories\RouteRepository;
use Yanhaoli\TwillDevtools\Repositories\NavigationRepository;
use A17\Twill\Repositories\UserRepository;

class HomeController extends Controller
{
    protected $routeRepository;
    protected $userRepository;

    public function __construct(
        RouteRepository $routeRepository, 
        UserRepository $userRepository,
        NavigationRepository $navigationRepository
    ) {
        $this->routeRepository = $routeRepository;
        $this->userRepository = $userRepository;
        $this->navigationRepository = $navigationRepository;
    }

    /**
     * Display the Telescope view.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userRepository->all();
        $routes = $this->routeRepository->getRoutes();
        $navigations = $this->navigationRepository->getNavigations();
        return view('twill-devtools::layout', [
            'users' => $users,
            'routes' => $routes,
            'navigations' => $navigations
        ]);
    }
}