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

//transaction manage
Route::post('/customerRequire/execute', 'CheckoutController@changeBillStatus');

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

Route::post('/admin/support/delete/execute', 'SupportController@deleteSupport');
Route::get('/admin/support/detail/execute', 'SupportController@getSupportDetailbyAjax')->name('support-detail');


// Statistic manager pages
Route::get('/admin/statistic', 'StatisticController@index');
Route::post('/admin/statistic/profit', 'StatisticController@profitByDateRange');
Route::post('/admin/statistic/product', 'StatisticController@productSaleByDateRange');
Route::post('/admin/statistic/profit/byDateRange', 'StatisticController@profitArray');
Route::post('/admin/statistic/profit/byMilestone', 'StatisticController@profitArray');



// Bill manager pages
Route::get('/admin/bill', 'BillController@index');
Route::get('/admin/bill/detail/id={id}', 'BillController@BillDetailPage');
Route::get('/admin/bill/print/id={id}/execute', 'BillController@billPrintPage');
Route::get('/admin/bill/delete/id={id}/execute', 'BillController@deleteBill');
Route::post('/admin/bill/change-status/execute', 'BillController@changeBillStatusByID');

// Get product storage data to Modal execute bill
Route::get('admin/bill/StorageProduct', 'BillController@getStorageProductList');
Route::get('admin/bill/handleBill', 'BillController@getStorageProductToDeliver');

// Storage 
Route::get('/admin/homeStorage', 'StorageController@getHomeStorage');
Route::get('/admin/add-storage', 'StorageController@getViewAddStorage');
Route::get('/admin/info-storage={id}', 'StorageController@getViewInfoStorage');
Route::get('/admin/update-storage={id}', 'StorageController@getViewUpdateStorage');


// import export manage
Route::get('admin/iemanage', 'StorageController@getViewIemanage');
Route::get('/admin/info-storage/add-location={id}', 'StorageController@getViewAddLocation');
Route::get('admin/import-Bill/add', 'StorageController@getViewImport');
Route::get('admin/export-Bill/add', 'StorageController@getViewExport');
Route::post('admin/import-Bill/add/execute', 'StorageController@addImportBill');
Route::post('admin/export-Bill/add/execute', 'StorageController@addExportBill');
Route::get('/admin/export-Bill/live-search', 'StorageController@liveSearchStorage')->name('search_product_in_stock');
Route::get('admin/info-bill={id}', 'StorageController@getViewInfoBill');

Route::post('/admin/add-str', 'StorageController@addStorage');
Route::get('/admin/delete-storage={id}', 'StorageController@deleteStorage');
Route::post('/admin/update-storage={id}/execute', 'StorageController@updateStorage');
Route::post('/admin/add-location={id}/execute', 'StorageController@addLocation');
Route::get('/admin/delete-location={id}', 'StorageController@deleteLocation');
Route::get('/admin/IEBillPrint/id={id}', 'StorageController@printInfoBill');




// Bill manager (for sale employee)pages

Route::get('/sale', 'BillController@addBillPage');
Route::get('/sale/productSearch', 'ProductController@getProductAjax')->name('product-live-sreach');
Route::get('/sale/productDetail', 'ProductController@getProductDetailAjax')->name('product-detail-ajax');
Route::post('/sale/addBill','BillController@addBill');


// // WARNING TEMPORARY DATA AREA: add product location to storage 1
// Route::get('/SQL27554252', function () {
//     $link = mysqli_connect("localhost", "root", "", "phonghap");
//     $sql = "select * from sanpham";
//     $result = mysqli_query($link,$sql);
//     while($row = mysqli_fetch_assoc($result)){
//         mysqli_query($link,"insert into vitrisanpham values(".$row['idsanpham'].",21,floor(rand()*50) + 50)");
//         if(!mysqli_query($link,$sql))
//             break;
//     }
//     echo "SQL27554252 was called";
// });

// // WARNING TEMPORARY DATA AREA: add product location to storage 2
// Route::get('/SQL64784745', function () {
//     $link = mysqli_connect("localhost", "root", "", "phonghap");
//     $sql = "select * from sanpham where iddanhmuc NOT IN (1,2)";
//     $result = mysqli_query($link,$sql);
//     while($row = mysqli_fetch_assoc($result)){
//         mysqli_query($link,"insert into vitrisanpham values(".$row['idsanpham'].",22,floor(rand()*30) + 20)");
//         if(!mysqli_query($link,$sql))
//             break;
//     }
//     echo "SQL64784745 was called ";
// });

// // WARNING TEMPORARY DATA AREA: add product location to storage 3
// Route::get('/SQL28428944', function () {
//     $link = mysqli_connect("localhost", "root", "", "phonghap");
//     $sql = "select * from sanpham where iddanhmuc NOT IN (1,2,3,6,4)";
//     $result = mysqli_query($link,$sql);
//     while($row = mysqli_fetch_assoc($result)){
//         mysqli_query($link,"insert into vitrisanpham values(".$row['idsanpham'].",23,floor(rand()*50) + 10)");
//         if(!mysqli_query($link,$sql))
//             break;
//     }
//     echo "SQL28428944 was called ";
// });

// // WARNING TEMPORARY DATA AREA: add product location to storage 3
// Route::get('/SQL1281191', function () {
//     $link = mysqli_connect("localhost", "root", "", "phonghap");
//     $sql = "select vitrisanpham.idsanpham,sanpham.tensanpham,sanpham.gia,SUM(vitrisanpham.soluong) 
//             from (vitrisanpham INNER JOIN sanpham ON vitrisanpham.idsanpham=sanpham.idsanpham)
//             GROUP BY vitrisanpham.idsanpham ";
//     $result = mysqli_query($link,$sql);
//     while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
//         $sql2 = "insert into sanphamtrongkho values(".$row[0].",'".$row[1]."',".$row[2].",".$row[3].",'chiếc')";
//         $result2 = mysqli_query($link,$sql2);
//         if(!$result2){
//             echo $sql2."   ,";
        
//             echo "SQL1281191 release error, ";
//             break;
//         }
//     }
//     echo "SQL1281191 was called ";
// });




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
