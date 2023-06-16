<?php

namespace Modules\Admin\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The module namespace to assume when generating URLs to actions.
     *
     * @var string
     */
    protected $moduleNamespace = 'Modules\Admin\Http\Controllers';

    /**
     * Called before routes are registered.
     *
     * Register any model bindings or pattern based filters.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();
        parent::boot();
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        foreach ($this->centralDomains() as $domain) {
            Route::middleware('web')
                ->domain($domain)
                ->namespace($this->moduleNamespace)
                ->group(module_path('Admin', '/Routes/web.php'));
            Route::middleware('web')
                ->domain($domain)
                ->namespace($this->moduleNamespace)
                ->group(module_path('Admin', '/Routes/Dashboard/dashboard.php'));
            Route::middleware('web')
                ->domain($domain)
                ->namespace($this->moduleNamespace)
                ->group(module_path('Admin', '/Routes/Apps/apps.php'));
            Route::middleware('web')
                ->domain($domain)
                ->namespace($this->moduleNamespace)
                ->group(module_path('Admin', '/Routes/Account/account.php'));
            Route::middleware('web')
                ->domain($domain)
                ->namespace($this->moduleNamespace)
                ->group(module_path('Admin', '/Routes/common.php'));
        }
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        foreach ($this->centralDomains() as $domain) {

            Route::prefix('api')
                ->domain($domain)
                ->middleware(['api','auth:sanctum'])
                ->namespace($this->moduleNamespace)
                ->group(function () {
                    require module_path('Admin', '/Routes/api.php');
                });
        }
    }

    protected function centralDomains(): array
    {
        return config('tenancy.central_domains');
    }
}
