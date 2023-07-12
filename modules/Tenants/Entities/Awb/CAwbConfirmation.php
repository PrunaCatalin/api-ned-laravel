<?php

namespace Modules\Tenants\Entities\Awb;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CAwbConfirmation extends Model
{
    use HasFactory;

    protected $table = 'c_awb_confirmation';

    protected $fillable = [
        'id_awb',
        'id_customer',
        'is_confirmed',
        'code',
        'confirmed_by',
        'confirmed_at',
    ];

}
