<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\RegisterRequest;
use DB;
use Auth;
use App\Models\Nguoidung;
session_start();

class HomeController extends Controller
{
    protected $billNofiticationInDays = 365;
    protected $billNofitication;

    public function getBillNofitication(){
        $idnguoidung = Session::get('idnguoidung');
        if(isset($idnguoidung)){
            return DB::table('hoadon')->where('idnguoidung',$idnguoidung)
                                                   ->whereBetween('created_at', [now()->subDays($this->billNofiticationInDays), now()])
                                                   ->select('idhoadon','trangthai')
                                                   ->latest()
                                                   ->get();
        }
    }
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
        return view('pages.home.home')->with('headPageProduct',$headPageProduct)
                                 ->with('bestSaleProuctList',$bestSaleProuctList)
                                 ->with('middlePageProduct',$middlePageProduct)
                                 ->with('NewestProductList',$NewestProductList)
                                 ->with('NewsList',$NewsList)
                                 ->with('recommendedProductList',$recommendedProductList)
                                 ->with('billNofitication', $this->getBillNofitication());
    }

    public function loginPage(){
        return view('pages.login.login');
    }

    public function registerPage(){
        return view('pages.login.register');
    }

    public function checkLogin(Request $request){
        $tendangnhap = $request->tendangnhap;
        $matkhau = MD5($request->matkhau);

        $result = DB::table('nguoidung')
                        ->where(function ($query) use($tendangnhap,$matkhau) {
                            $query->where('tendangnhap', '=', $tendangnhap)
                                  ->orWhere('email', '=', $tendangnhap);
                        })->where('matkhau','=',$matkhau)
                        ->first();

        // dd($result);

        if($result && ($result->phanquyen == 'Quản trị viên')){
            Session::put('phanquyen', $result->phanquyen);
            Session::put('tennguoidung', $result->tennguoidung);
            Session::put('idnguoidung', $result->idnguoidung);
            toastr()->success("Đăng nhập quản trị viên thành công, Xin chào <b>".$result->tennguoidung."</b>.");
            return Redirect::to('/admin/home');
        } else if($result && ($result->phanquyen == 'Nhân viên bán hàng')){
            Session::put('phanquyen', $result->phanquyen);
            Session::put('tennguoidung', $result->tennguoidung);
            Session::put('idnguoidung', $result->idnguoidung);
            toastr()->success("Đăng nhập thành công, Xin chào <b>".$result->tennguoidung."</b>.");
            return Redirect::to('/sale');
        }
        else if($result && ($result->phanquyen == 'Nhân viên kho hàng')){
            Session::put('phanquyen', $result->phanquyen);
            Session::put('tennguoidung', $result->tennguoidung);
            Session::put('idnguoidung', $result->idnguoidung);
            toastr()->success("Đăng nhập thành công, Xin chào <b>".$result->tennguoidung."</b>.");
            return Redirect::to('/admin/homeStorage');
        }
        else if($result && $result->phanquyen == 'Khách hàng'){
            Session::put('phanquyen', $result->phanquyen);
            Session::put('tennguoidung', $result->tennguoidung);
            Session::put('idnguoidung', $result->idnguoidung);
            toastr()->success("Đăng nhập thành công, Xin chào <b>".$result->tennguoidung."</b>.");
            return Redirect::to('/');
        }
        else{
            toastr()->error("Đăng nhập thất bại. Vui lòng kiểm tra lại tên đăng nhập hoặc mật khẩu");
            return Redirect::to('/login');
        }
    }

    public function logout(){
        Session::put('admin_name', null);  
        Session::put('admin_id', null);  
        Session::put('phanquyen', null);  
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
        $data->phanquyen = "Khách hàng";
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
