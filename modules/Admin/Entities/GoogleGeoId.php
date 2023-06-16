<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GoogleGeoId extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $table = "google_geo_id";
}
