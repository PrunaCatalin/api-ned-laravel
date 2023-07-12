<?php

namespace App\Providers;

use App\Mixins\CsvMixin;
use App\Mixins\StrMixin;
use App\Models\Acl\AclModules;
use App\Models\Users\User;
use App\Observers\AclModuleObserver;
use App\Observers\PersonalAccessTokenObserver;
use App\Observers\UserObserver;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Sanctum\PersonalAccessToken;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        if ($this->app->environment('local') && Cookie::get('telescope')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     * @throws \ReflectionException
     */
    public function boot()
    {
        Str::mixin(new StrMixin());
        Arr::mixin(new CsvMixin());
        PersonalAccessToken::observe(PersonalAccessTokenObserver::class);
        User::observe(UserObserver::class);
    }
}
