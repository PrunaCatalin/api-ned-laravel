<?php

namespace Modules\Tenants\Entities\Transaction;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransactionService extends Model
{
    use HasFactory;

    protected $table = 'transaction_service';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'service_name',
        'amount',
        'percent',
        'details',
        'ts_create',
        'ts_update',
    ];
}
