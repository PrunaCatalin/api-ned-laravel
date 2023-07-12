<?php

namespace Modules\Tenants\Entities\Customer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustomerSession extends Model
{
    use HasFactory;

    protected $table = 'customer_session';
    protected $primaryKey = 'sid';
    public $timestamps = false;

    protected $fillable = [
        'cid',
        'session_client',
        'session_token',
        'session_addr',
        'ts_start',
        'ts_expire',
    ];

    public function customerAccount()
    {
        return $this->belongsTo(CustomerAccount::class, 'cid');
    }
}
