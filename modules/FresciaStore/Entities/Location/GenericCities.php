<?php

namespace Modules\FresciaStore\Entities\Location;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GenericCities extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function county()
    {
        return $this->belongsTo(GenericCounty::class, 'county_id', 'id');
    }
}
