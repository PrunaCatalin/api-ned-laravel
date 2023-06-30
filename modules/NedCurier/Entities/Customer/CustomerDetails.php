<?php

namespace Modules\NedCurier\Entities\Customer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\NedCurier\Entities\Location\GenericCity;
use Modules\NedCurier\Entities\Location\GenericCountry;
use Modules\NedCurier\Entities\Location\GenericCounty;
use Modules\NedCurier\Entities\Price\GenericCurrency;

class CustomerDetails extends Model
{
    use HasFactory;

    protected $table = 'customer_details';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id_customer',
        'id_account_type',
        'id_account_status',
        'id_country',
        'id_county',
        'id_city',
        'id_currency',
        'firstname',
        'lastname',
        'gender',
        'birthday',
        'phone_number',
        'ts_create',
        'ts_verify',
        'ts_last_login',
        'full_address',
    ];

    public function customerAccount()
    {
        return $this->belongsTo(CustomerAccount::class, 'id_customer');
    }

    public function accountType()
    {
        return $this->belongsTo(CustomerAccountType::class, 'id_account_type');
    }

    public function accountStatus()
    {
        return $this->belongsTo(CustomerAccountStatus::class, 'id_account_status');
    }

    public function country()
    {
        return $this->belongsTo(GenericCountry::class, 'id_country');
    }

    public function county()
    {
        return $this->belongsTo(GenericCounty::class, 'id_county');
    }

    public function city()
    {
        return $this->belongsTo(GenericCity::class, 'id_city');
    }

    public function currency()
    {
        return $this->belongsTo(GenericCurrency::class, 'id_currency');
    }
}
