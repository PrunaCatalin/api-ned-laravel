<?php

namespace Modules\Tenants\Entities\Customer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustomerAccount extends Model
{
    use HasFactory;

    protected $table = 'customer_accounts';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id_permission',
        'password',
        'email',
        'status',
        'ts_login',
        'ts_create',
        'password_reset_token',
        'password_reset_ttl',
        'created_by',
    ];

    public function details(){
        return $this->hasOne(CustomerDetails::class, 'id_customer','id');
    }

}
