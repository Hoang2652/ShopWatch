<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Http\Requests;
use App\Model\Hoadon;
use Cart;

class CartController extends Controller
{
    public function save_cart(Request $request){
        $productID = $request->productID_hidden;
        $quantity = $request->qty;

        $product_info = DB::table('sanpham')
                    ->where('idsanpham', $productID)
                    ->first();
        $data['id'] = $product_info->idsanpham;
        $data['qty'] = $quantity;
        $data['name'] = $product_info->tensanpham;
        $data['price'] = $product_info->gia;
        $data['weight'] = 0;
        $data['options']['sale'] = 0;
        $data['options']['gift'] = 0;
        if($product_info->soluongkhuyenmai > 0){
            if($product_info->giamgia != null){
                $data['options']['sale'] = $product_info->giamgia;
            }
            if($product_info->quatang != null){
                $product_gift = DB::table('sanpham')
                                    ->where('idsanpham', $product_info->quatang)
                                    ->first();
                $data['options']['gift'] = $product_gift->tensanpham;
            }    
        }
        
        Cart::add($data);
        toastr()->success('Thêm sản phẩm <b>'."$product_info->tensanpham".'</b> thành công');
        return Redirect::to("/sanpham/idsanpham=".$product_info->idsanpham);
    }

    public function save_cart_ajax(Request $request){
        $bill = new Hoadon;
        $productID = $request->productID_hidden;
        $quantity = $request->qty;

        $product_info = DB::table('sanpham')
                    ->where('idsanpham', $productID)
                    ->first();
        $data['id'] = $product_info->idsanpham;
        $data['qty'] = $quantity;
        $data['name'] = $product_info->tensanpham;
        $data['price'] = $product_info->gia;
        $data['weight'] = 0;
        $data['options']['sale'] = 0;
        $data['options']['gift'] = 0;
        if($product_info->soluongkhuyenmai > 0){
            if($product_info->giamgia != null){
                $data['options']['sale'] = $product_info->giamgia;
            }
            if($product_info->quatang != null){
                $product_gift = DB::table('sanpham')
                                    ->where('idsanpham', $product_info->quatang)
                                    ->first();
                $data['options']['gift'] = $product_gift->tensanpham;
            }    
        }
        
        Cart::add($data);
    }
    //get view cart
    public function getViewCart(){
        return view('pages.cart.cart');
    }

    public function delete_to_cart($rowId){
        Cart::remove($rowId); 
        return Redirect::to("/giohang");
    }

    public function clear_cart(){
        Cart::destroy();
        return Redirect::to("/sanpham/dongho");
    }
}
