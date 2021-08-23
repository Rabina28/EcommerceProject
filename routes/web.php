<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
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

Route::get('/',[FrontendController::class,'index']);

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




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
