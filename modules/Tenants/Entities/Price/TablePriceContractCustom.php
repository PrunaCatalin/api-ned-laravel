<?php

namespace Modules\Tenants\Entities\Price;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TablePriceContractCustom extends Model
{
    use HasFactory;

    protected $table = 'table_price_contract_custom';

    protected $fillable = [
        'id',
        'id_price_type',
        'id_customer',
        'amount',
        'created_by',
        'created_at',
        'deleted_at',
        'updated_at'
    ];

    public function price()
    {
        return $this->belongsTo(TablePrice::class , 'id_price_type', 'id');
    }
}
