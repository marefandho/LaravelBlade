<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Repositories\BusinessUnitRepository;
use App\Interfaces\BusinessUnitRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            BusinessUnitRepositoryInterface::class,
            BusinessUnitRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('manage-setup', function ($user) {
            return $user->isSuperAdmin();
        });
    }
}
