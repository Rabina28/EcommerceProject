<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\DashboardController;
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

//Route::get('/', function () {
    //return view('welcome');
//});

//  frontend routes
Route::get('/',[FrontendController::class,'index']);
Route::get('/category',[FrontendController::class,'category']);
Route::get('view-category/{slug}',[FrontendController::class,'viewcategory'])->name('frontend.products.index');
Route::get('/product',[FrontendController::class,'product']);
Route::get('product/{prod_slug}',[FrontendController::class,'productview']);
Route::post('add-to-cart',[CartController::class,'addProduct']);
Route::post('delete-cart-item',[CartController::class,'deleteproduct']);
Route::post('update-cart',[CartController::class,'updatecart']);

Route::post('/add-to-wishlist',[WishlistController::class,'add']);
Route::post('delete-wishlist-item',[WishlistController::class,'deleteitem']);

Route::middleware(['auth'])->group(function (){
    Route::get('cart',[CartController::class,'viewcart']);
    Route::get('checkout',[CheckoutController::class,'index']);
    Route::post('place-order',[CheckoutController::class,'placeorder']);
    Route::get('my-order',[UserController::class,'index']);
    Route::get('view/{id}',[UserController::class,'view']);

    Route::get('wishlist',[WishlistController::class,'index']);

});

Route::get('/contactus',[FrontendController::class,'contactus'])->name('frontend.contact');
Route::post('/contactus',[FrontendController::class,'contactstore'])->name('frontend.contact.contactstore');


//Admin dashboard routes
Route::get('admin/dashboard',[AdminController::class,'dashboard']);

//Admin category routes
Route::get('admin/category',[CategoryController::class,'index'])->name('admin.category.index');
Route::get('admin/category/create',[CategoryController::class,'create'])->name('admin.category.create');
Route::put('admin/category/create',[CategoryController::class,'store'])->name('admin.category.store');
Route::get('admin/category/edit/{id}',[CategoryController::class,'edit'])->name('admin.category.edit');
Route::put('admin/category/update/{id}',[CategoryController::class,'update'])->name('admin.category.update');
Route::delete('/admin/category/destroy/{id}',[CategoryController::class,'destroy'])->name('admin.category.destroy');
Route::get('/admin/category/status/{status}/{id}',[CategoryController::class,'status']);

//Admin Product Routes
Route::get('admin/product',[ProductController::class,'index'])->name('admin.product.index');
Route::get('admin/product/create',[ProductController::class,'create'])->name('admin.product.create');
Route::put('admin/product/create',[ProductController::class,'store'])->name('admin.product.store');
Route::get('admin/product/edit/{id}',[ProductController::class,'edit'])->name('admin.product.edit');
Route::put('admin/product/update/{id}',[ProductController::class,'update'])->name('admin.product.update');
Route::delete('/admin/product/destroy/{id}',[ProductController::class,'destroy'])->name('admin.product.destroy');
Route::get('/admin/product/status/{status}/{id}',[ProductController::class,'status']);

//Admin Contact Routes
Route::get('/admin/contact/', [ContactController::class,'index'])->name('admin.contact.index');
Route::get('admin/contact/create',[ContactController::class,'create'])->name('admin.contact.create');
Route::put('admin/contact/create',[ContactController::class,'store'])->name('admin.contact.store');
Route::get('admin/contact/edit/{id}',[ContactController::class,'edit'])->name('admin.contact.edit');
Route::put('admin/contact/update/{id}',[ContactController::class,'update'])->name('admin.contact.update');
Route::delete('/admin/contact/destroy/{id}',[ContactController::class,'destroy'])->name('admin.contact.destroy');

//Admin Orders route
Route::get('orders', [OrderController::class,'index']);
Route::get('view-order/{id}', [OrderController::class,'view']);
Route::put('update-order/{id}', [OrderController::class,'updateorder']);
Route::get('/order-history', [OrderController::class,'orderhistory']);

//Admin Users route
Route::get('users', [DashboardController::class,'users']);
Route::get('view-user/{id}', [DashboardController::class,'viewuser']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
