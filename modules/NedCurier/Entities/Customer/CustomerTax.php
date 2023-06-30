<?php

namespace Modules\NedCurier\Entities\Customer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustomerTax extends Model
{
    use HasFactory;

    protected $table = 'customer_taxes';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'tax_name',
        'tax_amount',
        'tax_percent',
        'tax_operator',
        'ts_create',
        'ts_update',
    ];

}
