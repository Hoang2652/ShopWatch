<?php

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

/*
|--------------------------------------------------------------------------
| CUSTOMER PAGES
|--------------------------------------------------------------------------
*/
// home
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
// login and register
Route::get('/login', 'HomeController@loginPage');
Route::get('/register', 'HomeController@registerPage');
Route::post('/login-execute', 'HomeController@checkLogin');
Route::get('/logout', 'HomeController@logout');
Route::post('/register-Account', 'HomeController@registerAccount');
// product
Route::get('/watch', 'ProductController@index');
Route::get('/sanpham', 'ProductController@getViewProduct');
Route::get('/sanpham/dongho/', 'ProductController@getProductByProductType');
Route::get('/sanpham/phukien/', 'ProductController@getViewAccessory');
Route::get('/sanpham/idsanpham={id}', 'ProductController@getViewProductDetail');
Route::get('/sanpham/iddanhmuc={id}', 'ProductController@getViewCategory');
Route::post('/rating', 'ProductController@rating');
// search
Route::get("/search",'SearchController@live_search')->name("search_product");
Route::get("/search-support",'SearchController@live_search_sp')->name("search_support");
Route::get('/timkiem', 'SearchController@search');
// news
Route::get('/tintuc', 'NewsController@showHomeNews');
Route::get('/tintuc/id={id}', 'NewsController@getNewsDetail');
// support
Route::get('/hotro', 'SupportController@getViewSupport');
Route::get('/hotro/id={id}', 'SupportController@getViewSupportDetail');
Route::post('/sent-support', 'SupportController@sent_support');
// profile
Route::get('/thongtincanhan', 'ProfileController@getViewProfile');
Route::get('/thongtincanhan/lichsumuahang', 'ProfileController@getViewHistory');
Route::get('/thongtincanhan/thaydoithongtincanhan', 'ProfileController@getViewChangeProfile');
Route::get('/thongtincanhan/doimatkhau', 'ProfileController@changePassword');
Route::post('/thongtincanhan/change-password', 'ProfileController@change_password');
Route::post('/thongtincanhan/change-profile', 'ProfileController@change_profile');
// cart
Route::get('/giohang', 'CartController@getViewCart');
Route::post('/save-cart', 'CartController@save_cart');
Route::get('/delete-to-cart/{rowId}', 'CartController@delete_to_cart');
Route::get('/clear-cart', 'CartController@clear_cart');
// checkout
Route::get('/thanhtoan', 'CheckoutController@getViewCheckout');
Route::post('/check-out', 'CheckoutController@check_out');
//backend
Route::get('/admin', 'AdminController@index');

/*
|--------------------------------------------------------------------------
| ADMIN PAGES
|--------------------------------------------------------------------------
*/
Route::get('/admin', 'AdminController@loginPage');
Route::get('/admin/login', 'AdminController@loginPage');
Route::post('/admin/login-execute', 'AdminController@checkLogin');
Route::get('/admin/home', 'AdminController@adminHomePage');

// category pages
Route::get('/admin/category', 'CategoryController@index');
Route::get('/admin/category/add', 'CategoryController@addCategoryPage');
Route::post('/admin/category/add/execute', 'CategoryController@addCategory');
Route::get('/admin/category/update/id={id}', 'CategoryController@updateCategoryPage');
Route::post('/admin/category/update/id={id}/execute', 'CategoryController@updateCategory');
Route::get('/admin/category/delete/id={id}/execute', 'CategoryController@deleteCategory');


// product pages
Route::get('/admin/product', 'ProductController@index');
Route::get('/admin/product/add', 'ProductController@addProductPage');
Route::post('/admin/product/add/execute', 'ProductController@addProduct');
Route::post('/admin/product/change-status/execute', 'ProductController@changeStatusProduct');
Route::get('/admin/product/update/id={id}', 'ProductController@updateProductPage');
Route::post('/admin/product/update/id={id}/execute', 'ProductController@updateProduct');
Route::get('/admin/product/delete/id={id}/execute', 'ProductController@deleteProduct');

/**************************************************************************************************** */
// below are not touched yet

// category pages
Route::get('/admin/category', 'CategoryController@index');
Route::get('/admin/category/add', 'CategoryController@addCategoryPage');
Route::post('/admin/category/add/execute', 'CategoryController@addCategory');
Route::get('/admin/category/update/id={id}', 'CategoryController@updateCategoryPage');
Route::post('/admin/category/update/id={id}/execute', 'CategoryController@updateCategory');
Route::get('/admin/category/delete/id={id}/execute', 'CategoryController@deleteCategory');
Route::get('/admin/quanlynguoidung', 'AdminController@adminHomePage');
Route::get('/admin/quanlydoanhthu', 'AdminController@adminHomePage');
Route::get('/admin/quanlytintuc', 'AdminController@adminHomePage');
Route::get('/admin/quanlyhotro', 'AdminController@adminHomePage');
Route::get('/admin/quanlysanpham', 'AdminController@adminHomePage');
Route::get('/admin/quanlyhoadon', 'AdminController@adminHomePage');
Route::get('/admin/quanlynhapxuatkhohang', 'AdminController@adminHomePage');
//Route::get('/admin', 'AdminController@index');
