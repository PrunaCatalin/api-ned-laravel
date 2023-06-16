<?php

/*
 * salesforce-laravel | AppConfigServices.php
 * https://www.webdirect.ro/
 * Copyright 2022 Pruna Catalin Costin
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 12/28/2022 4:26 PM
*/

namespace App\Services;

use App\Models\App\AppConfig;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redis;

class AppConfigServices
{

    public static function getSettings(string $key)
    {
        $redis = session($key);
        if ($redis) {
            return json_decode(Crypt::decrypt($redis), true);
        }
        $model = AppConfig::where("slug", $key)->first();
        if ($model) {
            return json_decode(Crypt::decrypt($model->settings), true);
        }
        return false;
    }
}
