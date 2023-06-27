<?php
/*
 * API NED CURIER | TenantApiServices.php
 * https://www.webdirect.ro/
 * Copyright 2022 Pruna Catalin Costin
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 10/30/2022 10:55 AM
*/

namespace App\Services\Tenant;

use App\Models\Tenants\TenantConfiguration;

class TenantApiServices
{
    /**
     * @var string|null
     */
    private ?string $endpoint;
    /**
     * @var string|null
     */
    private ?string $username;
    /**
     * @var string|null
     */
    private ?string $password;
    /**
     * @var string|null
     */
    private ?string $secret;


    public function __construct(TenantConfiguration $tenantConfiguration)
    {
        $this->endpoint = $tenantConfiguration->endpoint;
        $this->username = $tenantConfiguration->username;
        $this->password = $tenantConfiguration->password;
        $this->secret   = $tenantConfiguration->secret;
    }


    public function response()
    {

       //return (new TenantResponse($status, $response, $info, $request, $requestBody));
    }
}
