<?php

use App\Http\Controllers\Backend\BackendDeliveryController;
use App\Http\Controllers\Backend\BackendCategoryController;
use App\Http\Controllers\Backend\BackendCate_NewController;
use App\Http\Controllers\Backend\BackendHomeController;
use App\Http\Controllers\Backend\BackendNewsController;
use App\Http\Controllers\Backend\BackendOrderController;
use App\Http\Controllers\Backend\BackendPermissionController;
use App\Http\Controllers\Backend\BackendProductController;
use App\Http\Controllers\Backend\BackendPromotion_ProductController;
use App\Http\Controllers\Backend\BackendRoleController;
use App\Http\Controllers\Backend\BackendSliderController;
use App\Http\Controllers\Backend\BackendUnitController;
use App\Http\Controllers\Backend\BackendUserController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\IntroduceController;
use App\Http\Controllers\Frontend\NewsController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//Frontend

Route::group(['namespace' => 'frontend'], function () {

    Route::get('', [HomeController::class, 'index']);

    Route::get('products', [ProductController::class, 'index']);
    Route::get('cate-product/{slug}', [ProductController::class, 'showCate_product_id']);
    Route::get('product-detail/{slug}', [ProductController::class, 'productDetail']);
    Route::post('product-modal', [HomeController::class, 'productModal']);
    Route::post('home-select-modal', [HomeController::class, 'home_select_Modal']);

    Route::get('news', [NewsController::class, 'index']);
    Route::get('cate-new-id/{slug}', [NewsController::class, 'showCate_new_id']);
    Route::get('new-detail/{slug}', [NewsController::class, 'newDetail']);

    Route::get('introduce', [IntroduceController::class, 'index']);

    Route::get('contact', [ContactController::class, 'index']);

    //Cart Ajax
    Route::post('add-cart-ajax', [CartController::class, 'add_cart_ajax']);
    Route::get('gio-hang', [CartController::class, 'gio_hang']);
    Route::post('update-cart', [CartController::class, 'update_cart']);
    Route::get('delete-product/{session_id}', [CartController::class, 'delete_product']);
    Route::get('delete-all-product', [CartController::class, 'delete_all_product']);

    // Check out
    Route::get('checkout', [CheckoutController::class, 'index'])->name('home.checkout');
    Route::post('home-select-delivery', [CheckoutController::class, 'home_select_delivery']);
    Route::post('home-total-feeship', [CheckoutController::class, 'home_total_feeship']);
    Route::post('calculate-delivery', [CheckoutController::class, 'calculate_delivery']);
    Route::post('home-select-feeship', [CheckoutController::class, 'select_feeship']);

    // Order confirm
    Route::post('order-confirm', [CheckoutController::class, 'order_confirm']);

    // User Order
    Route::get('user-order', [HomeController::class, 'user_order']);

    //Payment online
    Route::post('payment/online', [CheckoutController::class, 'createPayment'])->name('payment.online');
     Route::get('vnpay/return', [CheckoutController::class, 'vnpayReturn'])->name('vnpay.return');
});

//Backend

Route::group(['middleware' => 'auth'], function () {

    // Route::group(['middleware' => 'verified'], function () {

    Route::group(['namespace' => 'admin'], function () {

        Route::prefix('admin')->group(function () {
            Route::get('', [BackendHomeController::class, 'index'])->name('admin.index');
        });

        Route::prefix('users')->group(function () {
            Route::get('', [BackendUserController::class, 'index'])->name('users.list');

            Route::get('create', [BackendUserController::class, 'create'])->name('users.create');
            Route::post('store', [BackendUserController::class, 'store'])->name('users.store');

            Route::get('edit/{id}', [BackendUserController::class, 'edit'])->name('users.edit');
            Route::post('update/{id}', [BackendUserController::class, 'update'])->name('users.update');

            Route::get('delete/{id}', [BackendUserController::class, 'destroy'])->name('users.delete');
        });

        Route::prefix('roles')->group(function () {
            Route::get('', [BackendRoleController::class, 'index'])->name('roles.list');

            Route::get('create', [BackendRoleController::class, 'create'])->name('roles.create');
            Route::post('store', [BackendRoleController::class, 'store'])->name('roles.store');

            Route::get('edit/{id}', [BackendRoleController::class, 'edit'])->name('roles.edit');
            Route::post('update/{id}', [BackendRoleController::class, 'update'])->name('roles.update');

            Route::get('delete/{id}', [BackendRoleController::class, 'destroy'])->name('roles.delete');
        });

        Route::prefix('permissions')->group(function () {
            Route::get('', [BackendPermissionController::class, 'index'])->name('permissions.list');

            Route::get('create', [BackendPermissionController::class, 'create'])->name('permissions.create');
            Route::post('store', [BackendPermissionController::class, 'store'])->name('permissions.store');

            Route::get('edit/{id}', [BackendPermissionController::class, 'edit'])->name('permissions.edit');
            Route::post('update/{id}', [BackendPermissionController::class, 'update'])->name('permissions.update');

            Route::get('delete/{id}', [BackendPermissionController::class, 'destroy'])->name('permissions.delete');
        });

        Route::prefix('category')->group(function () {
            Route::get('', [BackendCategoryController::class, 'index'])->name('category.index');

            Route::get('create', [BackendCategoryController::class, 'create'])->name('category.create');
            Route::post('store', [BackendCategoryController::class, 'store'])->name('category.store');

            Route::get('edit/{id}', [BackendCategoryController::class, 'edit'])->name('category.edit');
            Route::post('update/{id}', [BackendCategoryController::class, 'update'])->name('category.update');

            Route::get('delete/{id}', [BackendCategoryController::class, 'destroy'])->name('category.delete');
        });

        Route::prefix('product')->group(function () {
            Route::get('', [BackendProductController::class, 'index'])->name('product.index');

            Route::get('create', [BackendProductController::class, 'create'])->name('product.create');
            Route::post('store', [BackendProductController::class, 'store'])->name('product.store');

            Route::get('edit/{id}', [BackendProductController::class, 'edit'])->name('product.edit');
            Route::post('update/{id}', [BackendProductController::class, 'update'])->name('product.update');

            Route::get('delete/{id}', [BackendProductController::class, 'destroy'])->name('product.delete');

            Route::get('uploadImage', [BackendProductController::class, 'uploadImage'])->name('product.uploadImage');
        });


        Route::prefix('promotion')->group(function () {
            Route::get('', [BackendPromotion_ProductController::class, 'index'])->name('promotion.index');

            Route::get('create', [BackendPromotion_ProductController::class, 'create'])->name('promotion.create');
            Route::post('store', [BackendPromotion_ProductController::class, 'store'])->name('promotion.store');
            Route::post('select-product', [BackendPromotion_ProductController::class, 'select_product'])->name('promotion.select_product');

            Route::get('edit/{id}', [BackendPromotion_ProductController::class, 'edit'])->name('promotion.edit');
            Route::post('update/{id}', [BackendPromotion_ProductController::class, 'update'])->name('promotion.update');

            Route::get('show/{id}', [BackendPromotion_ProductController::class, 'show'])->name('promotion.show');

            Route::get('delete-promotion/{id}', [BackendPromotion_ProductController::class, 'promotion_detail']);

            Route::get('delete/{id}', [BackendPromotion_ProductController::class, 'destroy'])->name('promotion.delete');
        });

        Route::prefix('unit')->group(function () {
            Route::get('', [BackendUnitController::class, 'index'])->name('unit.index');

            Route::get('create', [BackendUnitController::class, 'create'])->name('unit.create');
            Route::post('store', [BackendUnitController::class, 'store'])->name('unit.store');

            Route::get('edit/{id}', [BackendUnitController::class, 'edit'])->name('unit.edit');
            Route::post('update/{id}', [BackendUnitController::class, 'update'])->name('unit.update');

            Route::get('delete/{id}', [BackendUnitController::class, 'destroy'])->name('unit.delete');
        });

        Route::prefix('promotion')->group(function () {
            Route::get('', [BackendPromotion_ProductController::class, 'index'])->name('promotion.index');

            Route::get('create', [BackendPromotion_ProductController::class, 'create'])->name('promotion.create');
            Route::post('store', [BackendPromotion_ProductController::class, 'store'])->name('promotion.store');

            Route::get('edit/{id}', [BackendPromotion_ProductController::class, 'edit'])->name('promotion.edit');
            Route::post('update/{id}', [BackendPromotion_ProductController::class, 'update'])->name('promotion.update');

            Route::get('delete/{id}', [BackendPromotion_ProductController::class, 'destroy'])->name('promotion.delete');
        });

        Route::prefix('slider')->group(function () {
            Route::get('', [BackendSliderController::class, 'index'])->name('slider.index');

            Route::get('create', [BackendSliderController::class, 'create'])->name('slider.create');
            Route::post('store', [BackendSliderController::class, 'store'])->name('slider.store');

            Route::get('edit/{id}', [BackendSliderController::class, 'edit'])->name('slider.edit');
            Route::post('update/{id}', [BackendSliderController::class, 'update'])->name('slider.update');

            Route::get('delete/{id}', [BackendSliderController::class, 'destroy'])->name('slider.delete');
        });

        Route::prefix('cate-new')->group(function () {
            Route::get('', [BackendCate_NewController::class, 'index'])->name('cate-new.index');

            Route::get('create', [BackendCate_NewController::class, 'create'])->name('cate-new.create');
            Route::post('store', [BackendCate_NewController::class, 'store'])->name('cate-new.store');

            Route::get('edit/{id}', [BackendCate_NewController::class, 'edit'])->name('cate-new.edit');
            Route::post('update/{id}', [BackendCate_NewController::class, 'update'])->name('cate-new.update');

            Route::get('delete/{id}', [BackendCate_NewController::class, 'destroy'])->name('cate-new.delete');
        });

        Route::prefix('new')->group(function () {
            Route::get('', [BackendNewsController::class, 'index'])->name('new.index');

            Route::get('create', [BackendNewsController::class, 'create'])->name('new.create');
            Route::post('store', [BackendNewsController::class, 'store'])->name('new.store');

            Route::get('edit/{id}', [BackendNewsController::class, 'edit'])->name('new.edit');
            Route::post('update/{id}', [BackendNewsController::class, 'update'])->name('new.update');

            Route::get('delete/{id}', [BackendNewsController::class, 'destroy'])->name('new.delete');
        });

        Route::prefix('order')->group(function () {
            Route::get('order-confirmation', [BackendOrderController::class, 'orderConfirmation'])->name('order-confirmation.index');
            Route::get('shipping', [BackendOrderController::class, 'shipping'])->name('shipping.index');
            Route::get('orders', [BackendOrderController::class, 'orders'])->name('order.index');

            Route::get('countermand', [BackendOrderController::class, 'countermand'])->name('countermand.index');
            Route::get('edit/{id}', [BackendHomeController::class, 'edit']);
            Route::post('update/{id}', [BackendHomeController::class, 'update']);
             Route::get('show/{id}', [BackendHomeController::class, 'show']);
        });

        Route::prefix('feeship')->group(function(){
            Route::get('',[BackendDeliveryController::class, 'index'])->name('feeship.list');
            
            Route::post('select-delivery', [BackendDeliveryController::class, 'select_delivery']);
            Route::post('store', [BackendDeliveryController::class, 'store'])->name('feeship.store');

            Route::post('/select-feeship',[BackendDeliveryController::class, 'select_feeship']);
            Route::post('/update-delivery',[BackendDeliveryController::class, 'update_delivery']);
        });

    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
