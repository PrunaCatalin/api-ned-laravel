<?php

namespace Modules\Tenants\Entities\Customer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustomerAccountType extends Model
{
    use HasFactory;
    protected $table = 'customer_account_type';
    protected $fillable = [];
}
