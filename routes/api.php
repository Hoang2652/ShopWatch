<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/admin/product/live-search', 'ProductController@productLiveSreach')->name('live-sreach');
Route::get('/admin/bill/live-search', 'BillController@getBillbyFilters')->name('bill-live-sreach');
// Route::get('/admin/product/live-search?query={query}', 'ProductController@productLiveSreach')->name('live-sreach');
