<?php

/*
 * salesforce-laravel | PersonalAccessToken.php
 * https://www.webdirect.ro/
 * Copyright 2022 Pruna Catalin Costin
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 11/13/2022 11:21 AM
*/

namespace App\Models\Users;

use Laravel\Sanctum\PersonalAccessToken as Model;

class PersonalAccessToken extends Model
{
    protected $casts = [
        'abilities' => 'json',
        'last_used_at' => 'datetime',
        'expires_at' => 'datetime'
    ];

    protected $fillable = [
        'name',
        'token',
        'abilities',
        'expires_at'
    ];
}
