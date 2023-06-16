<?php

namespace Database\Seeders;

use App\Models\Rev\RevMembers;
use App\Models\Rev\RevMemberWebsite;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class MemberWebsiteTableSeeder extends Seeder
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
            // Generare un număr aleatoriu de site-uri pentru fiecare membru (între 0 și 5)
            $revMemberWebsite = new RevMemberWebsite();
            $revMemberWebsite->member_id = $member->id;
            $revMemberWebsite->website = $faker->domainName;
            $revMemberWebsite->adstxt = $faker->numberBetween(0, 2);
            $revMemberWebsite->created_at = now();
            $revMemberWebsite->updated_at = now();
            $revMemberWebsite->save();
        });
    }
}
