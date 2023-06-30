<?php

namespace Modules\NedCurier\Entities\Customer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustomerContractDetails extends Model
{
    use HasFactory;

    protected $table = 'customer_contract_details';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id_taxes',
        'exp_date',
        'id_customer',
    ];

    public function taxes()
    {
        return $this->belongsTo(CustomerTax::class, 'id_taxes');
    }

    public function customer()
    {
        return $this->belongsTo(CustomerAccount::class, 'id_customer');
    }
}
