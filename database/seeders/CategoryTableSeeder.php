<?php

namespace Database\Seeders;

use App\Models\Rev\RevCategories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Generare informații pentru fiecare categorie
        for ($i = 1; $i <= 100; $i++) {
            $name = $faker->unique()->words(2, true);
            $category = RevCategories::create([
                'parent' => 0,
                'position' => $i,
                'name' => $name,
                'slug' => Str::slug($name),
                'description' => $faker->paragraph,
                'href' => $faker->url,
                'image' => $faker->imageUrl(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
