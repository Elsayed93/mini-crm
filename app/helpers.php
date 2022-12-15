<?php

use Illuminate\Support\Facades\Route;

if (!function_exists('activeLink')) {
    function activeLink($routeName)
    {
        return Route::currentRouteName()  == $routeName ? 'active' : '';
    }
}
