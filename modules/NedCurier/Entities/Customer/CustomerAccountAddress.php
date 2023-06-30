<?php

namespace Modules\NedCurier\Entities\Customer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\NedCurier\Entities\Awb\CAwbReceiver;
use Modules\NedCurier\Entities\Awb\CAwbSender;
use Modules\NedCurier\Entities\Location\GenericCity;
use Modules\NedCurier\Entities\Location\GenericCounty;

class CustomerAccountAddress extends Model
{
    use HasFactory;

    protected $table = 'customer_addresses';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id_customer',
        'id_sender',
        'id_receiver',
        'id_county',
        'id_city',
        'street',
        'building',
        'postal_code',
        'ts_update',
        'ts_create',
    ];

    public function customer()
    {
        return $this->belongsTo(CustomerAccount::class, 'id_customer');
    }

    public function sender()
    {
        return $this->belongsTo(CAwbSender::class, 'id_sender');
    }

    public function receiver()
    {
        return $this->belongsTo(CAwbReceiver::class, 'id_receiver');
    }

    public function county()
    {
        return $this->belongsTo(GenericCounty::class, 'id_county');
    }

    public function city()
    {
        return $this->belongsTo(GenericCity::class, 'id_city');
    }
}
