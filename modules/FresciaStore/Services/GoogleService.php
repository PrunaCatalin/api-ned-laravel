<?php

/*
 * webdirect | GoogleService.php
 * https://www.webdirect.ro/
 * Copyright 2023 Pruna Catalin Costin
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 5/16/2023 8:34 AM
*/

namespace Modules\FresciaStore\Services;

use GuzzleHttp\Client;

class GoogleService
{
    public function recaptcha($attribute, $value, $parameters, $validator)
    {
        $client = new Client();
        $response = $client->post(
            'https://www.google.com/recaptcha/api/siteverify',
            [
                'form_params' =>
                    [
                        'secret' => env('GOOGLE_CAPTCHA_PRIVATE_KEY',
                            (new ConfigService())->getGoogleData()->captha->secret_key),
                        'response' => $value
                    ]
            ]
        );
        $body = json_decode((string)$response->getBody());
        return $body->success;
    }
}
