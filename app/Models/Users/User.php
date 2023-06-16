<?php

namespace App\Models\Users;

use App\Models\Queue;
use App\Models\Tenants\Domains;
use App\Traits\HasApiTokensTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authentication;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Sanctum\NewAccessToken;
use Modules\Admin\Entities\NotificationPreference;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use Spatie\Permission\Traits\HasRoles;

class User extends Authentication implements AuditableContract
{
    use Auditable;
    use HasApiTokensTrait;
    use HasFactory;
    use Notifiable;
    use HasRoles;

    /**
     * Attributes to exclude from the Audit.
     *
     * @var array
     */
    protected array $auditExclude = [];
    protected bool $auditTimestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'domain_id',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tenant()
    {
        return $this->hasMany(Domains::class, 'id', 'domain_id');
    }

    /**
     * @return HasOne
     */
    public function userDetails(): HasOne
    {
        return $this->hasOne(UsersDetails::class, "user_id", "id");
    }

    public function guardName()
    {
        return 'sanctum';
    }
    public function queues()
    {
        return $this->belongsToMany(Queue::class);
    }

    /**
     * Get the current role of the user.
     *
     * @return string|null
     */
    public function currentRole()
    {
        return $this->roles->first()->name ?? null;
    }

    public function notificationPreferences()
    {
        return $this->hasOne(NotificationPreference::class);
    }
}
