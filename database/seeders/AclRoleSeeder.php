<?php

namespace Database\Seeders;

use App\Models\Acl\AclRoles;
use Illuminate\Database\Seeder;

class AclRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        AclRoles::create(["role_name" => "Developer"]);
    }
}
