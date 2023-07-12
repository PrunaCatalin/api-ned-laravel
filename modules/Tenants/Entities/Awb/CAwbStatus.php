<?php

namespace Modules\Tenants\Entities\Awb;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Tenants\Entities\Employee\EmployeeOrders;

class CAwbStatus extends Model
{
    use HasFactory;

    protected $table = 'c_awb_statuses';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'code',
        'description',
    ];
    public function employeeOrders()
    {
        return $this->hasMany(EmployeeOrders::class, 'id_status');
    }
}
