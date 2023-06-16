<?php

namespace Database\Seeders;

use App\Models\Rev\RevMembers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 100) as $index) {
            RevMembers::create([
                'username' => $faker->userName,
                'password' => bcrypt($faker->password),
                'email' => $faker->unique()->safeEmail,
                'verified' => $faker->boolean,
                'status_account' => $faker->randomElement(['OPEN', 'BANNED']),
                'ads_id' => $faker->unique()->numberBetween(1, 1000),
                'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
                'updated_at' => $faker->dateTimeBetween('-1 year', 'now'),
            ]);
        }
    }
}
