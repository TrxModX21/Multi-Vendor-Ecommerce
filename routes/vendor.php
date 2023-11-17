<?php
use App\Http\Controllers\Backend\VendorProductController;
use App\Http\Controllers\Backend\VendorProductImageGalleryController;
use App\Http\Controllers\Backend\VendorProductVariantController;
use App\Http\Controllers\Backend\VendorProductVariantItemController;
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
Route::put('products/change-status', [VendorProductController::class, 'changeStatus'])
    ->name('products.change-status');
Route::get('products/get-subcategories', [VendorProductController::class, 'getSubCategories'])
    ->name('products.get-subcategories');
Route::get('products/get-childcategories', [VendorProductController::class, 'getChildCategories'])
    ->name('products.get-childcategories');
Route::resource('products', VendorProductController::class);

/** PRODUCTS IMAGE GALLERY ROUTES */
Route::resource('products-image-gallery', VendorProductImageGalleryController::class);

/** PRODUCTS VARIANT ROUTES */
Route::put('products-variant/change-status', [VendorProductVariantController::class, 'changeStatus'])
    ->name('products-variant.change-status');
Route::resource('products-variant', VendorProductVariantController::class);

/** PRODUCTS VARIANT ITEM ROUTES */
Route::get('products-variant-item/{productId}/{variantId}', [VendorProductVariantItemController::class, 'index'])
    ->name('products-variant-item.index');
Route::get('products-variant-item/create/{productId}/{variantId}', [VendorProductVariantItemController::class, 'create'])
    ->name('products-variant-item.create');
Route::post('products-variant-item', [VendorProductVariantItemController::class, 'store'])
    ->name('products-variant-item.store');
Route::get('products-variant-item-edit/{variantItemId}', [VendorProductVariantItemController::class, 'edit'])
    ->name('products-variant-item.edit');
Route::put('products-variant-item-update/{variantItemId}', [VendorProductVariantItemController::class, 'update'])
    ->name('products-variant-item.update');
Route::delete('products-variant-item/{variantItemId}', [VendorProductVariantItemController::class, 'destroy'])
    ->name('products-variant-item.destroy');
Route::put('products-variant-item/change-status', [VendorProductVariantItemController::class, 'changeStatus'])
    ->name('products-variant-item.change-status');