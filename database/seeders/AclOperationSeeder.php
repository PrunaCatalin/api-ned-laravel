<?php

namespace Database\Seeders;

use App\Models\Acl\AclOperations;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AclOperationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Default operation
        AclOperations::create([
            "group" => 0 ,
            "priority" => 10000,
            "operation_name" => "Common"
        ]);
    }
}
