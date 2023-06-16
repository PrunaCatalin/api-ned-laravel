<?php

namespace App\Models\Acl;

use App\Models\ApplicationLinks\WdApplicationLinks;
use App\Models\Tenants\Domains;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property string $module_name
 * @property string $pretty_name
 * @property string $group_name
 * @property int    $created_at
 * @property int    $updated_at
 * @property int    $deleted_at
 */
class AclModules extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'acl_modules';

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
        'module_name', 'pretty_name', 'group_name', 'domain_id', 'created_at', 'updated_at', 'deleted_at'
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
        'module_name' => 'string', 'pretty_name' => 'string', 'group_name' => 'string',
        'domain_id' => 'integer',
        'created_at' => 'timestamp', 'updated_at' => 'timestamp', 'deleted_at' => 'timestamp'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = true;

    // Scopes...

    // Functions ...

    // Relations ...
    public function tenant(): HasOne
    {
        return $this->HasOne(Domains::class, 'id', 'domain_id') ;
    }
    public function children(): HasMany
    {
        return $this->hasMany(AclModulePermissionsRoute::class, 'module_id', 'id') ;
    }
}
