<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Sanpham;
use App\Models\Danhgia;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RatingController;
use Illuminate\Support\Facades\Redirect;
use Session;
Session_start();

class ProductController extends Controller
{
    protected $ProductPerPage = 15;
    protected $newsPerPage = 12;

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

    public function getFilterWatch(){
        return DB::table('danhmuc')
                    ->where('loaidanhmuc', 'TH')
                    ->get();
    }

    public function getFilterAccessory(){
        return DB::table('danhmuc')
                    ->where('loaidanhmuc', 'LSP')
                    ->where('iddanhmuc', '<>', 8)
                    ->get();
    }

    public function getViewProduct(){
        $filterBrand = $this->getFilterWatch();
        $filterAccessory = $this->getFilterAccessory();
        return view('pages.product.product')->with('filterBrand', $filterBrand)
                                            ->with('filterAccessory', $filterAccessory);
    }

    public function getProductByProductType(){
        $filterBrand = $this->getFilterWatch();
        $filterAccessory = $this->getFilterAccessory();

        $viewProduct = DB::table('danhmuc')
                            ->where('loaidanhmuc', 'TH')
                            ->orderBy('iddanhmuc', 'asc')
                            ->get();
        $id = DB::table('sanpham')
                    ->where('trangthai', 1)
                    ->orderBy('idsanpham', 'asc')
                    ->get();
        $danhgia = DB::table('danhgia') 
                    ->get();
        
        return view('pages.product.watch')
                    ->with('viewProduct', $viewProduct)
                    ->with('id', $id)
                    ->with('danhgia', $danhgia)
                    ->with('filterBrand', $filterBrand)
                    ->with('filterAccessory', $filterAccessory);
    }

    public function getViewAccessory(){
        $filterBrand = $this->getFilterWatch();
        $filterAccessory = $this->getFilterAccessory();

        $viewAccessory = DB::table('danhmuc')
                            ->where('loaidanhmuc', 'LSP')
                            ->where('iddanhmuc', '<>', 8)
                            ->orderBy('iddanhmuc', 'asc')
                            ->get();
        $id = DB::table('sanpham')
                    ->where('trangthai', 1)
                    ->orderBy('idsanpham', 'asc')
                    ->get();
        $danhgia = DB::table('danhgia') 
                    ->get();
        
        return view('pages.product.accessory')
                    ->with('viewAccessory', $viewAccessory)                     
                    ->with('id', $id)   
                    ->with('danhgia', $danhgia)
                    ->with('filterBrand', $filterBrand)       
                    ->with('filterAccessory', $filterAccessory);
    }

    public function getViewProductDetail($id){
        $viewsanpham = DB::table('sanpham')
                            ->where('idsanpham', $id)
                            ->limit(1)
                            ->get();
        $sanpham = $viewsanpham->first();
        if($sanpham->quatang != null && $sanpham->soluongkhuyenmai > 0){
            $spkm = DB::table('sanpham')
                            ->where('idsanpham', $sanpham->quatang)
                            ->limit(1)
                            ->get();
        }
        else
            $spkm = null;
        $danhgia = DB::table('danhgia')
                    ->select('danhgia.*', 'nguoidung.idnguoidung', 'nguoidung.tennguoidung')
                    ->join('nguoidung', 'danhgia.idnguoidung', '=', 'nguoidung.idnguoidung') 
                    ->get();
        return view('pages.product.productDetail')
                    ->with('viewsanpham', $viewsanpham)
                    ->with('danhgia', $danhgia)
                    ->with('spkm', $spkm);
        
    }

    public function getViewCategory($id){
        $filterBrand = $this->getFilterWatch();
        $filterAccessory = $this->getFilterAccessory();

        $viewCategory = DB::table('danhmuc')
                            ->where('iddanhmuc', $id)
                            ->get();
        $newsByPage = DB::table('sanpham')
                            ->where('iddanhmuc', $id)
                            ->paginate($this->newsPerPage);
        $danhgia = DB::table('danhgia') 
                    ->get();
        return view('pages.product.category')
                    ->with('filterBrand', $filterBrand)
                    ->with('filterAccessory', $filterAccessory)
                    ->with('viewCategory', $viewCategory)
                    ->with('newsByPage', $newsByPage)
                    ->with('danhgia', $danhgia);
    }

    public function rating(Request $request){
        $data = new Danhgia;
        $data->idnguoidung = Session::get('idnguoidung');
        $data->idsanpham = $request->idsanpham;
        $data->sodiem = $request->sodiem;
        $data->binhluan = $request->binhluan;
        if($data->save()){
            toastr()->success("Bình luận thành công");
            return Redirect::to('/sanpham/idsanpham='.$request->idsanpham);
        }
        else{
            toastr()->error("bình luận thất bại");
        }
    }
    
}
