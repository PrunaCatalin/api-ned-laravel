<?php

namespace Database\Seeders;

use App\Models\Tenant;
use App\Models\Users\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        if (env('APP_ENV') == "local") {
            $primaryDomain = env('APP_HOSTNAME_LOCAL');
            $tenant = Tenant::create(['id' => Str::slug($primaryDomain, "")]);
            $tenant->domains()->create(['domain' => $primaryDomain]);
        } else {
            $primaryDomain = env('APP_HOSTNAME');
            $tenant = Tenant::create(['id' => Str::slug($primaryDomain, "")]);
            $tenant->domains()->create(['domain' => $primaryDomain]);
        }
    }
}
