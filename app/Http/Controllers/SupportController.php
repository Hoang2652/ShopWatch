<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Hotro;
use App\Http\Requests\SupportRequest;
use Illuminate\Support\Facades\Redirect;

class SupportController extends Controller
{
    //get view Support
    public function getViewSupport(){
        $FAQ = DB::table('traloicauhoi')->get();
        return view('pages.support.support')->with('FAQ',$FAQ);
    }
    //get view Support Detail
    public function getViewSupportDetail($id){
        $view = DB::table('traloicauhoi')->where('idcauhoi',$id)->get();
        return view('pages.support.supportDetail')->with('view',$view);
    }

    public function sent_support(SupportRequest $request){
        $data = new Hotro;
        $data->chude = $request->chude;
        $data->noidung = $request->noidung;
        $data->hoten = $request->hoten;
        $data->dienthoai = $request->dienthoai;
        $data->email = $request->email;

        if($data->save()){
            toastr()->success("Gửi thư hỗ trợ thành công, chúng tôi sẽ hỗ trợ bạn qua email hoặc số điện thoại.");
            return Redirect::to('/hotro');
        }
        else{
            toastr()->error("Gửi thử hỗ trợ thất bại");
        }
    }
}
