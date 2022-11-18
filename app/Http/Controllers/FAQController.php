<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Traloicauhoi;
use Illuminate\Http\Request;
use App\Http\Requests\SupportRequest;
use DB;

class FAQController extends Controller
{ 
    public function addFAQ(Request $request){
        if (($request->ajax())) {
            $traloicauhoi = new Traloicauhoi;
            $traloicauhoi->noidungcauhoi = $request->get('noidungcauhoi');
            $traloicauhoi->cautraloi = $request->get('cautraloi');
            if($traloicauhoi->save())
                return $data = ['noidungcauhoi' => $traloicauhoi->noidungcauhoi];
        }
    }

    public function updateFAQ(Request $request){
        if (($request->ajax())) {
            $idcauhoi = $request->get('idcauhoi');
            $traloicauhoi = Traloicauhoi::find($idcauhoi);
            $traloicauhoi->noidungcauhoi = $request->get('noidungcauhoi');
            $traloicauhoi->cautraloi = $request->get('cautraloi');
            if($traloicauhoi->save())
                return $data = ['noidungcauhoi' => $traloicauhoi->noidungcauhoi];
        }
    }

    public function getFAQDetailByID($QuestionID){
        return DB::table('traloicauhoi')->where('idcauhoi',$QuestionID)->first();
    }

    public function getFQADetailbyAjax(Request $request){
        if (($request->ajax())) {
            $QuestionID = $request->get('QuestionID');
            $result = $this->getFAQDetailByID($QuestionID);
            $data = [
                'title' => $result->noidungcauhoi,
                'answer' => $result->cautraloi
            ];
            return $data;
        }
    }

    public function deleteFAQ(Request $request){
        if (($request->ajax())) {
            $FAQID = $request->get('faqID');
            $traloicauhoi = traloicauhoi::find($FAQID);
            $traloicauhoi->delete();
            $data = ['success' => 'Xóa câu hỏi "<b>'.$traloicauhoi->noidungcauhoi.'</b>" thành công'];
            return $data;
        }
    }


}