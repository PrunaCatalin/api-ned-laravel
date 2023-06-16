<?php

namespace Database\Seeders;

use App\Models\Users\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = User::create([  "domain_id" => 1, "name" =>  "Catalin Pruna",
            "email" => "admin@gmail.com",  "password" => Hash::make("password")  ]);
        $user->assignRole('Administrator');
    }
}
