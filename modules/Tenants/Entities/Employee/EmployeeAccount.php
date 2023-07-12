<?php

namespace Modules\Tenants\Entities\Employee;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmployeeAccount extends Model
{
    use HasFactory;

    protected $table = 'employee_accounts';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id_group_permission',
        'login',
        'password',
        'email',
        'status',
        'ts_login',
        'ts_create',
        'password_reset_token',
        'password_reset_ttl',
        'created_at',
        'updated_at',
        'deleted_at',
        'type_employee',
    ];

    public function orders()
    {
        return $this->hasMany(EmployeeOrders::class, 'id_employee');
    }
}
