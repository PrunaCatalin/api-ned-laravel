<?php

namespace Modules\Tenants\Entities\Employee;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Tenants\Entities\Awb\CAwb;

class EmployeeConfirmation extends Model
{
    use HasFactory;

    protected $table = 'employee_confirmation';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id_employee',
        'id_awb',
        'file_name',
        'ts_create',
        'is_visible',
        'ts_update',
        'created_by',
        'updated_by',
    ];
    public function employee(){
        $this->belongsTo(EmployeeAccount::class , "id");
    }
    public function awb(){
        $this->hasOne(CAwb::class , "id_awb");
    }
}
