<?php

namespace Modules\FresciaStore\Entities\Location;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GenericCounty extends Model
{
    use HasFactory;
    protected $table = "generic_county";
    protected $fillable = [];

    public function cities()
    {
        return $this->hasMany(GenericCities::class);
    }
}
