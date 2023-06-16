<?php

namespace Modules\FresciaStore\Entities\Customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\FresciaStore\Database\factories\CustomerAddressesFactory;

class CustomerAddresses extends Model
{
    use HasFactory;

    protected $fillable = [];

    protected static function newFactory()
    {
        return CustomerAddressesFactory::new();
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
