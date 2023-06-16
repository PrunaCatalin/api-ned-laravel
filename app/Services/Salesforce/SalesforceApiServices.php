<?php

/*
 * salesforce_laravel | SalesforceApiServices.php
 * Copyright 2022 Pruna Catalin Costin
 * Email : catalin.pruna@rei-d-services.com
 * Type  : PHP
 * Created on : 9/30/2022 2:08 PM
*/

namespace App\Services\Salesforce;

use App\Models\Salesforce\SalesforceAccessTokens;
use App\Services\AppConfigServices;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;

class SalesforceApiServices
{
    /**
     * @var Client
     */
    public Client $client;
    /**
     * @var string
     */
    public string $version;

    /**
     * @var string|mixed
     */
    private string $client_id;

    /**
     * @var string|mixed
     */
    private string $client_secret;

    public ?object $infoToken = null;

    /**
     * SalesforceApiServices constructor.
     */
    public function init()
    {
        $this->infoToken();
        $salesforceApiSettings = AppConfigServices::getSettings("salesforce_api");
        $this->client = new Client(['base_uri' =>
            ($this->infoToken) ? $this->infoToken->instance_url  : $salesforceApiSettings['SALESFORCE_HOST']
        ]);
        $this->version = $salesforceApiSettings['SALESFORCE_VERSION'];
        $this->client_id = $salesforceApiSettings['SALESFORCE_CLIENT_ID'];
        $this->client_secret = $salesforceApiSettings['SALESFORCE_CLIENT_SECRET'];
        return $this;
    }

    /**
     * @param string $email
     * @param string $password
     * @return array
     * @throws GuzzleException
     */
    public function login(string $email, string $password): object
    {
        $response = $this->client->post('services/oauth2/token', [
            RequestOptions::FORM_PARAMS => [
                'grant_type' => 'password',
                'client_id' => $this->client_id,
                'client_secret' => $this->client_secret,
                'username' => $email,
                'password' => $password
            ]
        ]);
        return json_decode($response->getBody());
    }

    /**
     * @param object $sf_data
     * @param int $user_id
     * @return mixed
     */
    public function createToken(object $sf_data, int $user_id)
    {
        //delete old tokens
        $oldToken = SalesforceAccessTokens::where("user_id", $user_id)->first();
        if ($oldToken) {
            $oldToken->delete();
        }
        //create new token
        return SalesforceAccessTokens::create([
            "user_id" => $user_id,
            "access_token" => $sf_data->access_token,
            "instance_url" => $sf_data->instance_url,
            "token_type" => $sf_data->token_type,
            "signature" => $sf_data->signature,
            "profile_id" => $sf_data->id
        ]);
    }

    /**
     * @param int $user_id
     * @return array|mixed
     * @throws GuzzleException
     */
    public function userToken(int $user_id)
    {
        $salesforceToken = SalesforceAccessTokens::where(["user_id" => $user_id])->first();
        $data = [];
        if ($salesforceToken) {
            $response = $this->client->post('/services/oauth2/userinfo', [
                'headers' => [
                    "Content-Type" => "application/json",
                    "Authorization" => $salesforceToken->token_type . " " . $salesforceToken->access_token,
                ]
            ]);
            $data = json_decode($response->getBody());
        }
        return $data;
    }

    /**
     * @return object
     */
    public function infoToken(): ?object
    {
        if (auth('sanctum')->user()) {
            $this->infoToken = SalesforceAccessTokens::with("salesforceUser")
                ->where(["user_id" => auth('sanctum')->user()->id])->first();
        }
        return $this->infoToken;
    }
    /**
     * @throws GuzzleException
     */
    public function allUsers()
    {
        $response = $this->client->get('/services/data/' . $this->version . '/query?q=SELECT+UserName+FROM+User', [
            'headers' => [
                "Content-Type" => "application/json",
                "Authorization" => $this->infoToken->token_type . " " . $this->infoToken->access_token,
            ]
        ]);
        return  json_decode($response->getBody());
    }

    /**
     * @param string $url
     * @return object
     * @throws GuzzleException
     */
    public function getInfoUser(string $url): object
    {
        $response = $this->client->get($url, [
            'headers' => [
                "Content-Type" => "application/json",
                "Authorization" => $this->infoToken->token_type . " " . $this->infoToken->access_token,
            ]
        ]);
        return  json_decode($response->getBody());
    }



}
