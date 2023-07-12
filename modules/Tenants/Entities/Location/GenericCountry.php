<?php

namespace Modules\Tenants\Entities\Location;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GenericCountry extends Model
{
    use HasFactory;

    protected $table = 'generic_countries';

    protected $fillable = [
        'name',
        'alpha_2',
        'alpha_3',
        'country_code',
        'iso_3166_2',
        'region',
        'sub_region',
        'intermediate_region',
        'region_code',
        'sub_region_code',
        'intermediate_region_code'
    ];

    public function counties()
    {
        return $this->hasMany(GenericCounty::class, 'id_country');
    }


}
