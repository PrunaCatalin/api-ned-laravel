<?php

namespace Modules\FresciaStore\Database\Seeders\Customer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\FresciaStore\Entities\Customer\Customer;
use Modules\FresciaStore\Entities\Customer\CustomerAddresses;
use Modules\FresciaStore\Entities\Customer\CustomerCompanies;
use Modules\FresciaStore\Entities\Customer\CustomerDetails;
use Modules\FresciaStore\Entities\Customer\CustomerWishlist;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        Model::unguard();
        // Truncate the tables
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('customer_wishlist')->truncate();
        DB::table('customer_companies')->truncate();
        DB::table('customer_addresses')->truncate();
        DB::table('customer_details')->truncate();
        DB::table('customers')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Customer::factory()
            ->count(100)
            ->create()
            ->each(function ($customer) {
                CustomerDetails::factory()
                    ->for($customer)
                    ->create();

                CustomerAddresses::factory()
                    ->for($customer)
                    ->create();

                CustomerCompanies::factory()
                    ->for($customer)
                    ->create();
                CustomerWishlist::factory()
                    ->for($customer)
                    ->create();
            });
        // $this->call("OthersTableSeeder");
    }
}
