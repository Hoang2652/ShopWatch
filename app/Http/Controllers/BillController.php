<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class BillController extends Controller
{
    protected $NumsPerPage = 10;

    //return number of news with pagination
    public function getBillByPage(){
        return DB::table('hoadon')->paginate($this->NumsPerPage);
    }

    //return information of news
    public function getBillDetail(int $BillID){
        return DB::table('chitiethoadon')->where('idhoadon', $BillID)->get();
    }

}
