<?php

namespace Modules\Tenants\Entities\Price;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TablePrice extends Model
{
    use HasFactory;

    protected $table = 'table_price';

    protected $fillable = [
        'id',
        'name',
        'is_cargo',
        'is_weekend',
        'is_morning',
        'kg',
        'type_price',
        'tva',
        'amount',
        'price_operator',
        'created_by',
        'created_at',
        'deleted_at'
    ];
}
