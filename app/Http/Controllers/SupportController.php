<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class SupportController extends Controller
{
    //get view Support
    public function getViewSupport(){
        $FAQ = DB::table('traloicauhoi')->get();
        return view('pages.support.support')->with('FAQ',$FAQ);
    }
    //get view Support Detail
    public function getViewSupportDetail($id){
        $view = DB::table('traloicauhoi')->where('idcauhoi',$id)->get();
        return view('pages.support.supportDetail')->with('view',$view);
    }
}
