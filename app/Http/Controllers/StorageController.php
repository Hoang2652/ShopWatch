<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Khohang;
use App\Models\Vitrikhohang;

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
        $info = DB::select('select * from vitrikhohang, vitrisanpham, sanphamtrongkho where vitrisanpham.idsanpham=sanphamtrongkho.idsanpham AND vitrikhohang.idvitrikhohang = vitrisanpham.idvitrikhohang AND vitrikhohang.idkhohang = :id', ['id' => $id]);
        
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
