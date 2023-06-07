<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hoadon;
use App\Models\Chitiethoadon;
use App\Models\Sanpham;

use App\Http\Requests\CheckoutRequest;
use App\Http\Controllers\CategoryController;
use DB;
use Session;

class BillController extends Controller
{
    protected $BillPerPage = 15;

    // Return view functions:
    public function index(){
        return view('admin.bill.index')->with('BillNums',$this->getBillNums())->with('Bill',$this->getBillByPage());
    }

    public function addBillPage(){
        $Category_Controller = new CategoryController;
        return view('admin.sale.addBill')->with('productType', $Category_Controller->getCategoryByType())
                                         ->with('productBrand', $Category_Controller->getCategoryByBrand());
    }


    // Query functions:


    public function addBill(Request $request){
        // dd($request->all());
        DB::beginTransaction();
        try {
            $hoadon = new Hoadon;
            $hoadon->idnguoidung = Session::get('idnguoidung');
            $hoadon->hoten = $request->hoten;
            $hoadon->diachi = $request->diachi;
            $hoadon->dienthoai = $request->dienthoai;
            $hoadon->email = $request->email;
            $hoadon->phuongthucthanhtoan = $request->phuongthuc;
            $hoadon->trangthai = "Chờ xử lý";
            $hoadon->save();
            $content = $request->product;
            // dd($content);
            foreach($content as [$qty,$id,$name,$price,$sale,$gift]){

                // Thao tác thêm chi tiêt hóa đơn
                $chitiethoadon = new Chitiethoadon;
                $chitiethoadon->idhoadon = $hoadon->idhoadon;
                $chitiethoadon->idsanpham = $id;
                $chitiethoadon->tensanpham = $name;
                $chitiethoadon->soluong = $qty;

                if($sale != 0 && $sale != null){
                    $chitiethoadon->giamgia = $sale;
                    $chitiethoadon->gia = $price * (100 - $sale) / 100;
                }
                else {
                    $chitiethoadon->giamgia = null;
                    $chitiethoadon->gia = $price;
                }

                if($gift != 0 && $gift != null)
                    $chitiethoadon->quatang = $gift;
                else
                    $chitiethoadon->quatang = null;
                $chitiethoadon->save();

                // Thao tác cập nhật số lượng sản phẩm / khuyến mãi
                $sanpham = Sanpham::find($id);
                $sanpham->soluong -= $qty;

                if($sale != null || $gift != null){
                    $sanpham->soluongkhuyenmai -= $qty;
                } 

                $sanpham->save();
            }

            DB::commit();
            toastr()->success("Thanh toán thành công, vui lòng chờ đơn hàng xử lí.");
            return Redirect('/sale');
        } catch (\Exception $e) {
            DB::rollback();
            toastr()->error('Ôi không có sự cố khi thanh toán, vui lòng thử lại sau !' . $e);
            return redirect('/sale');
        }
    }

    public function BillDetailPage($BillID){
        return view('admin.bill.detail')->with('BillInfo',$this->getBillById($BillID))
                                        ->with('BillDetail',$this->getBillDetailById($BillID));
    }

    // Get print view goes with BillInfo and BillDetail by given ID
    public function billPrintPage($BillID){
        return view('admin.bill.print')->with('BillInfo',$this->getBillById($BillID))
                                        ->with('BillDetail',$this->getBillDetailById($BillID));
    }

    // function: delete bill and billDetail with transaction make sure it can roll back if failed partially
    public function deleteBill($idBill){
        DB::beginTransaction();
        try {
            $chitiethoadon = chitiethoadon::where('idhoadon',$idBill);
            $chitiethoadon->delete();
            $hoadon = hoadon::where('idhoadon',$idBill);
            $hoadon->delete();
            DB::commit();
            toastr()->success('Xóa hóa đơn thành công!');
            return redirect('/admin/bill');
        } catch (\Exception $e) {
            DB::rollback();
            toastr()->error('Xóa hóa đơn thất bại!');
            return redirect('/admin/bill');
            // something went wrong
        }
    }

    // function: get total number of bill in database
    public function getBillNums(){
        return DB::table('hoadon')->count();
    }

    // function: get bill by page
    public function getBillByPage(){
        return DB::table('hoadon')->paginate($this->BillPerPage);
    }

    // function: get bill info by given its ID
    public function getBillById($BillID){
        return DB::table('hoadon')->where('idhoadon', $BillID)->first();
    }

    // Function: filter bills by ID keyword, date range and bill status.
    public function getBillbyFilters(Request $request){
        if ($request->ajax()) {
            $IDkeyword = $request->get('IDkeyword');
            $from = $request->get('from');
            $to = $request->get('to');
            $BillStatus = $request->get('BillStatus');
        }

        if($IDkeyword == null)
            $IDkeyword = '';
        if($from == null)
            $from = 0;
        if($to == null)
            $to = now();
        
        $table_row = DB::table('hoadon')->where('idhoadon','like', '%'.$IDkeyword.'%')
                                        ->whereDate('created_at', '>=' , $from) 
                                        ->whereDate('created_at', '<=' , $to)
                                        ->where('trangthai', 'like', '%'.$BillStatus.'%')->get() ;
        
        $total_row = $table_row->count();
        $data = [
            'total_row' => $total_row,
            'table_row' => $table_row
        ];
        return $data;
    }

    // Function: get all bill detail by given bill ID
    public function getBillDetailById($BillID){
        return DB::table('chitiethoadon')->where('idhoadon', $BillID)
                                         ->leftJoin('sanpham','sanpham.idsanpham','=','chitiethoadon.quatang')
                                         ->select('chitiethoadon.*','sanpham.tensanpham AS tenquatang','sanpham.idsanpham AS idquatang')
                                         ->get();
    }

    public function getStorageProductList(Request $request){
        if ($request->ajax()) {
            $BillID = $request->get('billID');
            $ProductList = $request->get('inputProduct');
        }
        
        $table_row = DB::table('chitiethoadon')->where('idhoadon',$BillID)
                                        ->join('vitrisanpham','vitrisanpham.idsanpham', '=', 'chitiethoadon.idsanpham')
                                        ->where('vitrisanpham.soluong', '>=', 'chitiethoadon.soluong')
                                        ->join('vitrikhohang','vitrikhohang.idvitrikhohang', '=' , 'vitrisanpham.idvitrikhohang')
                                        ->join('khohang','khohang.idkhohang', '=' , 'vitrikhohang.idkhohang')
                                        ->select('vitrisanpham.idsanpham','chitiethoadon.soluong as soluongyeucau','vitrikhohang.idkhohang','khohang.tenkhohang','vitrisanpham.soluong as soluongconlai','vitrisanpham.idvitrikhohang as idvitrikhohang')
                                        ->get();

        $addition_data = DB::table('chitiethoadon')->where('idhoadon',$BillID)
                                        ->join('vitrisanpham','vitrisanpham.idsanpham', '=', 'chitiethoadon.quatang')
                                        ->where('vitrisanpham.soluong', '>=', 'chitiethoadon.soluong')
                                        ->join('vitrikhohang','vitrikhohang.idvitrikhohang', '=' , 'vitrisanpham.idvitrikhohang')
                                        ->join('khohang','khohang.idkhohang', '=' , 'vitrikhohang.idkhohang')
                                        ->select('vitrisanpham.idsanpham','chitiethoadon.soluong as soluongyeucau','vitrikhohang.idkhohang','khohang.tenkhohang','vitrisanpham.soluong as soluongconlai','vitrisanpham.idvitrikhohang as idvitrikhohang')
                                        ->get();

        $result = $table_row->merge($addition_data);
        // dd($result);
        $data = [
            'table_row' => $result
        ];
        return $data;
    }

    public function getStorageProductToDeliver(Request $request){
        if ($request->ajax()) {
            $BillID = $request->get('billID');
            $ProductList = $request->get('inputProduct');
            // dd($request->all());
        }
        $message = "";

        //contain 3 procedure (subtract soluong from vitrisanpham, set trangthai hoadon to on delivery and set product location on bill detail)
        DB::beginTransaction();
        try {
            //subtract product from sanphamtrongkho and set location to product on bill detail
            foreach($ProductList as $row){
                $idkhohang = DB::table('vitrikhohang')->where('idvitrikhohang','=', $row['idvitrikhohang'])
                                          ->select('idkhohang')
                                          ->first();
                DB::table('chitiethoadon')->where('idhoadon',$BillID)->update(['idkhohang' => $idkhohang->idkhohang ]);
                DB::table('vitrisanpham')->where('idsanpham', $row['idsanpham'])
                                         ->where('idvitrikhohang', $row['idvitrikhohang'])
                                         ->decrement('soluong', $row['soluong']);
            }

            // set status on bill to on delivery
            DB::table('hoadon')->where('idhoadon',$BillID)->update(['trangthai' => 'Đang giao hàng']);
            DB::commit();
            $message = "Xử lý hóa đơn (Mã hóa đơn: <b>" .$BillID. "</b>) thành công!";
        } catch (\Exception $e) {
            DB::rollback();
            $message = "Xử lý hóa đơn thất bại, Vui lòng kiểm tra thử lại ";
            // something went wrong
        }

        return ['message' => $message];
    }

    // change bill status by ID
    public function changeBillStatusByID(Request $request)
    {
        $BillID = $request->idhoadon;
        $status = $request->status;
        $changeStatus = hoadon::where('idhoadon', $BillID)->update(['trangthai' => $status]);
        if($changeStatus){
            toastr()->success('Đã chuyển hóa đơn sang trạng thái <b>'.$status.'</b> !');
            return redirect('/admin/bill');
        } else {
            toastr()->error('Chuyển trạng thái hóa đơn <b>'.$BillID.'</b> thất bại!');
            return redirect('/admin/bill');
        }

    }
}
