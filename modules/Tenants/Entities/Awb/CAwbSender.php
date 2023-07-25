<?php

namespace Modules\Tenants\Entities\Awb;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Tenants\Entities\Customer\CustomerAccountAddress;
use Modules\Tenants\Entities\Customer\CustomerDetails;
use Modules\Tenants\Entities\Location\GenericCity;
use Modules\Tenants\Entities\Location\GenericCounty;

class CAwbSender extends Model
{
    use HasFactory;

    protected $table = 'c_awb_sender';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id_customer',
        'id_county',
        'id_city',
        'sender_name',
        'sender_contact',
        'sender_phone',
        'sender_email',
        'ts_create',
    ];

    // Relația cu tabelul "generic_county"
    public function county()
    {
        return $this->belongsTo(GenericCounty::class, 'id_county');
    }

    // Relația cu tabelul "generic_city"
    public function city()
    {
        return $this->belongsTo(GenericCity::class, 'id_city');
    }

    public function sender()
    {
       return $this->belongsTo(CustomerDetails::class , 'id_customer');
    }

    public function address()
    {
        return $this->belongsTo(CustomerAccountAddress::class, 'id' ,'id_sender');
    }
}
