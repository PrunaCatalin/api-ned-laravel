<?php

namespace Modules\FresciaStore\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\FresciaStore\Entities\Customer\Customer;
use Modules\FresciaStore\Entities\Customer\CustomerAddresses;
use Modules\FresciaStore\Entities\Location\GenericCities;
use Modules\FresciaStore\Entities\Location\GenericCounty;

class CustomerAddressesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CustomerAddresses::class;

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
            'county_id' => $county->id,
            'city_id' => $city->id,
            'person_name' => $this->faker->name,
            'person_phone' => $this->faker->phoneNumber,
            'person_street_name' => $this->faker->streetName,
            'person_street_number' => $this->faker->buildingNumber,
            'person_zip_code' => $this->faker->postcode,
            'person_additional_info' => $this->faker->paragraph,
            // Add other fields as necessary
        ];
    }
}

