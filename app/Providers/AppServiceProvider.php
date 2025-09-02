<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Custom blade directive to check admin role
        Blade::if('admin', function () {
            return Auth::check() && (bool) (data_get(Auth::user(), 'is_admin') || data_get(Auth::user(), 'role') === 'admin');
        });
    }
}
