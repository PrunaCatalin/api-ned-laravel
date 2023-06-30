<?php

namespace Modules\NedCurier\Entities\Awb;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\NedCurier\Entities\Location\GenericCity;
use Modules\NedCurier\Entities\Location\GenericCounty;

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
}
