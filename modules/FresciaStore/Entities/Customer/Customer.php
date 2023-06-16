<?php

namespace Modules\FresciaStore\Entities\Customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Modules\FresciaStore\Database\factories\CustomerFactory;
use Illuminate\Contracts\Auth\Authenticatable;

class Customer extends Model implements Authenticatable
{
    use HasFactory ;
    use Notifiable;


    protected static function newFactory()
    {
        return CustomerFactory::new();
    }
    protected $fillable = [
        'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->{$this->getAuthIdentifierName()};
    }

    public function getRememberToken()
    {
        return $this->{$this->getRememberTokenName()};
    }

    public function setRememberToken($value)
    {
        $this->{$this->getRememberTokenName()} = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    //Relations
    public function details()
    {
        return $this->hasOne(CustomerDetails::class, "customer_id");
    }
    public function addresses()
    {
        return $this->hasMany(CustomerAddresses::class, 'customer_id');
    }
}
