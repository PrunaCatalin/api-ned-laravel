<?php

namespace Modules\NedCurier\Entities\Customer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustomerAccountStatus extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\NedCurier\Database\factories\Customer/CustomerAccountStatusFactory::new();
    }
}
