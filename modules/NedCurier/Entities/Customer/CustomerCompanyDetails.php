<?php

namespace Modules\NedCurier\Entities\Customer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\NedCurier\Entities\Location\GenericCity;
use Modules\NedCurier\Entities\Location\GenericCounty;

class CustomerCompanyDetails extends Model
{
    use HasFactory;

    protected $table = 'customer_company_details';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id_customer',
        'id_city',
        'id_county',
        'id_country',
        'company_name',
        'company_identifier',
        'zip_code',
        'phone',
        'fax',
        'company_website',
        'company_email',
        'ts_create',
        'ts_update',
        'company_activity',
        'company_address',
        'created_by',
        'updated_at',
        'created_at',
    ];

    public function customer()
    {
        return $this->belongsTo(CustomerAccount::class, 'id_customer');
    }

    public function city()
    {
        return $this->belongsTo(GenericCity::class, 'id_city');
    }

    public function county()
    {
        return $this->belongsTo(GenericCounty::class, 'id_county');
    }
}
