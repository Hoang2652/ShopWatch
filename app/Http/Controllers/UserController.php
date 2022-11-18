<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Nguoidung;
use DB;

class UserController extends Controller
{
    protected $UserPerPage = 25;

    public function index()
    {
        return view('admin.user.index')->with('UserNums', $this->getUserNums())->with('User', $this->getUserByPage());
    }

    public function getUserByPage()
    {
        return DB::table('nguoidung')->where('phanquyen', '!=' , 'Quản trị viên')->orderBy('idnguoidung', 'asc')->paginate($this->UserPerPage);
    }

    public function getUserByKeySearch($query)
    {
        return DB::table('nguoidung')->where('idnguoidung', 'like', '%' . $query . '%')
                                   ->orWhere('tennguoidung', 'like', '%' . $query . '%')
                                   ->orderBy('idnguoidung', 'asc')->limit(25)->get();
    }


    public function userLiveSreach(Request $request)
    {
        if ($request->ajax()) {
            $query = $request->get('query');
            $table_row = $this->getUserByKeySearch($query);
            $total_row = $table_row->count();
            $data = [
                'total_row' => $total_row,
                'table_row' => $table_row
            ];
            return $data;
        }
    }

    public function addUserPage()
    {
        return view('admin.user.add');
    }

    public function addUser(UserRequest $request)
    {
        $nguoidung = new nguoidung;
        $nguoidung->tennguoidung = $request->tennguoidung;
        $nguoidung->tendangnhap = $request->tendangnhap;
        $nguoidung->matkhau = MD5($request->matkhau);
        $nguoidung->ngaysinh = $request->ngaysinh;
        $nguoidung->gioitinh = $request->gioitinh;
        $nguoidung->email = $request->email;
        $nguoidung->dienthoai = $request->dienthoai;
        $nguoidung->diachi = $request->diachi;
        $nguoidung->phanquyen = $request->phanquyen;
        $nguoidung->trangthai = 1;

        if ($nguoidung->save()) {
            toastr()->success('Thêm người dùng <b>"' . $nguoidung->tennguoidung . '"</b> thành công');
            return redirect('/admin/user');
        } else {
            toastr()->error('Thêm người dùng thất bại!');
        }
    }

    public function changeStatusUser($UserID)
    {
        $UserData = nguoidung::where('idnguoidung', $UserID)->first();
        $status = $UserData->trangthai;
        if($status == 0){
            $openAccount = nguoidung::where('idnguoidung', $UserID)->update(['trangthai' => 1]);
            if ($openAccount) {
                toastr()->success('Đã mở khóa tài khoản người dùng id <b>' . $UserID. '</b> thành công');
                return redirect('/admin/user');
            } else {
                toastr()->error('Mở khóa tài khoản người dùng id <b>' . $UserID. '</b> thất bại');
                return redirect('/admin/user');
            } 
        } else if($status == 1) {
            $blockAccount = nguoidung::where('idnguoidung', $UserID)->update(['trangthai' => 0]);
            if ($blockAccount) {
                toastr()->success('Đã khóa tài khoản người dùng id <b>' . $UserID. '</b> thành công');
                return redirect('/admin/user');
            } else {
                toastr()->error('Khóa tài khoản người dùng id <b>' . $UserID. '</b> không thất bại');
                return redirect('/admin/user');
            }
        }
         
    }

    public function updateUserPage($UserID)
    {
        $Category_Controller = new CategoryController;

        return view('admin.user.update')->with('userDetail', $this->getUserById($UserID));
    }

    public function updateUser(UserUpdateRequest $request, $idUser)
    {
        $nguoidung = nguoidung::find($idUser);
        $nguoidung->tennguoidung = $request->tennguoidung;
        $nguoidung->tendangnhap = $request->tendangnhap;
        $nguoidung->ngaysinh = $request->ngaysinh;
        $nguoidung->gioitinh = $request->gioitinh;
        $nguoidung->email = $request->email;
        $nguoidung->dienthoai = $request->dienthoai;
        $nguoidung->diachi = $request->diachi;
        $nguoidung->phanquyen = $request->phanquyen;
        $nguoidung->trangthai = 1;

        if($request->resetmatkhau != null)
            $nguoidung->matkhau = MD5("12345678");

        if ($nguoidung->save()) {
            toastr()->success('Cập nhật người dùng <b>"' . $nguoidung->tennguoidung . '"</b> thành công!');
            return redirect('/admin/user');
        } else {
            toastr()->error('Cập nhật người dùng <b>"' . $nguoidung->tennguoidung . '"</b> thất bại!');
        }
    }

    public function deleteUser($idUser)
    {
        $nguoidung = nguoidung::find($idUser);
        if ($nguoidung->delete()) {
            toastr()->success('Xóa người dùng <b>"' . $nguoidung->tennguoidung . '"</b> thành công!');
            return redirect('/admin/user');
        } else {
            toastr()->error('Xóa người dùng <b>"' . $nguoidung->tennguoidung . '"</b> thất bại!');
        }
    }

    public function getUserNums()
    {
        return DB::table('nguoidung')->count();
    }

    public function getUserById($UserID)
    {
        return DB::table('nguoidung')->where('idnguoidung', $UserID)->first();
    }
}
