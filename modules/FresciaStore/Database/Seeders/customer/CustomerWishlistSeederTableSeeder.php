<?php

namespace Modules\FresciaStore\Database\Seeders\customer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class CustomerWishlistSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call("OthersTableSeeder");
    }
}
