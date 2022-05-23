<?php

// use auth;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RepairController;
use App\Http\Controllers\Admin\RepairpartController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Frontend\Cartcontroller;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\RaterepairsController;
use App\Http\Controllers\Frontend\RatingController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\ViewrepairController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Models\Repairpart;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [FrontendController::class, 'index']);
Route::get('category', [FrontendController::class, 'category']);
Route::get('view-category/{slug}', [FrontendController::class, 'viewcategory']);
Route::get('category/{cate_slug}/{prod_slug}', [FrontendController::class, 'productview']);

Route::get('my-orders', [UserController::class, 'index']);
Route::get('my-orders2', [UserController::class, 'index2']);

Route::get('userepair/{id}', [ViewrepairController::class, 'userview']);

// search controller
Route::get('product-list', [FrontendController::class, 'productlistAjax']);
Route::post('searchproduct', [FrontendController::class, 'searchproduct']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//    Cart controller
Route::post('add-to-cart', [Cartcontroller::class, 'addProduct']);
Route::post('delete-cart-item', [Cartcontroller::class, 'deleteProduct']);
Route::post('update-cart', [Cartcontroller::class, 'updatecart']);
Route::get('load-cart-data', [Cartcontroller::class, 'cartcount']);

Route::post('add-to-wishlist', [WishlistController::class, 'add']);
Route::post('delete-wishlist-item', [WishlistController::class, 'deleteitem']);
Route::get('load-wishlist-count', [WishlistController::class, 'wishcount']);

// Viewrepair Controller
Route::get('repairs', [ViewrepairController::class, 'index']);
Route::get('repair_list', [ViewrepairController::class, 'repairlistAjax']);
Route::any('searchrepair', [ViewrepairController::class, 'searchrepair']);

Route::middleware(['auth'])->group(function () {
    Route::get('cart', [Cartcontroller::class, 'viewcart']);
    Route::get('cart2', [Cartcontroller::class, 'viewcart2']);
    Route::get('checkout', [CheckoutController::class, 'index']);
    Route::post('place-order', [CheckoutController::class, 'placeorder']);
    Route::post('proceed-to-pay', [CheckoutController::class, 'razorpaycheck']);

    // Viewrepair Controller
    Route::get('view-repair/{id}', [ViewrepairController::class, 'viewrepair']);
    Route::post('add-repairrate', [RaterepairsController::class, 'add']);
    Route::post('add-rating', [RatingController::class, 'add']);

    Route::get('add-review/{product_slug}/userreview', [ReviewController::class, 'add']);
    Route::get('edit-review/{products_slug}/userreview', [ReviewController::class, 'edit']);
    Route::post('add-review', [ReviewController::class, 'create']);
    Route::put('update-review', [ReviewController::class, 'update']);

    Route::get('my-orders', [UserController::class, 'index']);
    Route::get('my-orders2', [UserController::class, 'index2']);

    Route::get('view-order/{id}', [UserController::class, 'view']);
    Route::get('view-order/{id}', [UserController::class, 'view2']);
    Route::get('delete-order/{id}', [UserController::class, 'delete']);

    Route::get('wishlist', [WishlistController::class, 'index']);
    Route::get('wishlist2', [WishlistController::class, 'index2']);

    Route::get('myprofile/{id}', [UserController::class, 'viewprofile']);
    Route::get('user', [UserController::class, 'profile']);
    Route::put('updateprofile', [UserController::class, 'update']);

});
// CheckoutController

Route::middleware(['auth', 'isAdmin'])->group(function () {

    Route::get('/dashboard', 'Admin\FrontendController@index');

    //Category routes
    Route::get('categories', 'Admin\CategoryController@index');
    Route::get('add-category', 'Admin\CategoryController@add');
    Route::post('insert-category', 'Admin\CategoryController@insert');
    Route::get('edit-category/{id}', [CategoryController::class, 'edit']);
    Route::put('update.category/{id}', [CategoryController::class, 'update']);
    Route::get('delete-category/{id}', [CategoryController::class, 'destroy']);

    // Service Controller
    Route::get('service', [ServiceController::class, 'index']);
    Route::get('add-service', [ServiceController::class, 'add']);
    Route::post('insert-service', [ServiceController::class, 'insert']);
    Route::get('edit-service/{id}', [ServiceController::class, 'edit']);
    Route::put('update.service/{id}', [ServiceController::class, 'update']);
     
    // Repairpart Routers
    Route::get('part',[RepairpartController::class, 'index']);
    Route::get('add_parts', [RepairpartController::class, 'add']);
    Route::post('insert_parts', [RepairpartController::class, 'insert']);
    Route::get('edit_part/{id}', [RepairpartController::class, 'edit']);
    Route::post('update_part/{id}',[RepairpartController::class, 'update']);

    // Repair Controller
    Route::get('repair', [RepairController::class, 'index']);
    Route::get('add-repair', [RepairController::class, 'add']);
    Route::post('insert-repair', [RepairController::class, 'insert']);
    Route::get('edit-repair/{id}', [RepairController::class, 'edit']);
    Route::put('update.repair/{id}', [RepairController::class, 'update']);
    Route::get('delete-repair/{id}', [RepairController::class, 'delete']);
    Route::get('selserv', [RepairController::class, 'getTotalCost']);

    // Products routes
    Route::get('products', [ProductController::class, 'index']);
    Route::get('add-products', [ProductController::class, 'add']);
    Route::post('insert-product', [ProductController::class, 'insert']);
    Route::get('edit-product/{id}', [ProductController::class, 'edit']);
    Route::put('update.product/{id}', [ProductController::class, 'update']);
    Route::get('delete-product/{id}', [ProductController::class, 'destroy']);

    // Order Controller
    Route::get('orders', [OrderController::class, 'index']);
    Route::get('admin/view-order/{id}', [OrderController::class, 'view']);
    Route::put('update-order/{id}', [OrderController::class, 'updateorder']);
    Route::get('order-history', [OrderController::class, 'orderhistory']);

    Route::get('users', [DashboardController::class, 'users']);
    Route::get('view-users/{id}', [DashboardController::class, 'viewusers']);
    Route::get('order', [DashboardController::class, 'complete']);

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
Route::get('/change-password', [App\Http\Controllers\HomeController::class, 'changePassword'])->name('change-password');
Route::post('/change-password', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('update-password');

