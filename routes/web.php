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

//backend
Route::get('/admin', 'AdminController@index');