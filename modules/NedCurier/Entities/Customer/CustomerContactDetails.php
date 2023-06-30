<?php

namespace Modules\NedCurier\Entities\Customer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustomerContactDetails extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\NedCurier\Database\factories\Customer/CustomerContactDetailsFactory::new();
    }
}
