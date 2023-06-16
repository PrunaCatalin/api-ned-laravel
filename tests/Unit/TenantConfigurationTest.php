<?php

namespace Tests\Unit;

use App\Models\Tenants\TenantConfiguration;
use Tests\TestCase;

class TenantConfigurationTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_createTenantConfiguration(): void
    {
        //TenantConfiguration::truncate();
        //$fake = TenantConfiguration::factory(40)->create();
        $this->assertTrue(true);
    }

    public function test_viewTenantConfig()
    {
        $model = TenantConfiguration::find(rand(1, 40))->toArray();
        $this->output("View credentials", $model);
        $this->assertTrue(true);
    }
    public function test_connectionApiService()
    {
        $model = TenantConfiguration::find(rand(1, 40));
    }
}
