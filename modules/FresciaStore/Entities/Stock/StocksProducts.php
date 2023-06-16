<?php

namespace Modules\FresciaStore\Entities\Stock;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class StocksProducts extends Model
{
    use HasFactory;

    protected $table = "stocks_products";
    protected $appends = [
        "price_with_currency"
    ];
    /**
     * @var array
     */
    protected $fillable = ['product_id', 'supplier_id', 'quantity', 'price', 'created_at', 'updated_at', 'deleted_at'];

    public function getPriceWithCurrencyAttribute(): string
    {
        return $this->attributes['price'] . " LEI";
    }

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(SuppliersProducts::class, "supplier_id");
    }
}
