<?php

namespace App\Http\Controllers;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RatingController;
use Illuminate\Support\Facades\URL;
use App\Http\Requests\ProductRequest;
use App\Models\Sanpham;
use DB;
use Illuminate\Http\Request;

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
}
