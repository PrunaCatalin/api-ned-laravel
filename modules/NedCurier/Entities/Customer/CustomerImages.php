<?php

namespace Modules\NedCurier\Entities\Customer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustomerImages extends Model
{
    use HasFactory;

    protected $table = 'customer_images';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id_customer',
        'name',
        'type_image',
    ];

    public function customerAccount()
    {
        return $this->belongsTo(CustomerAccount::class, 'id_customer');
    }
}
