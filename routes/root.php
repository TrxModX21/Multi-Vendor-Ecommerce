<?php
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ChildCategoryController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\FlashSaleController;
use App\Http\Controllers\Backend\PaymentSettingController;
use App\Http\Controllers\Backend\PaypalSettingController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProductImageGalleryController;
use App\Http\Controllers\Backend\ProductVariantController;
use App\Http\Controllers\Backend\ProductVariantItemController;
use App\Http\Controllers\Backend\RootVendorProfileController;
use App\Http\Controllers\Backend\SellerProductController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\ShippingRuleController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\StripeSettingController;
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

/** SELLER PRODUCT ROUTES */
Route::get('seller-product', [SellerProductController::class, 'index'])
    ->name('seller-product.index');
Route::get('seller-pending-product', [SellerProductController::class, 'pendingProduct'])
    ->name('seller-pending-product.index');
Route::put('change-approve-status', [SellerProductController::class, 'changeApproveStatus'])
    ->name('change-approve-status');

/** FLASH SALE ROUTES */
Route::get('flash-sale', [FlashSaleController::class, 'index'])
    ->name('flash-sale.index');
Route::put('flash-sale', [FlashSaleController::class, 'update'])
    ->name('flash-sale.update');
Route::post('flash-sale/add-product', [FlashSaleController::class, 'addProduct'])
    ->name('flash-sale.add-product');
Route::put('flash-sale/show-at-home/status-change', [FlashSaleController::class, 'homeStatus'])
    ->name('flash-sale.show-at-home.status-change');
Route::put('flash-sale/change-status', [FlashSaleController::class, 'changeStatus'])
    ->name('flash-sale.change-status');
Route::delete('flash-sale/{id}', [FlashSaleController::class, 'destroy'])
    ->name('flash-sale.destroy');

/** COUPON ROUTES */
Route::put('coupons/change-status', [CouponController::class, 'changeStatus'])
    ->name('coupons.change-status');
Route::resource('coupons', CouponController::class);

/** SHIPPING RULE ROUTES */
Route::put('shipping-rule/change-status', [ShippingRuleController::class, 'changeStatus'])
    ->name('shipping-rule.change-status');
Route::resource('shipping-rule', ShippingRuleController::class);

/** SETTINGS ROUTES */
Route::get('settings', [SettingController::class, 'index'])
    ->name('settings.index');
Route::put('general-setting-update', [SettingController::class, 'generalSettingUpdate'])
    ->name('general-setting-update');
Route::get('payment-setting', [PaymentSettingController::class, 'index'])->name('payment-setting.index');

/** PAYPAL ROUTES */
Route::resource('paypal-setting', PaypalSettingController::class);

/** STRIPE ROUTES */
Route::put('stripe-setting/{id}', [StripeSettingController::class, 'update'])->name('stripe-setting.update');
