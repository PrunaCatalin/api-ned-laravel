<?php

namespace Modules\FresciaStore\Entities\Product;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;
use Modules\FresciaStore\Entities\Stock\StocksProducts;

class Product extends Model
{
    use HasFactory;

    protected $table = "products";
    protected $appends = ['shop_name'];
    /**
     * @var array
     */
    protected $fillable = ['category_id', 'name', 'sku', 'unit_measure',
        'description', 'short_description', 'is_active', 'created_at', 'updated_at', 'deleted_at'];


    public function getShopNameAttribute(){
        return Str::limit($this->attributes['name'], 27);
    }


    public function seo(): HasOne
    {
        return $this->hasOne(ProductSeo::class, "product_id");
    }

    public function category(): HasOne
    {
        return $this->hasOne(ProductCategories::class, "id" , 'category_id');
    }

    public function images() {
        return $this->hasMany(ProductImages::class, "product_id");
    }

    public function firstImage() {
        return $this->hasOne(ProductImages::class, "product_id");
    }
    //By price

    public function stockPrice()
    {
        //get the lowest price by Supplier
        return $this->hasOne(StocksProducts::class, "product_id")
            ->orderBy("price");
    }

    public function lowestStockPrice()
    {
        return $this->hasOne(StocksProducts::class, "product_id")
            ->where("quantity", '>', 0)
            ->orderBy('price')
            ->limit(1);
    }

    public function pricesExcludingLowest()
    {
        $lowestPrice = $this->lowestStockPrice()->value('price');

        return $this->hasMany(StocksProducts::class, "product_id")
            ->where('price', '>', $lowestPrice)
            ->orderBy('price');
    }

    public function highestStockPrice()
    {
        return $this->hasOne(StocksProducts::class, "product_id")
            ->where("quantity", '>', 0)
            ->orderBy('price' , "desc")
            ->limit(1);
    }
}
