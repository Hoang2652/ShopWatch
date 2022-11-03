<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Danhgia;;

class RatingController extends Controller
{
    public function getAllRating(){
        return danhgia::join('nguoidung', 'nguoidung.idnguoidung', '=', 'danhgia.idnguoidung')->select('danhgia.*','nguoidung.tennguoidung')->orderBy('updated_at')->get();
    }
}
