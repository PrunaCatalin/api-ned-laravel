<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $name_override
 * @property float $energy_kj
 * @property float $energy_kcal
 * @property float $fats
 * @property float $saturated_fatty_acids
 * @property float $carbohydrates_available
 * @property float $sugars
 * @property float $proteins
 * @property float $salt
 * @property float $weight
 * @property float $piece_weight
 * @property boolean $is_additive
 * @property string $ingredients_label
 * @property integer $allergens_count
 * @property integer $additives_count
 * @property string $created_at
 * @property string $updated_at
 */
class WdProductStats extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'wd_products_stats';

    /**
     * @var array
     */
    protected $fillable = ['name', 'name_override', 'energy_kj', 'energy_kcal', 'fats',
        'saturated_fatty_acids', 'carbohydrates_available', 'sugars', 'proteins', 'salt',
        'weight', 'piece_weight', 'is_additive', 'ingredients_label', 'allergens_count', 'additives_count', 'created_at', 'updated_at'];
}
