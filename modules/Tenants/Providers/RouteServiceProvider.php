<?php

namespace Modules\Tenants\Providers;

use App\Http\Middleware\ForceJsonResponse;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Modules\Tenants\Http\Middleware\CheckSanctumAuthenticationMiddleware;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The module namespace to assume when generating URLs to actions.
     *
     * @var string
     */
    protected $moduleNamespace = 'Modules\Tenants\Http\Controllers';

    /**
     * Called before routes are registered.
     *
     * Register any model bindings or pattern based filters.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
        $this->app['router']->aliasMiddleware('forceJson', ForceJsonResponse::class);
        $this->app['router']->aliasMiddleware('authTenants', CheckSanctumAuthenticationMiddleware::class);
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

       // $this->mapWebRoutes();
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
        Route::middleware('web')
            ->namespace($this->moduleNamespace)
            ->group(module_path('Tenants', '/Routes/web.php'));
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
            Route::middleware(['forceJson'])
                ->prefix('api')
                ->domain($domain)
                ->namespace($this->moduleNamespace)
                ->group(function () {
                    require module_path('Tenants','Routes/customer/auth.php');
                    require module_path('Tenants','Routes/customer/common.php');
                    require module_path('Tenants','Routes/location/location.php');
                });
            //Only Auth Users
            Route::middleware(['authTenants','forceJson'])
                ->prefix('api')
                ->domain($domain)
                ->namespace($this->moduleNamespace)
                ->group(function () {
                    require module_path('Tenants','Routes/api.php');
                    require module_path('Tenants','Routes/customer/customer.php');
                });
        }
    }
    protected function centralDomains(): array
    {
        return config('tenancy.central_domains');
    }
}
