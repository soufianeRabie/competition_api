<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {

        $this->configureRateLimiting();

        $this->routes(function () {
            $routePaths = [
                'api',
                'api/auth'
            ];

            foreach ($routePaths as $path) {
                $prefix = 'api';
                $group  = base_path("routes/{$path}.php");

                if ($path === $prefix) {
                    Route::prefix($prefix)->middleware('api')->group($group);
                } else {
                    Route::prefix($prefix)->middleware(['api', 'auth:sanctum'])->group($group);
                }
            }

            Route::middleware('web')->group(base_path('routes/web.php'));
        });

    }

    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(120)->by($request->user()?->id ?: $request->ip());
        });

    }
}
