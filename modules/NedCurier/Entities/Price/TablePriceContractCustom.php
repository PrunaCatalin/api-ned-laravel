<?php

namespace Modules\NedCurier\Entities\Price;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TablePriceContractCustom extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\NedCurier\Database\factories\Price/TablePriceContractCustomFactory::new();
    }
}
