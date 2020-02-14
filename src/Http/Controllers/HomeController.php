<?php

namespace Yanhaoli\TwillDevtools\Http\Controllers;

use A17\Twill\Models\User;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    /**
     * Display the Telescope view.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('twill-devtools::layout', [
            'users' => User::all()
        ]);
    }
}