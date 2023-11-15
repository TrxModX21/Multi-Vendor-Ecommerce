<?php
use App\Http\Controllers\Backend\VendorProductController;
use App\Http\Controllers\Backend\VendorProfileController;
use App\Http\Controllers\Backend\VendorShopProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\VendorController;

/** VENDOR ROUTES */
Route::get('dashboard', [VendorController::class, 'dashboard'])
    ->name('dashboard');
Route::get('profile', [VendorProfileController::class, 'index'])
    ->name('profile');
Route::put('profile', [VendorProfileController::class, 'updateProfile'])
    ->name('profile.update');
Route::post('profile', [VendorProfileController::class, 'updatePassword'])
    ->name('profile.update.password');

/** SHOP PROFILE ROUTES */
Route::resource('shop-profile', VendorShopProfileController::class);

/** PRODUCTS ROUTES */
Route::resource('products', VendorProductController::class);
