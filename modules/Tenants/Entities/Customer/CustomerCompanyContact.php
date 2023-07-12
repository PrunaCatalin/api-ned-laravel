<?php

namespace Modules\Tenants\Entities\Customer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustomerCompanyContact extends Model
{
    use HasFactory;

    protected $table = 'customer_company_contacts';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id_company',
        'name_employee',
        'phone_employee',
        'ts_create',
        'ts_update',
    ];

    public function companyDetails()
    {
        return $this->belongsTo(CustomerCompanyDetails::class, 'id_company');
    }
}
