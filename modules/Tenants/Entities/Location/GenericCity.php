<?php

namespace Modules\Tenants\Entities\Location;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GenericCity extends Model
{
    use HasFactory;

    protected $table = 'generic_city';

    protected $fillable = [
        'id_county',
        'longitude',
        'latitude',
        'name',
        'region',
    ];

    // Relație către tabela "generic_county"
    public function county()
    {
        return $this->belongsTo(GenericCounty::class, 'id_county');
    }

    public function cities()
    {
        return $this->hasMany(GenericCity::class, 'id_county');
    }

}
