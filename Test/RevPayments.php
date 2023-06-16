<?php

namespace Test;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int      $id
 * @property int      $member_id
 * @property float    $total
 * @property DateTime $start
 * @property DateTime $end
 * @property string   $details
 */
class RevPayments extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rev_payments';

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
        'member_id', 'payed', 'total', 'start', 'end', 'details'
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
        'id' => 'int', 'member_id' => 'int', 'total' => 'float',
        'start' => 'datetime', 'end' => 'datetime', 'details' => 'string'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'start', 'end'
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
