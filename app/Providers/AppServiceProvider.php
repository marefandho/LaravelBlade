<?php

namespace App\Providers;

use App\Interfaces\BrandRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Repositories\BusinessUnitRepository;
use App\Interfaces\BusinessUnitRepositoryInterface;
use App\Interfaces\ItemCategoryRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Repositories\BrandRepository;
use App\Repositories\ItemCategoryRepository;
use App\Repositories\UserRepository;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->registerRepositories();
    }

    public function registerRepositories(): void
    {
        $repositories = [
            BusinessUnitRepositoryInterface::class => BusinessUnitRepository::class,
            UserRepositoryInterface::class => UserRepository::class,
            BrandRepositoryInterface::class => BrandRepository::class,
            ItemCategoryRepositoryInterface::class => ItemCategoryRepository::class,
        ];

        foreach ($repositories as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }
    }
    
    public function boot(): void
    {
        Gate::define('manage-setup', function ($user) {
            return $user->isSuperAdmin();
        });
    }
}
