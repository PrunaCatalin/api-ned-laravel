<?php

namespace Database\Seeders;

use App\Models\Rev\RevGames;
use App\Models\Rev\RevMembers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
class GameTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Generare informații pentru fiecare joc
        RevMembers::all()->each(function($member) use($faker) {
            $name = $faker->unique()->sentence;
            RevGames::create([
                'member_id' => $member->id,
                'game_md5' => $faker->md5,
                'publish_date' => $faker->dateTimeBetween('-1 year', 'now'),
                'game_title' => $name,
                'game_title_slug' => Str::slug($name),
                'game_description' => $faker->paragraph,
                'game_specifications' => $faker->paragraph,
                'game_image' => $faker->imageUrl(),
                'game_iframe' => $faker->url,
                'game_live_image' => $faker->imageUrl(),
                'game_live_iframe' => $faker->url,
                'game_width' => $faker->numberBetween(500, 1000),
                'game_height' => $faker->numberBetween(300, 700),
                'game_ratio' => $faker->boolean,
                'game_status' => $faker->boolean,
                'game_is_mobile' => $faker->boolean,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        });
    }
}
