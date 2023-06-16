<?php

namespace Modules\FresciaStore\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\FresciaStore\Entities\Customer\Customer;
use Modules\FresciaStore\Entities\Customer\CustomerCompanies;
use Modules\FresciaStore\Entities\Location\GenericCities;
use Modules\FresciaStore\Entities\Location\GenericCounty;

class CustomerCompaniesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CustomerCompanies::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $county = GenericCounty::all()->random();
        $city = GenericCities::where('county_id', $county->id)->get()->random();
        return [
            'customer_id' => Customer::factory(),
            'company_name' => $this->faker->company,
            'prefix_code' => "RO",
            'cui_code' => $this->faker->randomNumber(5),
            'commerce_reg_letter' => $this->faker->randomElement(['J', 'F', 'C', '']),
            'county_code' => $this->faker->numberBetween(1, 52),
            'company_year' => $this->faker->year,
            'bank_name' => $this->faker->company,
            'iban_account' =>  $this->faker->iban('RO'),
            'county_id' => $county->id,
            'city_id' => $city->id,
            'company_address' => $this->faker->address,
            // Add other fields as necessary
        ];
    }
}

