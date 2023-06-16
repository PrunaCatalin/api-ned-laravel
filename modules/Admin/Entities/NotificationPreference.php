<?php

namespace Modules\Admin\Entities;

use App\Models\Users\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NotificationPreference extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'email_preference', 'sms_preference'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
