<?php

namespace modules\FresciaStore\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\FresciaStore\Database\Seeders\Customer\CustomerTableSeeder;
use Modules\FresciaStore\Entities\Location\GenericCounty;

class FresciaStoreDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

         $this->call(CustomerTableSeeder::class);
    }
}
