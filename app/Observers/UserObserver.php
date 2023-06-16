<?php

namespace App\Observers;

use App\Models\Users\User;
use App\Models\Users\UsersDetails;
use Carbon\Carbon;

class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\Users\User  $user
     * @return void
     */
    public function created(User $user)
    {
        UsersDetails::create([
            "user_id" => $user->id,
            "date_of_birth" => "1900-01-01"
        ]);
    }

}
