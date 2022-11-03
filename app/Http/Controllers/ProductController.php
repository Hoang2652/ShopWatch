<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Sanpham;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RatingController;

class ProductController extends Controller
{
    protected $ProductPerPage = 15;

    public function index(){
        return view('admin.product.index')->with('ProductNums',$this->getProductNums())->with('Product',$this->getProductByPage());
    }

    public function addProductPage(){
        return view('admin.product.add');
    }

    public function addProduct(Request $request){
        $sanpham = new sanpham;
        $sanpham->tensanpham = $request->tensanpham;
        $sanpham->loaisanpham = $request->loaisanpham;
        if(isset($request->hinhanh))
            $sanpham->hinhanh = $request->hinhanh;
        else
            $sanpham->hinhanh = "DefaultProductPicture.jpg";
        $sanpham->mota = $request->mota;
        $sanpham->xuatxu = $request->xuatxu;
        $sanpham->baohanh = $request->baohanh;
        $sanpham->chitiet = $request->chitiet;
        $sanpham->soluong = $request->soluong;
        $sanpham->daban = 0;
        $sanpham->gia = $request->gia;
        $sanpham->iddanhmuc  = $request->iddanhmuc ;
        $sanpham->giamgia = $request->giamgia;
        $sanpham->quatang = $request->quatang;
        $sanpham->soluongkhuyenmai = $request->soluongkhuyenmai;
        $sanpham->trangthai = 0;
        $sanpham->idhoadonnhapxuatkho = $request->idhoadonnhapxuatkho;

        if($sanpham->save()){
            toastr()->success('Thêm sản phẩm thành công');
            return redirect('/admin/product');
        } else {
        toastr()->error('Thêm sản phẩm thất bại!');
        }
        // image.png
    }

    public function changeStatusProduct(Request $request){
        $data = $request->all();
        $dataStatus = $data['id'];
        $openSale = array_keys(array_filter($dataStatus, function($bool){return $bool == 1;}));
        $closedSale = array_keys(array_filter($dataStatus, function($bool){return $bool == 0;}));
        $isOpen = sanpham::whereIn('idsanpham', $openSale)->update(['trangthai' => 0]);
        $isClosed = sanpham::whereIn('idsanpham', $closedSale)->update(['trangthai' => 1]);
        if($isOpen || $isClosed){
            toastr()->success('Thay đổi trạng thái sản phẩm id '.implode(",", array_merge($openSale,$closedSale)).' thành công');
            return redirect('/admin/product');
        } else {
            toastr()->error('Thay đổi trạng thái không thành công');
            return redirect('/admin/product');
        }
    }

    public function updateProductPage($ProductID){
        $Category_Controller = new CategoryController;
        $Rating_Controller = new RatingController;
        return view('admin.product.update')->with('productDetail',$this->getProductById($ProductID))
                                           ->with('categories',$Category_Controller->getCategory())
                                           ->with('ratings',$Rating_Controller->getAllRating());
    }

    public function  updateProduct(Request $request, $idProduct){
        $sanpham = sanpham::find($idProduct);
        $sanpham->tensanpham = $request->tensanpham;
        $sanpham->loaisanpham = $request->loaisanpham;
        if(isset($request->hinhanh))
            $sanpham->hinhanh = $request->hinhanh;
        $sanpham->mota = $request->mota;
        $sanpham->xuatxu = $request->xuatxu;
        $sanpham->baohanh = $request->baohanh;
        $sanpham->chitiet = $request->chitiet;
        $sanpham->soluong = $request->soluong;
        $sanpham->daban = 0;
        $sanpham->gia = $request->gia;
        $sanpham->iddanhmuc  = $request->iddanhmuc ;
        $sanpham->giamgia = $request->giamgia;
        $sanpham->quatang = $request->quatang;
        $sanpham->soluongkhuyenmai = $request->soluongkhuyenmai;
        $sanpham->idhoadonnhapxuatkho = $request->idhoadonnhapxuatkho;
        if($sanpham->save()){
            toastr()->success('Cập nhật sản phẩm thành công!');
            return redirect('/admin/product');
        } else {
        toastr()->error('Cập nhật sản phẩm thất bại!');
        }
    }

    public function deleteProduct($idProduct){
        $flight = sanpham::find($idProduct);
        if($sanpham->delete()){
            toastr()->success('Xóa sản phẩm thành công!');
            return redirect('/admin/product');
        } else {
            toastr()->error('Xóa sản phẩm thất bại!');
        }
    }

    public function getProductNums(){
        return DB::table('sanpham')->count();
    }

    public function getProductByPage(){
        return DB::table('sanpham')->join('danhmuc', 'danhmuc.iddanhmuc', '=', 'sanpham.iddanhmuc')->select('sanpham.*','danhmuc.tendanhmuc')->paginate($this->ProductPerPage);
    }

    public function getProductById($ProductID){
        return DB::table('sanpham')->where('idsanpham', $ProductID)->first();
    }
}
