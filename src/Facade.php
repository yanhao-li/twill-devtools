<?php

namespace Yanhaoli\TwillDevtools;

class Facade extends \Illuminate\Support\Facades\Facade
{
    protected static function getFacadeAccessor()
    {
        return TwillDevtools::class;
    }
}