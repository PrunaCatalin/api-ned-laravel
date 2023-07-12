<?php

namespace Modules\Tenants\Entities\Awb;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CAwbConfirmationFile extends Model
{
    use HasFactory;

    protected $table = 'c_awb_confirmation_files';

    protected $fillable = [
        'id_awb',
        'id_customer',
        'id_employee',
        'file_name',
    ];
}
