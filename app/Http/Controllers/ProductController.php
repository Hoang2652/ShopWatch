<?php

namespace App\Http\Controllers;

use App\Models\Danhgia;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\URL;
use App\Http\Requests\ProductRequest;
use App\Models\Sanpham;
use DB;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
Session_start();

class ProductController extends Controller
{
    protected $ProductPerPage = 25;

    public function index()
    {
        return view('admin.product.index')->with('ProductNums', $this->getProductNums())->with('Product', $this->getProductByPage());
    }

    public function getProductByPage()
    {
        return DB::table('sanpham')->join('danhmuc', 'danhmuc.iddanhmuc', '=', 'sanpham.iddanhmuc')->select('sanpham.*', 'danhmuc.tendanhmuc')->orderBy('idsanpham', 'asc')->paginate($this->ProductPerPage);
    }

    public function getProductByKeySearch($query)
    {
        return DB::table('sanpham')->where('idsanpham', 'like', '%' . $query . '%')
                                   ->orWhere('tensanpham', 'like', '%' . $query . '%')
                                   ->join('danhmuc', 'danhmuc.iddanhmuc', '=', 'sanpham.iddanhmuc')
                                   ->select('sanpham.*', 'danhmuc.tendanhmuc')
                                   ->orderBy('idsanpham', 'asc')->limit(25)->get();
    }

    protected $newsPerPage = 12;

    public function productLiveSreach(Request $request)
    {
        if ($request->ajax()) {
            $query = $request->get('query');
            $table_row = $this->getProductByKeySearch($query);
            $total_row = $table_row->count();
            $data = [
                'total_row' => $total_row,
                'table_row' => $table_row
            ];
            return $data;
        }
    }

    public function addProductPage()
    {
        $Category_Controller = new CategoryController;
        return view('admin.product.add')->with('productType', $Category_Controller->getCategoryByType())
            ->with('productBrand', $Category_Controller->getCategoryByBrand());
    }

    public function addProduct(ProductRequest $request)
    {
        $sanpham = new sanpham;
        $sanpham->tensanpham = $request->tensanpham;
        $sanpham->loaisanpham = $request->loaisanpham;
        $sanpham->mota = $request->mota;
        $sanpham->xuatxu = $request->xuatxu;
        $sanpham->baohanh = $request->baohanh;
        $sanpham->chitiet = $request->chitiet;
        $sanpham->soluong = $request->soluong;
        $sanpham->daban = 0;
        $sanpham->gia = $request->gia;
        $sanpham->iddanhmuc = $request->iddanhmuc;
        $sanpham->giamgia = $request->giamgia;
        $sanpham->quatang = $request->quatang;
        $sanpham->soluongkhuyenmai = $request->soluongkhuyenmai;
        $sanpham->trangthai = 0;
        $sanpham->idhoadonnhapxuatkho = $request->idhoadonnhapxuatkho;

        if ($request->hasFile('hinhanh')) {
            $destination = 'public/uploads/products';
            $get_image = $request->file('hinhanh');
            $get_name_image = $get_image->getClientOriginalName();
            $sanpham->hinhanh = $get_name_image;
            $get_image->move($destination, $get_name_image);
        } else {
            $sanpham->hinhanh = "DefaultProductPicture.jpg";
        }

        if ($sanpham->save()) {
            toastr()->success('Thêm sản phẩm ' . $sanpham->tensanpham . ' thành công');
            return redirect('/admin/product');
        } else {
            toastr()->error('Thêm sản phẩm thất bại!');
        }
    }

    public function changeStatusProduct(Request $request)
    {
        $data = $request->all();
        $dataStatus = $data['id'];
        $openSale = array_keys(array_filter($dataStatus, function ($bool) {return $bool == 1;}));
        $closedSale = array_keys(array_filter($dataStatus, function ($bool) {return $bool == 0;}));
        $isOpen = sanpham::whereIn('idsanpham', $openSale)->update(['trangthai' => 0]);
        $isClosed = sanpham::whereIn('idsanpham', $closedSale)->update(['trangthai' => 1]);
        if ($isOpen || $isClosed) {
            toastr()->success('Thay đổi trạng thái sản phẩm id ' . implode(",", array_merge($openSale, $closedSale)) . ' thành công');
            return redirect('/admin/product');
        } else {
            toastr()->error('Thay đổi trạng thái không thành công');
            return redirect('/admin/product');
        }
    }

    public function updateProductPage($ProductID)
    {
        $Category_Controller = new CategoryController;
        $Rating_Controller = new RatingController;

        return view('admin.product.update')->with('productDetail', $this->getProductById($ProductID))
            ->with('productType', $Category_Controller->getCategoryByType())
            ->with('productBrand', $Category_Controller->getCategoryByBrand())
            ->with('ratings', $Rating_Controller->getAllRatingByProductID($ProductID));
    }

    public function updateProduct(ProductRequest $request, $idProduct)
    {
        $sanpham = sanpham::find($idProduct);
        $sanpham->tensanpham = $request->tensanpham;
        $sanpham->loaisanpham = $request->loaisanpham;
        $sanpham->mota = $request->mota;
        $sanpham->xuatxu = $request->xuatxu;
        $sanpham->baohanh = $request->baohanh;
        $sanpham->chitiet = $request->chitiet;
        $sanpham->soluong = $request->soluong;
        $sanpham->daban = $request->daban;
        $sanpham->gia = $request->gia;
        $sanpham->iddanhmuc = $request->iddanhmuc;
        $sanpham->giamgia = $request->giamgia;
        $sanpham->quatang = $request->quatang;
        $sanpham->soluongkhuyenmai = $request->soluongkhuyenmai;

        if ($request->hasFile('hinhanh')) {
            $destination = 'public/uploads/products';
            $get_image = $request->file('hinhanh');
            $get_name_image = $get_image->getClientOriginalName();
            $sanpham->hinhanh = $get_name_image;
            $get_image->move($destination, $get_name_image);
        }

        if ($sanpham->save()) {
            toastr()->success('Cập nhật sản phẩm "' . $sanpham->tensanpham . '" thành công!');
            return redirect('/admin/product');
        } else {
            toastr()->error('Cập nhật sản phẩm "' . $sanpham->tensanpham . '" thất bại!');
        }
    }

    public function deleteProduct($idProduct)
    {
        $sanpham = sanpham::find($idProduct);
        if ($sanpham->delete()) {
            toastr()->success('Xóa sản phẩm"' . $sanpham->tensanpham . '" thành công!');
            return redirect('/admin/product');
        } else {
            toastr()->error('Xóa sản phẩm "' . $sanpham->tensanpham . '" thất bại!');
        }
    }

    public function getProductNums()
    {
        return DB::table('sanpham')->count();
    }

    public function getProductById($ProductID)
    {
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

    public function getProductAjax(Request $request){
        if($request->ajax()){

            // $queryString = "";
            // if ($request->has('searchKeyword')) {
            //     $queryString .= "where tensanpham LIKE %".$request->searchKeyword."% ";
            // }
            // if ($request->has('productType')) {
            //     $queryString .= "and loaisanpham = %".$request->productType."% ";
            // }
            // if ($request->has('productBrand')) {
            //     $queryString .= "and iddanhmuc = %".$request->productType."% ";
            // } 

            $productList = DB::table('sanpham as a')->leftJoin('sanpham as b','a.quatang','=','b.idsanpham')
                        ->select('a.*','b.tensanpham as tenquatang')
                        ->where('a.tensanpham', 'LIKE', '%' . $request->searchKeyword . '%')
                        ->where('a.loaisanpham', 'LIKE', '%' . $request->productType . '%')
                        ->where('a.iddanhmuc', 'LIKE', '%' . $request->productBrand . '%')
                        ->get();

            $total_row = $productList->count();
            
            $data = [
                'total_row' => $total_row,
                'table_row' => $productList
            ];
            return $data;

        }
    }

    public function getProductDetailAjax(Request $request){
        if($request->ajax()){
            $ProductID = $request->idsanpham;
            $data = [
                'result' => $this->getProductById($ProductID)
            ];
            return $data;

        }
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
