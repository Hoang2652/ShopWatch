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

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/login', 'HomeController@loginPage');
Route::get('/register', 'HomeController@registerPage');
Route::get('/watch', 'ProductController@index');
Route::post('/login-execute', 'HomeController@checkLogin');


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
