<?php

namespace Modules\Tenants\Entities\Awb;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CAwbDetails extends Model
{
    use HasFactory;

    protected $table = 'c_awb_details';
    protected $primaryKey = 'id_awb';
    public $incrementing = false;

    protected $fillable = [
        'id_awb',
        'packages',
        'envelopes',
        'weight',
        'height',
        'width',
        'length',
        'val_declared',
        'refund_cash',
        'refund_bank',
        'refund_bo',
        'refund_doc',
        'refund_cec',
        'can_open',
        'is_saturday',
        'is_morning',
        'shipmentPayer',
        'packageContent',
        'observation',
        'amount',
    ];
}
