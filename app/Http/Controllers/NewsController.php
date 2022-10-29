<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class NewsController extends Controller
{
    protected $newsPerPage = 4;
    // show all news
    public function showHomeNews(){
        $newsByPage = $this->getNewsByPage();
        return view('pages.news.news')->with('newsByPage',$newsByPage);
    }

    //return number of news with pagination
    public function getNewsByPage(){
        return DB::table('tintuc')->paginate($this->newsPerPage);
    }
    
    public function getNewsDetail($id){
        $newsDetail = DB::table('tintuc')->where('idtintuc',$id)->get();
        return view('pages.news.newsDetail')->with('newsDetail',$newsDetail);
    }
}
