<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{
    public function loginPage(){
        return view('admin.login');
    }

    public function checkLogin(Request $request){
        $tendangnhap = $request->tendangnhap;
        $matkhau = MD5($request->matkhau);

        $result = DB::table('nguoidung')->where('tendangnhap',$tendangnhap)->where('matkhau',$matkhau)->where('phanquyen',0)->first();

        echo "kết quả:";
        echo '<pre>';
        print_r($result);
        echo '</pre>';
    }

    public function adminHomePage(){
        return view('admin.home')->with('getBillByPage', (new BillController)->getBillByPage());
    }
}
