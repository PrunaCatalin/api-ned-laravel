<?php

namespace Test;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $id
 * @property int    $id_parent
 * @property int    $order_list
 * @property int    $create_by
 * @property int    $modified_by
 * @property int    $active
 * @property string $name
 * @property string $url_seo
 * @property string $type_menu
 * @property Date   $create_at
 * @property Date   $modified_at
 */
class RevAppMenu extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rev_app_menu';

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
        'id_parent', 'name', 'order_list', 'url_seo', 'type_menu', 'create_by', 'create_at', 'modified_by', 'modified_at', 'active'
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
        'id' => 'int', 'id_parent' => 'int', 'name' => 'string', 'order_list' => 'int', 'url_seo' => 'string', 'type_menu' => 'string', 'create_by' => 'int', 'create_at' => 'date', 'modified_by' => 'int', 'modified_at' => 'date', 'active' => 'int'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'create_at', 'modified_at'
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
