<?php

namespace Database\Seeders;

use App\Models\Rev\RevMemberCompany;
use App\Models\Rev\RevMembers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class MemberCompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Generare informații pentru fiecare membru
        RevMembers::all()->each(function($member) use($faker) {
            RevMemberCompany::create([
                'member_id' => $member->id,
                'certificate' => $faker->imageUrl(),
                'name' => $faker->company,
                'vatid' => $faker->numerify('#########'),
                'billing_address' => $faker->streetAddress,
                'billing_state' => $faker->state,
                'billing_city' => $faker->city,
                'billing_country' => $faker->country,
                'bank_name' => $faker->company,
                'bank_address' => $faker->streetAddress,
                'bank_iban' => $faker->iban('RO'),
                'bank_swift' => $faker->swiftBicNumber,
                'bank_aba_routing_nr' => $faker->numerify('########'),
                'paypal_email' => $faker->unique()->safeEmail,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        });
    }
}
