<?php

namespace Database\Seeders;

use App\Models\Rev\RevMemberInfo;
use App\Models\Rev\RevMembers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Carbon;

class MemberInfoTableSeeder extends Seeder
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
        RevMembers::all()->each(function ($member) use ($faker) {
            $revMemberInfo = new RevMemberInfo();
            $revMemberInfo->member_id = $member->id;
            $revMemberInfo->firstname = $faker->firstName();
            $revMemberInfo->lastname = $faker->lastName();
            $revMemberInfo->phone = $faker->phoneNumber();
            $revMemberInfo->address = $faker->address();
            $revMemberInfo->city = $faker->city();
            $revMemberInfo->state = $faker->city();
            $revMemberInfo->country = $faker->countryCode;
            $revMemberInfo->profile_image = $faker->imageUrl();
            $revMemberInfo->revshare = $faker->numberBetween(0, 100);
            $revMemberInfo->revshare_dev = $faker->numberBetween(0, 100);
            $revMemberInfo->created_at = $faker->dateTimeBetween('-1 year', 'now');
            $revMemberInfo->updated_at = $faker->dateTimeBetween('-1 year', 'now');
            $revMemberInfo->save();
        });
    }
}
