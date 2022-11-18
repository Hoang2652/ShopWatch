<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Http\Requests;
use App\Http\Requests\CheckoutRequest;
use App\Models\Hoadon;

use Session;
session_start();

class CheckoutController extends Controller
{
    //
    public function getViewCheckout(){
        $idnguoidung = Session::get('idnguoidung');
        $person_info = DB::table('nguoidung')
                            ->where('idnguoidung', $idnguoidung)
                            ->get();
        return view('pages.cart.checkout')->with('person_info', $person_info);
    }
    
    public function check_out(CheckoutRequest $request){
        $hoadon = new Hoadon;
        $hoadon->idnguoidung = Session::get('idnguoidung');
        $hoadon->hoten = $request->hoten;
        $hoadon->diachi = $request->diachi;
        $hoadon->dienthoai = $request->dienthoai;
        $hoadon->email = $request->email;
        $hoadon->phuongthucthanhtoan = $request->phuongthuc;
        $hoadon->trangthai = 1;
        if($hoadon->save()){
            toastr()->success("Thanh toán thành công, vui lòng chờ đơn hàng xử lí.");
            return Redirect::to('/sanpham/dongho');
        }
        else{
            toastr()->error("thanh toán thất bại");
        }
    }
}
