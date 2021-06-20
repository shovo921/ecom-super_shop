<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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



Route::get('/', 'FontendController@index');
Route::get('lang/{locale}', 'LocalizationController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin/home', 'AdminController@index');
Route::get('admin','Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin','Admin\LoginController@Login');
Route::get('admin/logout', 'AdminController@Logout')->name('admin.logout');

// contact

Route::get('/contact','ContactController@index');

// Admin Section category
Route::get('admin/category','Admin\CategoryController@index')->name('admin.category.index');
Route::get('admin/category/add','Admin\CategoryController@add')->name('admin.category.add');
Route::post('admin/category/store','Admin\CategoryController@store')->name('admin.category.store');
Route::get('admin/category/{cat_id}','Admin\CategoryController@edit');
Route::post('admin/category/update','Admin\CategoryController@update')->name('admin.category.update');
Route::get('admin/category/delete/{cat_id}','Admin\CategoryController@Delete');
Route::get('admin/category/inactive/{cat_id}','Admin\CategoryController@inactive');
Route::get('admin/category/active/{cat_id}','Admin\CategoryController@active');
// Admin Section Brand
Route::get('admin/brand','Admin\BrandController@index')->name('admin.brand.index');
Route::get('admin/brand/add','Admin\BrandController@add')->name('admin.brand.add');
Route::post('admin/brand/store','Admin\BrandController@store')->name('admin.brand.store');
Route::get('admin/brand/{brand_id}','Admin\BrandController@edit');
Route::post('admin/brand/update','Admin\BrandController@update')->name('admin.brand.update');
Route::get('admin/brand/delete/{brand_id}','Admin\BrandController@Delete');
Route::get('admin/brand/inactive/{brand_id}','Admin\BrandController@inactive');
Route::get('admin/brand/active/{brand_id}','Admin\BrandController@active');
// Admin Section Coupon
Route::get('admin/coupon','Admin\CouponController@index')->name('admin.coupon.index');
Route::get('admin/coupon/add','Admin\CouponController@add')->name('admin.coupon.add');
Route::post('admin/coupon/store','Admin\CouponController@store')->name('admin.coupon.store');
Route::get('admin/coupon/{coupon_id}','Admin\CouponController@edit');
Route::post('admin/coupon/update','Admin\CouponController@update')->name('admin.coupon.update');
Route::get('admin/coupon/delete/{coupon_id}','Admin\CouponController@Delete');
Route::get('admin/coupon/inactive/{coupon_id}','Admin\CouponController@inactive');
Route::get('admin/coupon/active/{coupon_id}','Admin\CouponController@active');
// Admin product
Route::get('admin/product/index','Admin\ProductController@index')->name('admin.product.manage');
Route::get('admin/product/add','Admin\ProductController@add')->name('admin.product.add');
Route::post('admin/product/store','Admin\ProductController@store')->name('admin.product.store');
Route::get('admin/product/delete/','Admin\ProductController@Delete')->name('product.delete');
Route::get('admin/product/inactive/{product_id}','Admin\ProductController@inactive');
Route::get('admin/product/active/{product_id}','Admin\ProductController@active');
Route::get('admin/product/{product_id}','Admin\ProductController@edit');
Route::post('admin/product/update','Admin\ProductController@update')->name('admin.product.update');
Route::post('admin/product/update_image','Admin\ProductController@image_update')->name('admin.product.image_update');
// card product
Route::get('/addto/card',"CardController@add_to_card")->name('add.card');
Route::get('add/card','CardController@index')->name('show.card');
Route::get('card/delete','CardController@destroy')->name('card.close');
Route::post('card/update','CardController@update')->name('card.update');
// coupon discount fontent
Route::post('coupon/discount','CardController@discount_apply')->name('discount.apply');
// wishlist add
// coupon discount fontent
Route::get('wishlist/add','CardController@add_wishlist')->name('add_wishlist');
Route::get('show/wishlist','CardController@show_wishlist')->name('show.wishlist');
Route::get('wishlist/detele','CardController@wishlist_close')->name('wishlist.close');
// Subcibe 
Route::post('subscibe','Admin\SubcribeController@store')->name('subscribe.store');
Route::get('subscibe/index','Admin\SubcribeController@index')->name('subscribe.index');
Route::get('admin/subscibe/delete/{id}','Admin\SubcribeController@Delete');
Route::get('admin/subscibe/inactive/{id}','Admin\SubcribeController@inactive');
Route::get('admin/subscibe/active/{id}','Admin\SubcribeController@active');


