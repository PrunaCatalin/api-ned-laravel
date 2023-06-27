<?php

namespace Modules\NedCurier\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $id
 * @property int    $id_permission
 * @property int    $ts_login
 * @property int    $ts_create
 * @property int    $password_reset_ttl
 * @property int    $created_by
 * @property string $password
 * @property string $email
 * @property string $password_reset_token
 */
class CustomerAccounts extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'customer_accounts';

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
        'id_permission', 'password', 'email', 'status', 'ts_login', 'ts_create',
        'password_reset_token', 'password_reset_ttl', 'created_by'
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
        'id' => 'int', 'id_permission' => 'int', 'password' => 'string', 'email' => 'string', 'ts_login' => 'int',
        'ts_create' => 'int', 'password_reset_token' => 'string', 'password_reset_ttl' => 'int', 'created_by' => 'int'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [

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
