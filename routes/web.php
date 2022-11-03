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

//frontend
//route from controllers by class & method name
Route::get('/', 'HomeController@index');
Route::get('/login', 'HomeController@loginPage');
Route::get('/register', 'HomeController@registerPage');
Route::post('/login-execute', 'HomeController@checkLogin');
Route::get('/logout', 'HomeController@logout');
Route::get('/tintuc', 'NewsController@showHomeNews');
Route::get('/tintuc/id={id}', 'NewsController@getNewsDetail');
Route::get('/hotro', 'SupportController@getViewSupport');
Route::get('/hotro/id={id}', 'SupportController@getViewSupportDetail');
Route::get('/sanpham', 'ProductController@getViewProduct');
Route::get('/sanpham/dongho/', 'ProductController@getProductByProductType');
Route::get('/sanpham/phukien/', 'ProductController@getViewAccessory');
Route::get('/sanpham/idsanpham={id}', 'ProductController@getViewProductDetail');
Route::get('/thongtincanhan', 'ProfileController@getViewProfile');
Route::get('/thongtincanhan/lichsumuahang', 'ProfileController@getViewHistory');
Route::get('/thongtincanhan/thaydoithongtincanhan', 'ProfileController@getViewChangeProfile');
//backend
Route::get('/admin', 'AdminController@index');