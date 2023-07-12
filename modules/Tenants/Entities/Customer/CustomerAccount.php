<?php

namespace Modules\Tenants\Entities\Customer;

use App\Traits\HasApiTokensTrait;
use Illuminate\Foundation\Auth\User as Authentication;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class CustomerAccount extends Authentication implements AuditableContract
{
    use Auditable;
    use HasApiTokensTrait;
    use Notifiable;

    protected $table = 'customer_accounts';
    protected $primaryKey = 'id';
    public $timestamps = false;
    /**
     * Attributes to exclude from the Audit.
     *
     * @var array
     */
    protected array $auditExclude = [];
    protected bool $auditTimestamps = true;

    protected $fillable = [
        'id_permission',
        'password',
        'email',
        'status',
        'ts_login',
        'ts_create',
        'password_reset_token',
        'password_reset_ttl',
        'created_by',
    ];

    public function details(){
        return $this->hasOne(CustomerDetails::class, 'id_customer','id');
    }

}
