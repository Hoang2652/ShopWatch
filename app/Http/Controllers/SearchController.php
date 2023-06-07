<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sanpham;
use App\Models\Traloicauhoi;
use DB;

class SearchController extends Controller
{
    //
    protected $ProductPerPage = 12;
    public function live_search(Request $request){
        if($request->ajax()){
            $data = Sanpham::where('idsanpham','like','%'.$request->search.'%')
                                ->orwhere('tensanpham','like','%'.$request->search.'%')
                                ->where('trangthai', 1)
                                ->limit(6)
                                ->get();
            $output='';
            if(count($data)>0){
                $output ='
                <div id="xuatlivesreach">
                <table class="tablelivesreach">
                    <thead>
                        <tr>
                            <th width="40px">ID</th>
                            <th id="header-hinhsp"></th>
                            <th id="header-tensp">Tên sản phẩm</th>
                            <th>Giá tiền</th>
                        </tr>
                    </thead>    
                    <tbody>';
                        foreach($data as $row){
                            $output .='
                            <tr class="table-content">
                                <td><a href="/phonghap/sanpham/idsanpham='. $row->idsanpham .'"><font color="blue"><b>' .$row->idsanpham. '</b></font></a></td>
                                <td><a href="/phonghap/sanpham/idsanpham='. $row->idsanpham .'">
                                    <img src="'.asset("public/uploads/products/".$row->hinhanh).'" />
                                </a></td>
                                <td><a href="/phonghap/sanpham/idsanpham='. $row->idsanpham .'"><font color="black">' .$row->tensanpham. '</font></a></td>
                                <td><a href="/phonghap/sanpham/idsanpham='. $row->idsanpham .'"><font color="red"><b>' .$row->gia. '</b></font></a></td>
                            </tr>
                            ';
                        }
                $output .= '
                    </tbody>
                </table>
                </div>';
            }
            else{
                $output .='Không có sản phẩm cần tìm';
            }
            return $output;
        }    
    }

    public function live_search_sp(Request $request){
        if($request->ajax()){
            $data = Traloicauhoi::where('idcauhoi','like','%'.$request->search.'%')
                                    ->orwhere('noidungcauhoi','like','%'.$request->search.'%')
                                    ->limit(4)
                                    ->get();
            $output = "";
            if(count($data)>0){
                $output ='
                    <div class="inner-list-question-hotro">
                    <ul class="list-group list-group-flush">
                    ';
                    foreach($data as $row){
                        $output .='
                            <a href="hotro/id='.$row->idcauhoi.'">
                                <li class="list-question">"'.$row->noidungcauhoi.'"</li>
                            </a>
                        ';
                    }
                $output .= '
                    </ul>
                </div>
                ';
            }
            else{
                $output .='<li class="list-group-item">Không có hỗ trợ cần tìm</li>';
            }
            return $output;
        }
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

    public function search(Request $request){
        $filterBrand = $this->getFilterWatch();
        $filterAccessory = $this->getFilterAccessory();
        if(isset($request->minprice)){
            $newsByPage = Sanpham::where('gia', '>=', $request->minprice)
                                    ->where('gia', '<', $request->maxprice)
                                    ->paginate($this->ProductPerPage); 
        }
        else{
            $newsByPage = Sanpham::where('idsanpham','like','%'.$request->search.'%')
                                    ->orwhere('tensanpham','like','%'.$request->search.'%')
                                    ->where('trangthai', 1)
                                    ->paginate($this->ProductPerPage); 
        } 
        $danhgia = DB::table('danhgia') 
                        ->get();    
        return view('pages.product.productSearch')
                        ->with('danhgia', $danhgia)
                        ->with('newsByPage', $newsByPage)
                        ->with('filterBrand', $filterBrand)
                        ->with('filterAccessory', $filterAccessory);               
    }
}
