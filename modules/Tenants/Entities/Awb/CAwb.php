<?php

namespace Modules\Tenants\Entities\Awb;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Tenants\Entities\Customer\CustomerAccount;
use Modules\Tenants\Entities\Employee\EmployeeAccount;
use Modules\Tenants\Entities\Employee\EmployeeOrders;

class CAwb extends Model
{
    use HasFactory;

    protected $table = 'c_awb';

    protected $fillable = [
        'id_customer',
        'id_sender',
        'id_receiver',
        'id_county_sender',
        'id_city_sender',
        'id_county_receiver',
        'id_city_receiver',
        'id_service',
        'id_status',
        'awb_number',
        'awb_number_confirmation',
        'ts_create',
        'ts_update',
        'ts_received',
        'need_confirmation',
    ];
    //relations
    public function confirmation()
    {
        return $this->hasOne(CAwbConfirmation::class, 'id','id_awb');
    }
    public function confirmationFiles()
    {
        return $this->hasMany(CAwbConfirmationFile::class, 'id_awb');
    }
    public function details()
    {
        return $this->hasOne(CAwbDetails::class, 'id_awb');
    }
    public function customer()
    {
        return $this->hasOne(CustomerAccount::class, 'id','id_customer');
    }
    public function statusHistory()
    {
        return $this->hasMany(CAwbStatusHistory::class, 'id_awb', 'id');
    }
    public function employeeOrders()
    {
        return $this->hasMany(EmployeeOrders::class, 'id_awb');
    }



}
