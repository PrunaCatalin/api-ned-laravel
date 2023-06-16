<?php

namespace Modules\FresciaStore\Entities\Customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\FresciaStore\Database\factories\CustomerWishlistFactory;

class CustomerWishlist extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $table = "customer_wishlist";

    protected static function newFactory()
    {
        return CustomerWishlistFactory::new();
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
