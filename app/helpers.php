<?php

use Illuminate\Support\Facades\auth;


if (!function_exists('UserName')) {
    function UserName()
    {
        return auth::user()->name;
    }
}

if (!function_exists('userid')) {
    function userid()
    {
        return auth::user()->id;
    }
}
