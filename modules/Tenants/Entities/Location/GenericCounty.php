<?php

namespace Modules\Tenants\Entities\Location;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GenericCounty extends Model
{
    use HasFactory;

    protected $table = 'generic_county';

    protected $fillable = [
        'code',
        'name',
        'id_country',
    ];

    // Relație către tabela "generic_countries"
    public function country()
    {
        return $this->belongsTo(GenericCountry::class, 'id_country');
    }


}
