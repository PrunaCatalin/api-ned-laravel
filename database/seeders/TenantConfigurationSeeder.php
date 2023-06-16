<?php

namespace Database\Seeders;

use App\Models\Tenants\TenantConfiguration;
use Illuminate\Database\Seeder;

class TenantConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Used like this because model will encrypt default values
        $import = new TenantConfiguration();
        $import->domain_id = 1;
        $import->endpoint = env("APP_URL");
        $import->username = "test_username";
        $import->password = "test_password";
        $import->secret = "test_secret";
        $import->tenant_type = "demo";
        $import->save();
    }
}
