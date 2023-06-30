<?php

namespace Modules\NedCurier\Entities\Employee;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmployeeTitle extends Model
{
    use HasFactory;

    protected $table = 'employee_title';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name'
    ];
    public $timestamps = false;
}
