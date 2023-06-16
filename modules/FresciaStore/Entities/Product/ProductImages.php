<?php

namespace Modules\FresciaStore\Entities\Product;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductImages extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = ['product_id', 'image', 'created_at', 'updated_at'];
    protected $table = "product_images";

}
