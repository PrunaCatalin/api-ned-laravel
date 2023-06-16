<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\Sanctum;
use Illuminate\Support\Facades\Route;

class SanctumRefreshTokenServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        if (!app()->configurationIsCached()) {
            $this->mergeConfigFrom(__DIR__ . '/../../config/sanctum-refresh-token.php', 'sanctum-refresh-token');
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../../config/sanctum-refresh-token.php' => config_path('sanctum-refresh-token.php'),
        ], 'sanctum-refresh-token-config');
        Sanctum::authenticateAccessTokensUsing(function ($token, $isValid) {
            return $isValid && $this->isTokenAbilityValid($token);
        });
    }
    private function isTokenAbilityValid($token): bool
    {
        $routeNames = config('sanctum-refresh-token.refresh_route_names');
        if (is_string($routeNames)) {
            $routeNames = [$routeNames];
        }
        return collect($routeNames)->contains(Route::currentRouteName()) ?
            $this->isRefreshTokenValid($token) :
            $this->isAuthTokenValid($token);
    }


    private function isAuthTokenValid($token): bool
    {
        return $token->can('WD-Auth');
    }

    private function isRefreshTokenValid($token): bool
    {
        return $token->can('WD-Auth');
    }
}
