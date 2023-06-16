<?php

namespace Test;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string  $value
 * @property string  $category
 * @property string  $type
 * @property string  $description
 * @property int     $sortorder
 * @property boolean $required
 */
class RevAppConfig extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rev_app_config';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = '';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'setting', 'value', 'sortorder', 'category', 'type', 'description', 'required'
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
        'value' => 'string', 'sortorder' => 'int', 'category' => 'string', 'type' => 'string', 'description' => 'string', 'required' => 'boolean'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        
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
}
