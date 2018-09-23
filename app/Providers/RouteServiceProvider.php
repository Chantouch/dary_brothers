<?php

namespace App\Providers;

use Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
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

        $this->mapAdminRoutes();

        $this->mapAdminApiRoutes();

        $this->mapAuthRoutes();

        $this->mapCustomerRoutes();

        $this->mapCustomerApiRoutes();
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
        $locale = Request::segment(1);

        Route::group([
            'middleware' => 'web',
            'namespace' => $this->namespace,
            'prefix' => $locale
        ], function ($router) {
            require base_path('routes/web.php');
        });
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapAuthRoutes()
    {
        $locale = Request::segment(1);

        Route::group([
            'middleware' => 'web',
            'namespace' => $this->namespace . '\Admin',
            'prefix' => $locale . '/admin',
            'as' => 'admin.'
        ], function ($router) {
            require base_path('routes/auth.php');
        });
    }

    /**
     * Define the "admin" routes for the application.
     *
     * These routes are typically stateless.
     */
    protected function mapAdminRoutes(): void
    {
        $locale = Request::segment(1);

        Route::group([
            'middleware' => ['web', 'auth:admin'], //, 'role:admin'
            'namespace' => $this->namespace . '\Admin',
            'prefix' => $locale . '/admin',
            'as' => 'admin.'
        ], function ($router) {
            require base_path('routes/admin.php');
        });
    }

    /**
     * Define the "admin" routes for the application.
     *
     * These routes are typically stateless.
     */
    protected function mapAdminApiRoutes(): void
    {
        $locale = Request::segment(1);

        Route::group([
            'middleware' => ['web', 'auth:admin'], //'role:admin'
            'namespace' => $this->namespace . '\Admin\Api',
            'prefix' => $locale . '/admin/api',
            'as' => 'admin.api.'
        ], function ($router) {
            require base_path('routes/admin-api.php');
        });
    }

    /**
     * Define the "admin" routes for the application.
     *
     * These routes are typically stateless.
     */
    protected function mapCustomerApiRoutes(): void
    {
        $locale = Request::segment(1);

        Route::group([
            'middleware' => ['web'],
            'namespace' => $this->namespace . '\Customer',
            'prefix' => $locale . '/customer',
            'as' => 'customer.'
        ], function ($router) {
            require base_path('routes/customer-api.php');
        });
    }

    /**
     * Define the "admin" routes for the application.
     *
     * These routes are typically stateless.
     */
    protected function mapCustomerRoutes(): void
    {
        $locale = Request::segment(1);

        Route::group([
            'middleware' => ['web', 'auth:customer'], //, 'role:admin'
            'namespace' => $this->namespace . '\Customer',
            'prefix' => $locale . '/customer',
            'as' => 'customer.'
        ], function ($router) {
            require base_path('routes/customer.php');
        });
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
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }
}
