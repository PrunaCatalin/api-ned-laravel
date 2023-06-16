<?php

namespace App\Models\Acl;

use App\Models\Tenants\Domains;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $domain_id
 * @property int $created_at
 * @property int $updated_at
 */
class AclGroupRole extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'acl_group_role';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id', 'group_permission_id', 'domain_id', 'created_at', 'updated_at'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'domain_id' => 'int', 'created_at' => 'timestamp', 'updated_at' => 'timestamp'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = true;

    // Scopes...

    // Functions ...
    //'role_id', 'group_permission_id', 'domain_id',
    // Relations ...

    /**
     * @return HasOne
     */
    public function role(): HasOne
    {
        return $this->hasOne(AclRoles::class, "id", "role_id");
    }

    /**
     * @return HasOne
     */
    public function groupPermission(): HasOne
    {
        return $this->hasOne(AclGroupPermission::class, "id", "group_permission_id");
    }

    /**
     * @return HasOne
     */
    public function tenant(): HasOne
    {
        return $this->hasOne(Domains::class, "id", "domain_id");
    }
}
