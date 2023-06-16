<?php

namespace Database\Factories\Tenants;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tenants\TenantConfiguration>
 */
class TenantConfigurationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = Faker::create();

        return [
            "domain_id" => rand(1, 20),
            "endpoint" => $faker->domainName,
            "username" => $faker->userName,
            "password" => $faker->password,
            "secret" => Str::uuid(),
            "tenant_type" => "demo",
        ];
    }
}
