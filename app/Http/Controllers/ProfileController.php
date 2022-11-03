<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use DB;
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
}
