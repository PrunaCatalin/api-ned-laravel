<?php

namespace Modules\NedCurier\Entities\Awb;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CAwbStatusHistory extends Model
{
    use HasFactory;

    protected $table = 'c_awb_status_history';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id_awb',
        'id_status',
        'ts_created',
    ];

}
