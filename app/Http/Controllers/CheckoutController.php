<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Http\Requests;
use App\Http\Requests\CheckoutRequest;
use App\Models\Hoadon;
use App\Models\Chitiethoadon;
use App\Models\Sanpham;
use Cart;

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
        $content = Cart::content();
        DB::beginTransaction();
        try {
            $hoadon = new Hoadon;
            $hoadon->idnguoidung = Session::get('idnguoidung');
            $hoadon->hoten = $request->hoten;
            $hoadon->diachi = $request->diachi;
            $hoadon->dienthoai = $request->dienthoai;
            $hoadon->email = $request->email;
            $hoadon->phuongthucthanhtoan = $request->phuongthuc;
            $hoadon->trangthai = "Chờ xử lý";
            $hoadon->save();

            foreach($content as $row){

                // Thao tác thêm chi tiêt hóa đơn
                $chitiethoadon = new Chitiethoadon;
                $chitiethoadon->idhoadon = $hoadon->idhoadon;
                $chitiethoadon->idsanpham = $row->id;
                $chitiethoadon->tensanpham = $row->name;
                $chitiethoadon->soluong = $row->qty;

                if($row->options->sale != 0){
                    $chitiethoadon->giamgia = $row->options->sale;
                    $chitiethoadon->gia = $row->price * (100 - $row->giamgia) / 100;
                }
                else {
                    $chitiethoadon->giamgia = null;
                    $chitiethoadon->gia = $row->price;
                }

                if($row->options->gift != 0)
                    $chitiethoadon->quatang = $row->options->gift;
                else
                    $chitiethoadon->quatang = null;
                $chitiethoadon->save();

                // Thao tác cập nhật số lượng sản phẩm / khuyến mãi
                $sanpham = Sanpham::find($row->id);
                $sanpham->soluong -= $row->qty;

                if($row->options->sale != 0 || $row->options->sale != 0){
                    $sanpham->soluongkhuyenmai -= $row->qty;
                } 

                $sanpham->save();
            }

            DB::commit();
            Cart::destroy();
            toastr()->success("Thanh toán thành công, vui lòng chờ đơn hàng xử lí.");
            return Redirect::to('/sanpham/dongho');
        } catch (\Exception $e) {
            DB::rollback();
            toastr()->error('Ôi không có sự cố khi thanh toán, vui lòng thử lại sau !');
            return redirect('/sanpham/dongho');
            // something went wrong
        }
    }

    public function changeBillStatus(Request $request){
        $BillID = $request->idhoadon;
        $status = $request->status;
        $changeStatus = hoadon::where('idhoadon', $BillID)->update(['trangthai' => $status]);
        if($changeStatus){
            if($status == "Hoàn tất"){
                toastr()->success('Xác nhận thành công, cảm ơn bạn đã tin dùng sản phẩm của Phong Hấp !');
                return redirect('/thongtincanhan/lichsumuahang');
            } else {
                toastr()->info('Đã ghi nhận yêu cầu bồi hoàn, chúng tôi sẽ liên lạc với bạn sớm nhất!');
                return redirect('/thongtincanhan/lichsumuahang');
            }
        } else {
            toastr()->error('Ghi nhận thất bại, vui lòng thử lại sau');
            return redirect('/thongtincanhan/lichsumuahang');
        }

    }
}
