<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $category_id
 * @property string $name
 * @property string $sku
 * @property string $unit_measure
 * @property string $description
 * @property string $short_description
 * @property boolean $is_active
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property CustomerWishlist[] $customerWishlists
 * @property ProductImage[] $productImages
 * @property ProductSeo[] $productSeos
 * @property ProductCategory $productCategory
 * @property StocksProduct[] $stocksProducts
 */
class Product extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['category_id', 'name', 'sku', 'unit_measure', 'description', 'short_description', 'is_active', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function customerWishlists()
    {
        return $this->hasMany('App\Models\CustomerWishlist');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productImages()
    {
        return $this->hasMany('App\Models\ProductImage');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productSeos()
    {
        return $this->hasMany('App\Models\ProductSeo');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productCategory()
    {
        return $this->belongsTo('App\Models\ProductCategory', 'category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function stocksProducts()
    {
        return $this->hasMany('App\Models\StocksProduct');
    }
}
