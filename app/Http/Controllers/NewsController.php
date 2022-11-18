<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tintuc;
use Illuminate\Http\Request;
use App\Http\Requests\NewsRequest;
use DB;

class NewsController extends Controller
{
    protected $NewsPerPage = 15;

    public function showHomeNews(){
        $newsByPage = $this->getNewsByPage();
        return view('pages.news.news')->with('newsByPage',$newsByPage);
    }

    
    public function getNewsDetail($id){
        $newsDetail = DB::table('tintuc')->where('idtintuc',$id)->get();
        return view('pages.news.newsDetail')->with('newsDetail',$newsDetail);
    }

    // Admin functions

    public function index(){
        return view('admin.news.index')->with('NewsNums',$this->getNewsNums())->with('News',$this->getNewsByPage());
    }

    public function addNewsPage(){
        return view('admin.news.add');
    }


    public function addNews(NewsRequest $request){
        $tintuc = new tintuc;
        $tintuc->tieude = $request->tieude;
        $tintuc->noidungngan = $request->noidungngan;
        $tintuc->noidungchitiet = $request->noidungchitiet;
        $tintuc->tacgia = $request->tacgia;

        if($request->trangthai != null)
            $tintuc->trangthai = 1;
        else
            $tintuc->trangthai = 0;

        if ($request->hasFile('hinhanh')) {
            $destination = 'public/uploads/news';
            $get_image = $request->file('hinhanh');
            $get_name_image = time()."_".$get_image->getClientOriginalName();
            $tintuc->hinhanh = $get_name_image;
            $get_image->move($destination, $get_name_image);
        } else {
            $sanpham->hinhanh = "DefaultNewsPicture.jpg";
        }

        if($tintuc->save()){
            toastr()->success('Thêm tin tức <b>'. $tintuc->tieude. '</b> thành công');
            return redirect('/admin/news');
        } else {
        toastr()->error('Thêm tin tức thất bại!');
        }
    }

    public function updateNewsPage($NewsID){
        return view('admin.news.update')->with('newsDetail',$this->getNewsById($NewsID));
    }

    public function  updateNews(NewsRequest $request, $idNews){
        $tintuc = tintuc::find($idNews);
        $tintuc->tieude = $request->tieude;
        $tintuc->noidungngan = $request->noidungngan;
        $tintuc->noidungchitiet = $request->noidungchitiet;
        $tintuc->tacgia = $request->tacgia;

        if($request->trangthai != null)
            $tintuc->trangthai = 1;
        else
            $tintuc->trangthai = 0;

        if ($request->hasFile('hinhanh')) {
            $destination = 'public/uploads/news';
            $get_image = $request->file('hinhanh');
            $get_name_image = time()."_".$get_image->getClientOriginalName();
            $tintuc->hinhanh = $get_name_image;
            $get_image->move($destination, $get_name_image);
        }

        if($tintuc->save()){
            toastr()->success('Cập nhật tin tức <b>'. $tintuc->tieude. '</b> thành công!');
            return redirect('/admin/news');
        } else {
        toastr()->error('Cập nhật tin tức <b>'. $tintuc->tieude. '</b> thất bại!');
        }
    }

    public function deleteNews($idNews){
        $tintuc = tintuc::find($idNews);
        if($tintuc->delete()){
            toastr()->success('Xóa tin tức <b>'. $tintuc->tieude. '</b> thành công!');
            return redirect('/admin/news');
        } else {
            toastr()->error('Xóa tin tức thất bại!');
        }
    }

    public function getNewsNums(){
        return DB::table('tintuc')->count();
    }

    public function getNewsByPage(){
        return DB::table('tintuc')->paginate($this->NewsPerPage);
    }

    public function getNews(){
        return DB::table('tintuc')->get();
    }

    public function getNewsById($NewsID){
        return DB::table('tintuc')->where('idtintuc', $NewsID)->first();
    }
}
