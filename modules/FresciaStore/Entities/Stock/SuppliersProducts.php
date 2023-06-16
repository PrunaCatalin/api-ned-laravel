<?php

namespace Modules\FresciaStore\Entities\Stock;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuppliersProducts extends Model
{
    use HasFactory;

    protected $fillable = [];

    protected $table = "suppliers_products";
}
