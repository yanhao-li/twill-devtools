<?php

namespace Yanhaoli\TwillDevtools\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Routing\Controller;

class AssetsController extends Controller
{
    protected $files;

    public function __construct(Filesystem $files)
    {
        $this->files = $files;
    }

    public function js() {
        $content = $this->files->get(__DIR__ . '/../../../dist/main.js');
        return new Response(
            $content, 200, [
                'Content-Type' => 'text/javascript',
            ]
        );
    }
}