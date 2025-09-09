<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\BusinessUnitController;
use App\Http\Controllers\ItemCategoryController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return Auth::check()
        ? redirect()->route('dashboard')
        : redirect()->route('login');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.post');
});

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::middleware(['company.filled'])->group(function () {
        Route::middleware(['can:manage-setup'])->group(function () {
            Route::get('/company', [CompanyController::class, 'edit'])->name('company.edit');
            Route::put('/company', [CompanyController::class, 'update'])->name('company.update');
            Route::resource('business-units', BusinessUnitController::class)->except(['show']);
            Route::resource('users', UserController::class)->except(['show']);
            Route::put('/users/{user}/reset-password', [UserController::class, 'resetPassword'])->name('users.resetPassword');
            Route::put('/users/{user}/change-password', [UserController::class, 'changePassword'])->name('users.changePassword');
            Route::prefix('items')->name('items.')->group(function () {
                //
            });
        });
        Route::resources([
            'brands' => BrandController::class,
            'item-categories' => ItemCategoryController::class
        ], ['except' => ['show']]);
    });

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
        