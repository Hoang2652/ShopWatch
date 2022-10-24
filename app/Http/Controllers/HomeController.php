<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    public function index(){
        // $product = DB::table('sanpham')->get();
        return view('pages.home');
    }

    public function loginPage(){
        return view('pages.login');
    }

    public function checkLogin(Request $request){
        $tendangnhap = $request->tendangnhap;
        $matkhau = MD5($request->matkhau);

        $result = DB::table('nguoidung')->where('tendangnhap',$tendangnhap)->orWhere('email',$tendangnhap)->where('matkhau',$matkhau)->first();

        echo "kết quả:";
        echo '<pre>';
        print_r($result);
        echo '</pre>';
    }
}
