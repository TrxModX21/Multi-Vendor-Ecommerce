<?php
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\RootController;

/** ROOT ROUTES */
Route::get('dashboard', [RootController::class, 'dashboard'])->name('dashboard');

/** PROFILE ROUTES */
Route::get('profile', [ProfileController::class, 'index'])
    ->name('profile');

Route::post('profile/update', [ProfileController::class, 'updateProfile'])
    ->name('profile.update');

Route::post('profile/update/password', [ProfileController::class, 'updatePassword'])
    ->name('password.update');

/** SLIDER ROUTES */
Route::resource('slider', SliderController::class);

/** CATEGORY ROUTES */
Route::put('change-status', [CategoryController::class, 'changeStatus'])
    ->name('category.change-status');
Route::resource('category', CategoryController::class);
Route::put('subcategory/change-status', [SubCategoryController::class, 'changeStatus'])
    ->name('sub-category.change-status');
Route::resource('sub-category', SubCategoryController::class);
