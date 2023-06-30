<?php

namespace Modules\NedCurier\Entities\Awb;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\NedCurier\Entities\Location\GenericCity;
use Modules\NedCurier\Entities\Location\GenericCounty;
use Modules\NedCurier\Entities\Transaction\TransactionService;

class CAwbSlip extends Model
{
    use HasFactory;

    protected $table = 'c_awb_slip';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'parent',
        'id_customer',
        'id_employee',
        'id_awb',
        'id_sender',
        'id_receiver',
        'id_county',
        'id_city',
        'id_service',
        'ts_create',
        'ts_update',
        'created_by',
        'updated_by',
        'status',
    ];

    // Relația cu tabelul "customer_accounts"
    public function customer()
    {
        //return $this->belongsTo(CustomerAccount::class, 'id_customer');
    }

    // Relația cu tabelul "employee_accounts"
    public function employee()
    {
        //return $this->belongsTo(EmployeeAccount::class, 'id_employee');
    }

    // Relația cu tabelul "c_awb"
    public function awb()
    {
        return $this->belongsTo(CAwb::class, 'id_awb');
    }

    // Relația cu tabelul "c_awb_sender"
    public function sender()
    {
        return $this->belongsTo(CAwbSender::class, 'id_sender');
    }

    // Relația cu tabelul "c_awb_receiver"
    public function receiver()
    {
        return $this->belongsTo(CAwbReceiver::class, 'id_receiver');
    }

    // Relația cu tabelul "generic_county"
    public function county()
    {
        return $this->belongsTo(GenericCounty::class, 'id_county');
    }

    // Relația cu tabelul "generic_city"
    public function city()
    {
        return $this->belongsTo(GenericCity::class, 'id_city');
    }

    // Relația cu tabelul "transaction_service"
    public function service()
    {
        return $this->belongsTo(TransactionService::class, 'id_service');
    }

    // Relația cu tabelul "user_accounts" pentru "created_by"
    public function createdBy()
    {
       // return $this->belongsTo(UserAccount::class, 'created_by');
    }

    // Relația cu tabelul "user_accounts" pentru "updated_by"
    public function updatedBy()
    {
        // return $this->belongsTo(UserAccount::class, 'updated_by');
    }
}
