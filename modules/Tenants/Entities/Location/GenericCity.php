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
	public function zones(){
        return $this->hasMany(GenericZone::class , 'id_city');
    }
    // Relație către tabela "generic_county"
    public function county()
    {
        return $this->belongsTo(GenericCounty::class, 'id_county');
    }

    public function cities()
    {
        return $this->hasMany(GenericCity::class, 'id_county', 'id_county');
    }

}
