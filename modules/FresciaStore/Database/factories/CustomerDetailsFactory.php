<?php

namespace Modules\FresciaStore\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\FresciaStore\Entities\Customer\CustomerDetails;

class CustomerDetailsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CustomerDetails::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'lastname' => $this->faker->lastName,
            'date_of_birth' => $this->faker->date('Y-m-d'),
            'phone' => $this->faker->phoneNumber,
            'gender' => $this->faker->randomElement([0, 1]),
            // Add other fields as necessary
        ];
    }
}

