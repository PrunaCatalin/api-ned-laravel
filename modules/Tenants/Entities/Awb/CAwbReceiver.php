<?php

namespace Modules\Tenants\Entities\Awb;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Tenants\Entities\Location\GenericCity;
use Modules\Tenants\Entities\Location\GenericCounty;

class CAwbReceiver extends Model
{
    use HasFactory;

    protected $table = 'c_awb_receiver';

    protected $fillable = [
        'id_customer',
        'id_county',
        'id_city',
        'receiver_name',
        'receiver_contact',
        'receiver_phone',
        'receiver_email',
    ];

    public function county()
    {
        return $this->belongsTo(GenericCounty::class, 'id_county');
    }

    public function city()
    {
        return $this->belongsTo(GenericCity::class, 'id_city');
    }
}
