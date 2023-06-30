<?php

namespace Modules\NedCurier\Entities\Employee;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmployeeDetails extends Model
{
    use HasFactory;

    protected $table = 'employee_details';
    protected $primaryKey = 'id_employee';
    public $timestamps = true;

    protected $fillable = [
        'id_employee',
        'id_title',
        'first_name',
        'last_name',
        'phone',
        'work_phone',
        'age',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at',
    ];

    public function employee(){
        $this->belongsTo(EmployeeAccount::class , "id");
    }
}
