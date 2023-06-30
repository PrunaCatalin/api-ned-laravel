<?php

namespace Modules\NedCurier\Entities\Employee;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmployeeOrders extends Model
{
    use HasFactory;

    protected $table = 'employee_orders';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id_employee',
        'id_awb',
        'ts_create',
        'ts_update',
        'created_by',
        'updated_by',
        'id_status',
    ];
}
