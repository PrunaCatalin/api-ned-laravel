<?php
namespace Modules\FresciaStore\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\FresciaStore\Entities\Customer\Customer;
use Modules\FresciaStore\Entities\Customer\CustomerWishlist;

class CustomerWishlistFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CustomerWishlist::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_id' => Customer::factory(),
            'product_id' => 1,
            // Add other fields as necessary
        ];
    }
}

