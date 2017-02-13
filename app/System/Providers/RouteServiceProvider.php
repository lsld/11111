<?php

namespace System\Providers;

use DirectoryIterator;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $webNamespace = 'Web\Controllers';

    protected $apiNamespace = 'Api\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

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

        //
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
        Route::group([
            'middleware' => 'web',
            'namespace' => $this->webNamespace,
        ], function ($router) {
            if (!$this->app->routesAreCached()) {
                foreach (new DirectoryIterator(base_path('routes/web')) as $file) {
                    if (!$file->isDot() && !$file->isDir()) {
                        require base_path('routes/web/' . $file->getFilename());
                    }
                }
            }
        });
    }

    /**
     * Define the "api" routes for the application.App\Role
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::group([
            'middleware' => 'api',
            'namespace' => $this->apiNamespace,
            'prefix' => 'api',
        ], function ($router) {
            if (!$this->app->routesAreCached()) {
                foreach (new DirectoryIterator(base_path('routes/api')) as $file) {
                    if (!$file->isDot() && !$file->isDir()) {
                        require base_path('routes/api/' . $file->getFilename());
                    }
                }
            }
        });
    }
}
