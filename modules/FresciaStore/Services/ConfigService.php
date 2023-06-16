<?php
/*
 * webdirect | ConfigService.php
 * https://www.webdirect.ro/
 * Copyright 2023 Pruna Catalin Costin
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 5/12/2023 5:30 PM
*/

namespace Modules\FresciaStore\Services;

use App\Models\App\AppConfig;

class ConfigService
{
    public function getCompanyData()
    {
        return json_decode(AppConfig::select('settings')->where("slug", "company_details")->first()->settings);
    }

    public function getGoogleData()
    {
        return json_decode(AppConfig::select('settings')->where("slug", "google")->first()->settings);
    }
}
