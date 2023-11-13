<?php
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ChildCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProductImageGalleryController;
use App\Http\Controllers\Backend\ProductVariantController;
use App\Http\Controllers\Backend\ProductVariantItemController;
use App\Http\Controllers\Backend\RootVendorProfileController;
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

Route::put('child-category/change-status', [ChildCategoryController::class, 'changeStatus'])
    ->name('child-category.change-status');
Route::get('get-subcategories', [ChildCategoryController::class, 'getSubCategories'])
    ->name('get-subcategories');
Route::resource('child-category', ChildCategoryController::class);

/** BRAND ROUTES */
Route::put('brand/change-status', [BrandController::class, 'changeStatus'])
    ->name('brand.change-status');
Route::resource('brand', BrandController::class);

/** VENDOR PROFILE ROUTES */
Route::resource('vendor-profile', RootVendorProfileController::class);

/** PRODUCTS ROUTES */
Route::put('products/change-status', [ProductController::class, 'changeStatus'])
    ->name('products.change-status');
Route::get('products/get-subcategories', [ProductController::class, 'getSubCategories'])
    ->name('products.get-subcategories');
Route::get('products/get-childcategories', [ProductController::class, 'getChildCategories'])
    ->name('products.get-childcategories');
Route::resource('products', ProductController::class);

/** PRODUCTS IMAGE GALLERY ROUTES */
Route::resource('products-image-gallery', ProductImageGalleryController::class);

/** PRODUCTS VARIANT ROUTES */
Route::put('products-variant/change-status', [ProductVariantController::class, 'changeStatus'])
    ->name('products-variant.change-status');
Route::resource('products-variant', ProductVariantController::class);

/** PRODUCTS VARIANT ITEM ROUTES */
Route::get('products-variant-item/{productId}/{variantId}', [ProductVariantItemController::class, 'index'])
    ->name('products-variant-item.index');
Route::get('products-variant-item/create/{productId}/{variantId}', [ProductVariantItemController::class, 'create'])
    ->name('products-variant-item.create');
Route::post('products-variant-item', [ProductVariantItemController::class, 'store'])
    ->name('products-variant-item.store');
Route::get('products-variant-item-edit/{variantItemId}', [ProductVariantItemController::class, 'edit'])
    ->name('products-variant-item.edit');
Route::put('products-variant-item-update/{variantItemId}', [ProductVariantItemController::class, 'update'])
    ->name('products-variant-item.update');
Route::delete('products-variant-item/{variantItemId}', [ProductVariantItemController::class, 'destroy'])
    ->name('products-variant-item.destroy');
Route::put('products-variant-item/change-status', [ProductVariantItemController::class, 'changeStatus'])
    ->name('products-variant-item.change-status');