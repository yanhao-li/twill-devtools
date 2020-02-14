<?php

namespace Yanhaoli\TwillDevtools\Repositories;

class NavigationRepository
{
    public function getNavigations() {
        return config('twill-navigation');
    }
}