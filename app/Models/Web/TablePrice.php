<?php

namespace app\Models\Web;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int      $id
 * @property int      $is_cargo
 * @property int      $is_weekend
 * @property int      $is_morning
 * @property int      $kg
 * @property int      $created_by
 * @property string   $name
 * @property float    $tva
 * @property float    $amount
 * @property DateTime $created_at
 * @property DateTime $deleted_at
 */
class TablePrice extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'table_price';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'is_cargo', 'is_weekend', 'is_morning', 'kg', 'type_price', 'tva', 'amount', 'price_operator', 'created_by', 'created_at', 'deleted_at'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'int', 'name' => 'string', 'is_cargo' => 'int', 'is_weekend' => 'int', 'is_morning' => 'int', 'kg' => 'int', 'tva' => 'float', 'amount' => 'float', 'created_by' => 'int', 'created_at' => 'datetime', 'deleted_at' => 'datetime'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'deleted_at'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = true;

    // Scopes...

    // Functions ...

    // Relations ...
}
