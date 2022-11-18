<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Danhgia;;

class RatingController extends Controller
{
    public function getAllRatingByProductID($ProductID){
        return danhgia::where('idsanpham',$ProductID)
                        ->join('nguoidung', 'nguoidung.idnguoidung', '=', 'danhgia.idnguoidung')                
                        ->select('danhgia.*','nguoidung.tennguoidung')
                        ->orderByDesc('updated_at')
                        ->get();
    }
}
