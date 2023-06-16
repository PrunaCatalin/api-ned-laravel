<?php

namespace Database\Seeders;

use App\Models\Rev\RevCategories;
use App\Models\Rev\RevGames;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class GameCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Obținerea tuturor jocurilor și categoriilor
        $games = RevGames::all();
        $categories = RevCategories::all();

        // Adăugarea unei categorii pentru fiecare joc
        foreach ($games as $game) {
            $category = $categories->random();
            $game->categories()->attach($category);
        }

        // Adăugarea a 2 categorii suplimentare pentru primele 3 jocuri
        for ($i = 1; $i <= 3; $i++) {
            $game = $games->get($i);
            $categoriesExcept = $categories->except($game->categories->pluck('id')->toArray());
            $game->categories()->attach($categoriesExcept->random(2));
        }
    }
}
