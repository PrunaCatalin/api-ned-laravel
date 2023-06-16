<?php

namespace Modules\FresciaStore\Entities\Product;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductSeo extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = ['product_id', 'meta_title', 'meta_description', 'meta_keywords', 'created_at', 'updated_at'];
    protected $table = "product_seo";
}
