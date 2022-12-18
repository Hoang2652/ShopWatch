<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\IEBillRequest;
use DB;
use App\Models\Khohang;
use App\Models\Vitrikhohang;
use App\Models\Hoadonnhapxuatkho;
use App\Models\Chitiethoadonnhapxuatkho;

class StorageController extends Controller
{
    //
    public function getHomeStorage(){
        $kho = DB::table('khohang')->get();

        return view('admin.storage.index')
                ->with('kho',$kho);
    }

    public function getViewAddStorage(){
        return view('admin.storage.addStorage');
    }

    public function getViewUpdateStorage($id){
        $kho = DB::table('khohang')->where('idkhohang',$id)->get();
        return view('admin.storage.updateStorage')
                ->with('kho',$kho);
    }

    public function getViewInfoStorage($id){
        $kho = DB::table('khohang')
                    ->where('idkhohang',$id)
                    ->get();
        $info = DB::select('select * from vitrikhohang, vitrisanpham, sanpham 
                            where vitrisanpham.idsanpham=sanpham.idsanpham 
                            AND vitrikhohang.idvitrikhohang = vitrisanpham.idvitrikhohang 
                            AND vitrikhohang.idkhohang = :id', ['id' => $id]);
        $info = DB::table('vitrikhohang')->where('vitrikhohang.idkhohang',$id)
                                         ->join('vitrisanpham','vitrisanpham.idvitrikhohang','=','vitrikhohang.idvitrikhohang')
                                         ->join('sanpham','sanpham.idsanpham','=','vitrisanpham.idsanpham')
                                         ->select('vitrisanpham.*','vitrikhohang.tenvitrikhohang','sanpham.tensanpham','sanpham.gia')
                                         ->get();
        return view('admin.storage.infoStorage')
                ->with('kho',$kho)
                ->with('info', $info);
    }

    public function getViewIemanage(){
        $bill = DB::table('hoadonnhapxuatkho')
                    ->orderBy('idhoadonnhapxuatkho', 'desc')
                    ->get();
        return view('admin.storage.iemanage')
                    ->with('bill',$bill);
    }

    public function addImportBill(IEBillRequest $request){
        $content = $request->product;
        DB::beginTransaction();
        try {
            $hoadonnhapxuatkho = new Hoadonnhapxuatkho;
            $hoadonnhapxuatkho->tendoitac = $request->tendoitac;
            $hoadonnhapxuatkho->dienthoai = $request->dienthoai;
            $hoadonnhapxuatkho->email = $request->email;
            $hoadonnhapxuatkho->created_at = $request->created_at;
            $hoadonnhapxuatkho->diachixuatkho = $request->diachixuatkho;
            $hoadonnhapxuatkho->diachinhapkho = $request->diachinhapkho;
            $hoadonnhapxuatkho->loaihoadon = "nhập";
            $hoadonnhapxuatkho->trangthai = "Đang xử lý";
            $hoadonnhapxuatkho->save();

            $count = 1;
            foreach($content as $row){
                if(is_null($row['tensanpham']) && is_null($row['idsanpham']) && is_null($row['dongia']) && is_null($row['soluong']) && is_null($row['donvi']))
                    continue;

                if(is_null($row['tensanpham']) || is_null($row['idsanpham']) || is_null($row['dongia']) || is_null($row['soluong']) || is_null($row['donvi'])){
                    toastr()->error('Dòng dữ liệu thứ '.(++$count).' chưa đầy đủ ! Vui lòng điền đầy đủ dữ liệu hoặc bỏ trống nguyên 1 dòng');
                    return redirect('admin/import-Bill/add');
                }

                // Thao tác thêm chi tiêt hóa đơn
                $Chitiet = new Chitiethoadonnhapxuatkho;
                $Chitiet->idhoadonnhapxuatkho = $hoadonnhapxuatkho->idhoadonnhapxuatkho;
                $Chitiet->tensanpham = $row['tensanpham'];
                $Chitiet->idsanpham = $row['idsanpham'];
                $Chitiet->dongia = $row['dongia'];
                $Chitiet->soluong = $row['soluong'];
                $Chitiet->donvi = $row['donvi'];
                $Chitiet->save();
            }
            DB::commit();
            toastr()->success("Thêm hóa đơn nhập kho thành công !");
            return Redirect('/admin/import-Bill/add');
        } catch (\Exception $e) {
            DB::rollback();
            toastr()->error('Ôi không có sự cố khi thêm hóa đơn nhập kho, vui lòng thử lại sau !'.$e);
            return redirect('admin/import-Bill/add');
            // something went wrong
        }
    }

    public function addExportBill(Request $request){
        $content = $request->product;
        // dd($request->all());
        if($content == null){
            toastr()->error('Bạn <b>phải</b> thêm sản phẩm sản phẩm vào hóa đơn');
            return redirect('admin/export-Bill/add');
        }
        DB::beginTransaction();
        try {
            $hoadonnhapxuatkho = new Hoadonnhapxuatkho;
            $hoadonnhapxuatkho->tendoitac = $request->tendoitac;
            $hoadonnhapxuatkho->dienthoai = $request->dienthoai;
            $hoadonnhapxuatkho->email = $request->email;
            $hoadonnhapxuatkho->created_at = $request->created_at;
            $hoadonnhapxuatkho->diachixuatkho = $request->diachixuatkho;
            $hoadonnhapxuatkho->diachinhapkho = $request->diachinhapkho;
            $hoadonnhapxuatkho->loaihoadon = "xuất";
            $hoadonnhapxuatkho->trangthai = "Đang xử lý";
            $hoadonnhapxuatkho->save();

            foreach($content as $row){

                // Thao tác thêm chi tiêt hóa đơn
                $Chitiet = new Chitiethoadonnhapxuatkho;
                $Chitiet->idhoadonnhapxuatkho = $hoadonnhapxuatkho->idhoadonnhapxuatkho;
                $Chitiet->tensanpham = $row['tensanpham'];
                $Chitiet->idsanpham = $row['idsanpham'];
                $Chitiet->dongia = $row['dongia'];
                $Chitiet->soluong = $row['soluong'];
                $Chitiet->donvi = $row['donvi'];
                $Chitiet->save();
            }
            DB::commit();
            toastr()->success("Thêm hóa đơn xuất kho thành công !");
            return Redirect('/admin/export-Bill/add');
        } catch (\Exception $e) {
            DB::rollback();
            toastr()->error('Ôi không có sự cố khi thêm hóa đơn xuất kho, vui lòng thử lại sau !');
            return redirect('admin/export-Bill/add');
            // something went wrong
        }
    }

    public function liveSearchStorage(Request $request){
        if (!$request->ajax()) {
            return;
        }

        $keyword = $request->get('keyword');
        $tenkhohang = $request->get('tenkhohang');

        $query1 = DB::table('khohang')->where('tenkhohang',$tenkhohang)->select('idkhohang')->first();

        $result = DB::table('vitrikhohang')->where('vitrikhohang.idkhohang',$query1->idkhohang)
                                           ->join('vitrisanpham','vitrisanpham.idvitrikhohang','=','vitrikhohang.idvitrikhohang')
                                           ->join('sanpham','sanpham.idsanpham','=','vitrisanpham.idsanpham')
                                           ->where('sanpham.tensanpham','like','%'.$keyword.'%')
                                           ->orWhere('vitrisanpham.idsanpham','like','%'.$keyword.'%')
                                           ->select('vitrisanpham.*','vitrikhohang.idkhohang','vitrikhohang.tenvitrikhohang','sanpham.tensanpham','sanpham.hinhanh','sanpham.gia')
                                           ->limit(15)
                                           ->get();

        // $result = DB::table('sanpham')->where('tensanpham','like','%'.$keyword.'%')
        //                               ->orWhere('idsanpham','like','%'.$keyword.'%')
        //                               ->select('idsanpham','hinhanh','tensanpham','soluong','gia')
        //                               ->limit(15)
        //                               ->get();
        // dd($result);
        $data = ['table_row' => $result];
        return $data;
    }

    public function getViewAddLocation($id){
        $storage = DB::table('khohang')
                    ->get();
        $location = DB::table('vitrikhohang')
                    ->where('idkhohang', $id)
                    ->get();
        return view('admin.storage.addLocation')
                    ->with('storage', $storage)
                    ->with('id', $id)
                    ->with('location', $location);
    }

    public function getViewImport(){
        $storage = DB::table('khohang')
                    ->get();
        return view('admin.storage.importBill')
                    ->with('storage', $storage);
    }

    public function getViewExport(){
        $storage = DB::table('khohang')
                    ->get();
        return view('admin.storage.exportBill')
                    ->with('storage', $storage);
    }

    public function getViewInfoBill($id){
        $info = DB::table('chitiethoadonnhapxuatkho')
                    ->where('idhoadonnhapxuatkho', $id)
                    ->get();
        return view('admin.storage.infoBill')
                ->with('info', $info)
                ->with('id', $id);
    }

    // go to print UI and select options
    public function printInfoBill($id){
        $BillDetail = DB::table('chitiethoadonnhapxuatkho')
                    ->where('idhoadonnhapxuatkho', $id)
                    ->get();
        $BillInfo = DB::table('hoadonnhapxuatkho')
                    ->where('idhoadonnhapxuatkho', $id)
                    ->first();
        return view('admin.storage.printIEBill')
                ->with('BillDetail', $BillDetail)
                ->with('BillInfo', $BillInfo);
    }

    public function addStorage(Request $request){
        $khohang = new Khohang;
        $khohang->tenkhohang = $request->tenkhohang;
        $khohang->diachikhohang = $request->diachikhohang;
        $khohang->ghichu = $request->ghichu;

        if ($khohang->save()) {
            toastr()->success('Thêm sản phẩm ' . $khohang->tenkhohang . ' thành công');
            return redirect('/admin/homeStorage');
        } else {
            toastr()->error('Thêm kho hàng thất bại!');
        }
    }

    public function deleteStorage($id){
        $khohang = Khohang::find($id);
        if ($khohang->delete()) {
            toastr()->success('Xóa kho hàng"' . $khohang->tenkhohang . '" thành công!');
            return redirect('/admin/homeStorage');
        } else {
            toastr()->error('Xóa kho hàng "' . $khohang->tenkhohang . '" thất bại!');
        }
    }

    public function updateStorage($id, Request $request){
        $khohang = Khohang::find($id);
        $khohang->tenkhohang = $request->tenkhohang;
        $khohang->diachikhohang = $request->diachikhohang;
        $khohang->ghichu = $request->ghichu;

        if ($khohang->save()) {
            toastr()->success('Cập nhật kho hàng "' . $khohang->tenkhohang . '" thành công!');
            return redirect('/admin/homeStorage');
        } else {
            toastr()->error('Cập nhật kho hàng "' . $khohang->tenkhohang . '" thất bại!');
        }
    }

    public function addLocation(Request $request, $id){
        $location = new Vitrikhohang;
        $location->tenvitrikhohang = $request->tenvitrikhohang;
        $location->idkhohang = $id;

        if ($location->save()) {
            toastr()->success('Cập nhật vị trí "' . $location->tenvitrikhohang . '" thành công!');
            return redirect('/admin/info-storage/add-location='.$id);
        } else {
            toastr()->error('Cập nhật vị trí "' . $location->tenvitrikhohang . '" thất bại!');
        }
    }

    public function deleteLocation($id){
        $location = Vitrikhohang::find($id);

        if ($location->delete()) {
            toastr()->success('Xóa vị trí kho hàng"' . $location->tenvitrikhohang . '" thành công!');
            return redirect('/admin/info-storage=1');
        } else {
            toastr()->error('Xóa vị trí kho hàng "' . $location->tenvitrikhohang . '" thất bại!');
        }
    }

    public function searchInStock(){
        
    }
}
