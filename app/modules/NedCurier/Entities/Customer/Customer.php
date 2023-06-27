<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $id_permission
 * @property string $password
 * @property string $email
 * @property string $status
 * @property integer $ts_login
 * @property integer $ts_create
 * @property string $password_reset_token
 * @property integer $password_reset_ttl
 * @property integer $created_by
 */
class Customer extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'customer_accounts';

    /**
     * @var array
     */
    protected $fillable = ['id_permission', 'password', 'email', 'status', 'ts_login', 'ts_create', 'password_reset_token', 'password_reset_ttl', 'created_by'];
}
