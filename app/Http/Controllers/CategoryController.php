<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Danhmuc;
use DB;

class CategoryController extends Controller
{
    protected $CategoryPerPage = 15;

    public function index(){
        return view('admin.category.index')->with('CategoryNums',$this->getCategoryNums())->with('Category',$this->getCategoryByPage());
    }

    public function addCategoryPage(){
        return view('admin.category.add');
    }

    public function addCategory(Request $request){
        $danhmuc = new danhmuc;
        $danhmuc->tendanhmuc = $request->tendanhmuc;
        $danhmuc->loaidanhmuc = $request->loaidanhmuc;
        $danhmuc->mota = $request->mota;
        if($danhmuc->save()){
            toastr()->success('Thêm danh mục thành công');
            return redirect('/admin/category');
        } else {
        toastr()->error('Thêm danh mục thất bại!');
        }
    }

    public function updateCategoryPage($CategoryID){
        return view('admin.category.update')->with('categoryDetail',$this->getCategoryById($CategoryID));
    }

    public function  updateCategory(Request $request, $idCategory){
        $danhmuc = danhmuc::find($idCategory);
        $danhmuc->tendanhmuc = $request->tendanhmuc;
        $danhmuc->loaidanhmuc = $request->loaidanhmuc;
        $danhmuc->mota = $request->mota;
        if($danhmuc->save()){
            toastr()->success('Cập nhật danh mục thành công!');
            return redirect('/admin/category');
        } else {
        toastr()->error('Cập nhật danh mục thất bại!');
        }
    }

    public function deleteCategory($idCategory){
        $danhmuc = danhmuc::find($idCategory);
        if($danhmuc->delete()){
            toastr()->success('Xóa danh mục thành công!');
            return redirect('/admin/category');
        } else {
            toastr()->error('Xóa danh mục thất bại!');
        }
    }

    public function getCategoryNums(){
        return DB::table('danhmuc')->count();
    }

    public function getCategoryByPage(){
        return DB::table('danhmuc')->paginate($this->CategoryPerPage);
    }

    public function getCategory(){
        return DB::table('danhmuc')->get();
    }

    public function getCategoryByBrand(){
        return DB::table('danhmuc')->where('loaidanhmuc','TH')->get();
    }
    
    public function getCategoryByType(){
        return DB::table('danhmuc')->where('loaidanhmuc','LSP')->get();
    }

    public function getCategoryById($CategoryID){
        return DB::table('danhmuc')->where('iddanhmuc', $CategoryID)->first();
    }
}
