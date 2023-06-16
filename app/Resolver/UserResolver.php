<?php

/*
 * salesforce_laravel | UserResolver.php
 * https://www.webdirect.ro/
 * Copyright 2022 Pruna Catalin Costin
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 10/8/2022 6:44 PM
*/

namespace App\Resolver;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use App\Models\Users\User;

class UserResolver implements  \OwenIt\Auditing\Contracts\UserResolver
{
    /**
     * {@inheritdoc}
     */
    public static function resolve()
    {
        $guards = Config::get('audit.user.guards', [
            'web',
            'api',
        ]);
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return  Auth::guard($guard)->user();
            } else {
                return User::find(config('userid', null));
            }
        }
    }
}
