<?php

namespace App\Observers;

use Laravel\Sanctum\PersonalAccessToken;

class PersonalAccessTokenObserver
{
    //
    public function saving(PersonalAccessToken $personalAccessToken)
    {
        ///last_user + 60 * 24
        $personalAccessToken->expires_at = $personalAccessToken->expires_at->addMinutes(
            config('sanctum-refresh-token.refresh_token_expiration')
        );
    }
}
