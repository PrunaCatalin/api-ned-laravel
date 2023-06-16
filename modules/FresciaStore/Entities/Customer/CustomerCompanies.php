<?php

namespace Modules\FresciaStore\Entities\Customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\FresciaStore\Database\factories\CustomerCompaniesFactory;

class CustomerCompanies extends Model
{
    use HasFactory;

    protected $fillable = [];

    protected static function newFactory()
    {
        return CustomerCompaniesFactory::new();
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
