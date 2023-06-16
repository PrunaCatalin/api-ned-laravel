<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $access_token
 * @property string $instance_url
 * @property string $token_type
 * @property string $signature
 * @property string $profile_id
 * @property int    $created_at
 * @property int    $updated_at
 */
class SalesforceAccessTokens extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'salesforce_access_tokens';

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
        'user_id', 'access_token', 'instance_url', 'token_type', 'signature', 'profile_id', 'created_at', 'updated_at'
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
        'access_token' => 'string', 'instance_url' => 'string', 'token_type' => 'string',
        'signature' => 'string', 'profile_id' => 'string', 'created_at' => 'timestamp', 'updated_at' => 'timestamp'
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

    // Relations ...
    //FK -> Users
    public function user()
    {
        $this->hasOne(User::class, "id", "user_id");
    }
}
