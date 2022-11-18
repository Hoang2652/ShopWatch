<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Models\Nguoidung;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\ChangeProfileRequest;
session_start();

class ProfileController extends Controller
{
    //add view profile
    public function getViewProfile(){
        $idnguoidung = Session::get('idnguoidung');
        $viewProfile = DB::table('nguoidung')
                            ->where('idnguoidung', $idnguoidung)
                            ->get();
        return view('pages.profile.profile')->with('viewProfile', $viewProfile);
    }

    public function getViewHistory(){
        $idnguoidung = Session::get('idnguoidung');
        $viewBill = DB::table('hoadon')
                            ->where('idnguoidung', $idnguoidung)
                            ->orderBy('idhoadon', 'DESC')
                            ->get();
        $billDetail = DB::table('chitiethoadon')
                        ->select('chitiethoadon.idchitiethoadon', 'chitiethoadon.idhoadon', 'chitiethoadon.idsanpham', 'sanpham.tensanpham', 
                        'chitiethoadon.soluong', 'sanpham.gia', 'chitiethoadon.giamgia', 'chitiethoadon.quatang')
                        ->join('sanpham', 'sanpham.idsanpham', '=', 'chitiethoadon.idsanpham')
                        ->get();
        $count = $billDetail->count();
        $nameGift = DB::table('sanpham')
                        ->select("tensanpham", 'idsanpham')
                        ->get();
        return view('pages.profile.transactionHistory')->with('viewBill', $viewBill)
                                                       ->with('billDetail', $billDetail)
                                                       ->with('count', $count)
                                                       ->with('nameGift', $nameGift);
        
    }

    public function getViewChangeProfile(){
        $idnguoidung = Session::get('idnguoidung');
        $changeProfile = DB::table('nguoidung')
                            ->where("idnguoidung", $idnguoidung)
                            ->get();
        return view('pages.profile.changeProfile')->with('changeProfile', $changeProfile);
        
    }

    public function changePassword(){
        return view('pages.profile.changePassword');
    }

    public function change_password(ChangePasswordRequest $request){
        $data = new Nguoidung;
        $idnguoidung = Session::get('idnguoidung');
        $data = Nguoidung::find($idnguoidung);
        if(MD5($request->oldpassword == $data->matkhau)){
            $data->matkhau = $request->newpassword;
            if($data->save()){
                toastr()->success("Đổi mật khẩu thành công.");
                return Redirect::to('/thongtincanhan');
            }
            else{
                toastr()->error("Đổi mật khẩu thất bại");
            }
        }
        else{
            toastr()->error("Bạn nhập sai mật khẩu cũ, vui lòng kiểm tra lại mật khẩu");
        }
    }

    public function change_profile(ChangeProfileRequest $request){
        $data = new Nguoidung;
        $idnguoidung = Session::get('idnguoidung');
        $data = Nguoidung::find($idnguoidung);
        $data->tennguoidung = $request->tennguoidung;
        $data->dienthoai = $request->dienthoai;
        $data->email = $request->email;
        $data->diachi = $request->diachi;
        $data->ngaysinh = $request->ngaysinh;
        $data->gioitinh = $request->gioitinh;
        if($data->save()){
            toastr()->success("Thay đổi thông tin cá nhân thành công.");
            return Redirect::to('/thongtincanhan');
        }
        else{
            toastr()->error("Thay đổi thông tin cá nhân thất bại!");
        }
    }
}
