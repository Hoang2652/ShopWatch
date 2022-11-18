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

/*
|--------------------------------------------------------------------------
| ADMIN PAGES
|--------------------------------------------------------------------------
*/
Route::get('/admin', 'AdminController@loginPage');
Route::get('/admin/login', 'AdminController@loginPage');
Route::post('/admin/login-execute', 'AdminController@checkLogin');
Route::get('/admin/home', 'AdminController@adminHomePage');

// category manager pages
Route::get('/admin/category', 'CategoryController@index');
Route::get('/admin/category/add', 'CategoryController@addCategoryPage');
Route::post('/admin/category/add/execute', 'CategoryController@addCategory');
Route::get('/admin/category/update/id={id}', 'CategoryController@updateCategoryPage');
Route::post('/admin/category/update/id={id}/execute', 'CategoryController@updateCategory');
Route::get('/admin/category/delete/id={id}/execute', 'CategoryController@deleteCategory');


// product manager pages
Route::get('/admin/product', 'ProductController@index');
Route::get('/admin/product/add', 'ProductController@addProductPage');
Route::post('/admin/product/add/execute', 'ProductController@addProduct');
Route::post('/admin/product/change-status/execute', 'ProductController@changeStatusProduct');
Route::get('/admin/product/update/id={id}', 'ProductController@updateProductPage')->name('update-product');
Route::post('/admin/product/update/id={id}/execute', 'ProductController@updateProduct');
Route::get('/admin/product/delete/id={id}/execute', 'ProductController@deleteProduct')->name('delete-product');

// user manager pages
Route::get('/admin/user', 'UserController@index');
Route::get('/admin/user/add', 'UserController@addUserPage');
Route::post('/admin/user/add/execute', 'UserController@addUser');
Route::get('/admin/user/change-status/id={id}/execute', 'UserController@changeStatusUser');
Route::get('/admin/user/update/id={id}', 'UserController@updateUserPage')->name('update-user');
Route::post('/admin/user/update/id={id}/execute', 'UserController@updateUser');
Route::get('/admin/user/delete/id={id}/execute', 'UserController@deleteUser')->name('delete-user');

// News manager pages
Route::get('/admin/news', 'NewsController@index');
Route::get('/admin/news/add', 'NewsController@addNewsPage');
Route::post('/admin/news/add/execute', 'NewsController@addNews');
Route::get('/admin/news/update/id={id}', 'NewsController@updateNewsPage');
Route::post('/admin/news/update/id={id}/execute', 'NewsController@updateNews');
Route::get('/admin/news/delete/id={id}/execute', 'NewsController@deleteNews');

// Support manager pages
Route::get('/admin/support', 'SupportController@index');
Route::post('/admin/faq/add/execute', 'FAQController@addFAQ');
Route::post('/admin/faq/update/execute', 'FAQController@updateFAQ');
Route::post('/admin/faq/delete/execute', 'FAQController@deleteFAQ');
Route::get('/admin/faq/detail/execute', 'FAQController@getFQADetailbyAjax')->name('faq-detail');

Route::post('/admin/support/update/id={id}/execute', 'SupportController@updateSupport');
Route::get('/admin/support/delete/id={id}/execute', 'SupportController@deleteSupport');

// Support manager pages
Route::get('/admin/statistic', 'StatisticController@index');
Route::post('/admin/statistic/profit', 'StatisticController@profitByDateRange');
Route::post('/admin/statistic/profit/byDateRange', 'StatisticController@profitArray');
Route::post('/admin/statistic/profit/byMilestone', 'StatisticController@profitArray');


// Bill manager pages
Route::get('/admin/bill', 'BillController@index');
Route::get('/admin/bill/detail/id={id}', 'BillController@BillDetailPage');
Route::get('/admin/bill/print/id={id}/execute', 'BillController@billPrintPage');
Route::get('/admin/bill/delete/id={id}/execute', 'BillController@deleteBill');
Route::post('/admin/bill/change-status/execute', 'BillController@changeBillStatusByID');


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
