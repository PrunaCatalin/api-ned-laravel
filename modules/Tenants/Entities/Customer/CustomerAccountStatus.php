<?php

namespace Modules\Tenants\Entities\Customer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustomerAccountStatus extends Model
{
    use HasFactory;
    protected $table = 'customer_account_status';

    protected $fillable = [];
}
