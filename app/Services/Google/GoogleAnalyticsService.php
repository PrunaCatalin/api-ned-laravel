<?php

namespace App\Services\Google;

use App\Services\Google\Tools\GoogleAnalyticsTools;
use Illuminate\Support\Facades\Validator;

class GoogleAnalyticsService
{

    public function execute(array $data, $googleVersion)
    {
        $service = null;
        if ($googleVersion == GoogleVersion::VERSION_V1) {
            $service =  new GoogleAnalyticsUAService();
        } elseif ($googleVersion == GoogleVersion::VERSION_V2) {
            $service = new GoogleAnalyticsGA4Service();
        } else {
            return "No service was found";
        }
         $service
            ->setUa($data['code'])
            ->setUrl($data['url'])
            ->setUrlPage($data['url_page'])
            ->setTitlePage($data['title'])
            ->setLanguage($data['language'])
            ->setCountry($data['country'])
            ->setKeyword($data['keyword'])
            ->setScroll($data['scroll'])
             ->setAgent($service->randomWebAgent())
             ->setStart($data['start']);
        return $service;
    }
}
