<?php

namespace Modules\FresciaStore\Entities\Customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\FresciaStore\Database\factories\CustomerDetailsFactory;

class CustomerDetails extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $appends = [
        'appellate'
    ];
    protected static function newFactory()
    {
        return CustomerDetailsFactory::new();
    }

    public function getAppellateAttribute()
    {
        return ($this->attributes['gender'] === 0) ? "Mr" : "Mrs";
    }

}
