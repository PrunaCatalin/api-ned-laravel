<?php

/*
 * salesforce_laravel | SalesforceApiActionsService.php
 * https://www.webdirect.ro/
 * Copyright 2022 Pruna Catalin Costin
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 10/13/2022 11:47 PM
*/

namespace App\Services\Salesforce;

use App\Models\Salesforce\SalesforceAccessTokens;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class SalesforceApiActionsService extends SalesforceApiServices
{
    private array $ignoreCreateFields = [
      "Id", "LastModifiedDate", "BadgeText", "IsProfilePhotoActive", "UserType", "LastPasswordChangeDate",
        "SmallPhotoUrl", "SmallBannerPhotoUrl", "SystemModstamp", "AccountId",
        "LastLoginDate", "IsExtIndicatorVisible", "Name", "CreatedById", "LastViewedDate",
        "CreatedDate", "OutOfOfficeMessage", "LastReferencedDate", "OfflineTrialExpiration",
        "OfflineTrialExpirationDate", "Url_Platform__c", "Address", "NumberOfFailedLogins",
        "FullPhotoUrl", "MediumBannerPhotoUrl", "BannerPhotoUrl", "MediumPhotoUrl",
        "OfflinePdaTrialExpirationDate", "LastModifiedById" , "Nickname"
    ];
    /**
     * @param string $id
     * @return mixed
     * @throws GuzzleException
     */
    public function cloneUser(array $data)
    {
        $response = ['success' => false , "errors" => [], "body" => []];
        try {
            $getUserInfo = $this->getInfoUser("services/data/" . $this->version  . "/sobjects/User/" . $data['idUser']);
            foreach ($this->ignoreCreateFields as $ignoreItem) {
                unset($getUserInfo->{$ignoreItem});
            }
            $getUserInfo->FirstName = $data['firstName'];
            $getUserInfo->LastName = $data['lastName'];
            $getUserInfo->Email = $data['email'];
            $getUserInfo->Username = $data['email'];
            if (preg_match("/(.*?)\@/", $data['email'], $match)) {
                if (sizeof($match) == 2) {
                    $getUserInfo->CommunityNickname = $match[1];
                }
            }
            $getUserInfo->Alias = substr($getUserInfo->LastName, 0, 1) .
                substr($getUserInfo->FirstName, 0, 3);
            try {
                $responseCall = $this->client->post('services/data/' . $this->version  . '/sobjects/User/', [
                    'headers' => [
                        "Content-Type" => "application/json",
                        "Authorization" => $this->infoToken->token_type . " " . $this->infoToken->access_token,
                    ],
                    'body' => json_encode($getUserInfo)
                ]);
                $response['body'] = json_decode($responseCall->getBody());
                $response['success'] = true;
            } catch (ClientException $ex) {
                $parseError = json_decode($ex->getResponse()->getBody()->getContents());
                $response['errors'][] = $parseError[0]->message;
                Log::channel('slack')->alert("User can't be cloned", $parseError);
                Log::channel('gelf')->alert("User can't be cloned", $parseError);
            }
        } catch (ClientException $ex) {
            $parseError = json_decode($ex->getResponse()->getBody()->getContents());
            $response['errors'][] = $parseError[0]->message;
            Log::channel('slack')->alert("getInfoUser", $parseError);
            Log::channel('gelf')->alert("getInfoUser", $parseError);
        }
        return $response;
    }
}
