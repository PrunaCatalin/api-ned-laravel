<?php

namespace app\Models\Web;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int      $id
 * @property int      $id_price_type
 * @property int      $id_customer
 * @property int      $created_by
 * @property float    $amount
 * @property DateTime $created_at
 * @property DateTime $deleted_at
 */
class TablePriceContractCustom extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'table_price_contract_custom';

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
        'id_price_type', 'id_customer', 'amount', 'created_by', 'created_at', 'deleted_at'
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
        'id' => 'int', 'id_price_type' => 'int', 'id_customer' => 'int', 'amount' => 'float', 'created_by' => 'int', 'created_at' => 'datetime', 'deleted_at' => 'datetime'
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
