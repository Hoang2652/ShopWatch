<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $CategoryPerPage = 15;

    public function index(){
        return(admin.category);
    }

    public function getCategoryNums(){
        return DB::table('danhmuc')->count;
    }

    public function getCategoryByPage(){
        return DB::table('danhmuc')->paginate($this->CategoryPerPage);
    }

    public function getCategoryById(){
        return DB::table('danhmuc')->where('iddanhmuc', $BillID)->get();
    }

    public function addCategory(){

    }

    public function deleteCategory(){

    }

    public function updateCategory(){

    }
}
