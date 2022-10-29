<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    // index show all product by standards
    public function index(){
        $headPageProduct = DB::table('sanpham')->join('sanphamdecu', function ($join) {
            $join->on('sanpham.idsanpham', '=', 'sanphamdecu.idsanpham')->where('sanphamdecu.idsanphamdecu',1);
        })->get();

        $bestSaleProuctList = DB::table('sanpham')->orderBy('daban','desc')->limit(6)->get();

        $middlePageProduct = DB::table('sanpham')->join('sanphamdecu', function ($join) {
            $join->on('sanpham.idsanpham', '=', 'sanphamdecu.idsanpham')->where('sanphamdecu.idsanphamdecu',2);
        })->get();

        $NewestProductList = DB::table('sanpham')->latest('ngaycapnhat')->limit(6)->get();

        $NewsList = DB::table('tintuc')->latest('ngaydangtin')->limit(3)->get();
        
        $recommendedProductList = DB::table('sanpham')->join('sanphamdecu', function ($join) {
            $join->on('sanpham.idsanpham', '=', 'sanphamdecu.idsanpham')->where('sanphamdecu.idsanphamdecu',3);
        })->limit(8)->get();

        //trả về trang home cùng đống dữ liệu
        return view('pages.home')->with('headPageProduct',$headPageProduct)
                                 ->with('bestSaleProuctList',$bestSaleProuctList)
                                 ->with('middlePageProduct',$middlePageProduct)
                                 ->with('NewestProductList',$NewestProductList)
                                 ->with('NewsList',$NewsList)
                                 ->with('recommendedProductList',$recommendedProductList);
    }

    public function loginPage(){
        return view('pages.login');
    }

    public function registerPage(){
        return view('pages.register');
    }

    public function checkLogin(Request $request){
        $tendangnhap = $request->tendangnhap;
        $matkhau = MD5($request->matkhau);

        $result = DB::table('nguoidung')->where('tendangnhap',$tendangnhap)->where('matkhau',$matkhau)->first();

        echo "kết quả:";
        echo '<pre>';
        print_r($result);
        echo '</pre>';
    }
}
