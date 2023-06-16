<?php

namespace Modules\FresciaStore\Entities\Product;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductCategories extends Model
{
    use HasFactory;

    protected $table = "product_categories";
    protected $fillable = ['id_parent', 'order_list', 'position', 'name', 'url_seo', 'icon',
        'is_customer', 'age_restricted', 'created_at', 'updated_at'];

    public static function getParentCategories()
    {
        return self::whereNull('id_parent')->get();
    }

    public function children()
    {
        return $this->hasMany(ProductCategories::class, 'id_parent');
    }
    public function allChildren()
    {
        return $this->children()->with('allChildren');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id')
            ->with('stockPrice')->where('is_active', 1);
    }
    public function allProducts()
    {
        return $this->products()->union(
            $this->children()->with('allProducts')->get()->pluck('allProducts')->flatten()
        );
    }
    public function isUnderAge(): bool
    {
        return (bool)($this->attributes['age_restricted']);
    }
    public function inactiveProducts()
    {
        return $this->hasMany(Product::class, 'category_id')->where('is_active', 0);
    }
}
