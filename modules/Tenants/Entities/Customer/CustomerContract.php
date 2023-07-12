<?php

namespace Modules\Tenants\Entities\Customer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustomerContract extends Model
{
    use HasFactory;

    protected $table = 'customer_contract';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id_customer',
        'id_details',
        'contract_name',
        'ts_create',
        'ts_update',
    ];

    public function customer()
    {
        return $this->belongsTo(CustomerAccount::class, 'id_customer');
    }

    public function details()
    {
        return $this->belongsTo(CustomerContractDetails::class, 'id_details');
    }
}
