<?php

namespace Modules\Tenants\Entities\Price;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Tenants\Entities\Customer\CustomerDetails;

class GenericCurrency extends Model
{
    use HasFactory;

    protected $table = 'generic_currencies';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'code',
        'name',
    ];

    public function customerDetails()
    {
        return $this->hasMany(CustomerDetails::class, 'id_currency');
    }
}
