<?php

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

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
//frontend
Route::get('/',[HomeController::class,'index']);
//danh mục sản phẩm
Route::get('/danh-muc-san-pham/{id}',[CategoryProductController::class,'show_category_home']);
//thương hiệu sản phẩm
Route::get('/thuong-hieu-san-pham/{id}',[BrandProductController::class,'show_brand_home']);
// chi tiết sản phẩm
Route::get('/chi-tiet-san-pham/{id}',[ProductController::class,'show_product']);


//admin
Route::get('/admin',[AdminController::class,'index']);
Route::get('/dashboard',[AdminController::class,'show_dashboard'])->name('dashboard');
Route::post('/admin',[AdminController::class,'dashboard'])->name('login_dashboard');
Route::get('/logout',[AdminController::class,'logout'])->name('logout_dashboard');
//categoryproduct

Route::get('/add-category',[CategoryProductController::class,'add_category']);

Route::get('/edit-category/{id}',[CategoryProductController::class,'edit_category']);
Route::post('/update-category/{id}',[CategoryProductController::class,'update_category']);

Route::get('/unactive-category/{id}',[CategoryProductController::class,'unactive_category']);
Route::get('/active-category/{id}',[CategoryProductController::class,'active_category']);

Route::post('/save-category',[CategoryProductController::class,'save_category'])->name('save_category');
Route::get('/all-category',[CategoryProductController::class,'all_category']);
Route::get('/delete-category/{id}',[CategoryProductController::class,'delete_category']);


//brand
Route::get('/add-brand',[BrandProductController::class,'add_brand']);

Route::get('/edit-brand/{id}',[BrandProductController::class,'edit_brand']);
Route::post('/update-brand/{id}',[BrandProductController::class,'update_brand']);

Route::get('/unactive-brand/{id}',[BrandProductController::class,'unactive_brand']);
Route::get('/active-brand/{id}',[BrandProductController::class,'active_brand']);

Route::post('/save-brand',[BrandProductController::class,'save_brand'])->name('save_brand');
Route::get('/all-brand',[BrandProductController::class,'all_brand']);
Route::get('/delete-brand/{id}',[BrandProductController::class,'delete_brand']);

//products
Route::get('/add-product',[ProductController::class,'add_product']);

Route::get('/edit-product/{id}',[ProductController::class,'edit_product']);
Route::post('/update-product/{id}',[ProductController::class,'update_product']);

Route::get('/unactive-product/{id}',[ProductController::class,'unactive_product']);
Route::get('/active-product/{id}',[ProductController::class,'active_product']);

Route::post('/save-product',[ProductController::class,'save_product'])->name('save_product');
Route::get('/all-product',[ProductController::class,'all_product']);
Route::get('/delete-product/{id}',[ProductController::class,'delete_product']);
 //Cart
 Route::post('/save-cart',[CartController::class,'save_cart']);
 Route::get('/show-cart',[CartController::class,'show_cart']);
 Route::get('/delete-to-cart/{rowId}',[CartController::class,'delete_to_cart']);
 Route::get('/up-qty/{rowId}',[CartController::class,'congsoluong']);
 Route::get('/tru-qty/{rowId}',[CartController::class,'trusoluong']);
