<?php

namespace Modules\Tenants\Entities\Company;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompanyDetails extends Model
{
    use HasFactory;

    protected $table = 'company_details';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'company',
        'full_name',
        'phone',
        'mobile',
        'fax',
        'postal_address',
        'physical_address',
        'secondary_address',
        'bank_name',
        'treasury_name',
        'bank_account',
        'created_by',
        'created_at',
        'update_by',
        'updated_at',
        'deleted_at',
        'register_full_code',
        'register_short_code',
        'money',
        'reprezent_number',
        'reprezent_name',
        'reprezent_address',
        'reprezent_phone',
        'reprezent_email',
        'reprezent_function',
    ];
}
