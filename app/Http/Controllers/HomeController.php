<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\RegisterRequest;
use DB;
use App\Models\Nguoidung;
session_start();

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

        $NewestProductList = DB::table('sanpham')->latest('updated_at')->limit(6)->get();

        $NewsList = DB::table('tintuc')->latest('updated_at')->limit(3)->get();
        
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

        $result = DB::table('nguoidung')
                        ->where('tendangnhap',$tendangnhap)
                        ->orWhere('email',$tendangnhap)
                        ->where('matkhau',$matkhau)
                        ->first();
        if($result && ($result->phanquyen == 0 || $result->phanquyen == 2)){
            Session::put('phanquyen', $result->phanquyen);
            Session::put('admin_name', $result->tennguoidung);
            Session::put('admin_id', $result->idnguoidung);
            return Redirect::to('/admin');
        }
        else if($result && $result->phanquyen == 1){
            Session::put('phanquyen', $result->phanquyen);
            Session::put('idnguoidung', $result->idnguoidung);
            Session::put('tennguoidung', $result->tennguoidung);
            return Redirect::to('/');
        }
        else
            return Redirect::to('/login');
    }

    public function logout(){
        Session::put('admin_name', null);  
        Session::put('admin_id', null);  
        Session::put('idnguoidung', null);  
        Session::put('tennguoidung', null);  
        return Redirect::to('/');
    }

    public function registerAccount(RegisterRequest $request){
        $data = new Nguoidung;
        $data->tennguoidung = $request->tennguoidung;
        $data->tendangnhap = $request->tendangnhap;
        $data->matkhau = MD5($request->matkhau);
        $data->ngaysinh = $request->ngaysinh;
        $data->email = $request->email;
        $data->dienthoai = $request->dienthoai;
        $data->diachi = $request->diachi;
        $data->gioitinh = $request->gioitinh;
        $data->phanquyen = 1;
        $data->trangthai = 1;

        if($data->save()){
            toastr()->success("Đăng kí thành công, bây giờ bạn có thể mua hàng.");
            return Redirect::to('/login');
        }
        else{
            toastr()->error("đăng kí thất bại");
        }
    }
}
