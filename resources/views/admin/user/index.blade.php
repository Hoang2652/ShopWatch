@extends('admin_masterlayout')
@section('user')
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Quản lý người dùng</title>
<link rel="stylesheet" href="{{ asset('public/backend/css/hienthi_sp.css') }}" /> 
</head>
<div class="quanlysp">
	<h3>QUẢN LÝ NGƯỜI DÙNG</h3>
    <div class="live-search form-row">
		<div class="col-md-2 mb-3">
			<label><i class="fas fa-search"></i> Tìm kiếm người dùng</label>
            <input type="text" class="form-control" name="timkiem" placeholder="Nhập id, username..." onkeyup="timkiemtructiep(this.value,'nguoidung')">
        </div>
        <div class="col-md-2 mb-3">
            <button type="button" name="button" value="thêm người dùng" style="margin-top: 32px; border: none"><a href='{{URL::to('admin/user/add')}}'  class="btn btn-primary">Thêm người dùng</a></button>
        </div>
	<p style="float:right; margin-top: 40px;">Có tổng cộng: <font color=red><b>{{ $UserNums }}</b></font> người dùng</p>
</div>
<div class='content-table scb'>
<table>
    <thead>
    <tr class='tieude_hienthi_sp'>
        <th>ID</th>
        <th style="width:150px;">Tên ND</th>
        <th>Username</th>
        <th>Email</th>
        <th>Điện thoại</th>
        <th style="width:75px;">Quyền</th>
        <th>Trạng thái</th>
        <th style="width:80px;">Sửa / Khóa / Xóa</th>
    </tr>
</thead>
<tbody id="row-sanpham" class="row-nguoidung">
    @foreach ($User as $row)
    <tr class='noidung_hienthi_sp'>
        <td class="masp_hienthi_sp">{{ $row->idnguoidung }}</td>
        <td class="stt_hienthi_sp">{{ $row->tennguoidung }}</td>
        <td class="img_hienthi_sp"> {{ $row->tendangnhap }}  </td>
        <td class="sl_hienthi_sp">{{ $row->email }}</td>
        <td class="sl_hienthi_sp">{{ $row->dienthoai }}</td>
        <td class="sl_hienthi_sp">
            @if( $row->phanquyen != 'Quản trị viên')
            {{ $row->phanquyen }}
            @endif
        </td>
        <td class="active_hienthi_sp">
            @if($row->trangthai == 1)
            <font color=blue>Mở khóa</font>
            @else
            <font color=red>Khóa</font>
            @endif    
        </td>
        <td class="active_hienthi_sp">
            <a href="{{URL::to('admin/user/change-status/id='.$row->idnguoidung.'/execute')}}" onclick="return confirm('Bạn có chắc muốn thay đổi trạng thái tài khoản {{ $row->tendangnhap }} này ?')"><i class="fa-solid fa-lock" style="transform: scale(1.5); color: green;"></i></a>
            <a href="{{URL::to('admin/user/update/id='.$row->idnguoidung)}}"><i class="fas fa-tools" style="transform: scale(1.5); color: blue;"></i></a>
            <a href="{{URL::to('admin/user/delete/id='.$row->idnguoidung.'/execute')}}" onclick="return confirm('Bạn có chắc muốn xóa người dùng này ?')"><i class="fas fa-trash-alt" style="transform: scale(1.5); color: red;"></i></a>
        </td>
    </tr>
    @endforeach
</tbody>
</table>
<nav aria-label="page navigation" id="page-navigation">
    {{  $User -> appends(request()->all())->links() }}
</nav>
</div>
<script language="JavaScript">
    function checklock(idnguoidung,tt)
    {
        var	idnguoidung=idnguoidung;
        var link="khoa_nguoidung.php?idnguoidung="+idnguoidung;
        if(tt==1)
        {
            if(confirm("Bạn có chắc chắn muốn khóa người dùng này?") == true)
                window.open(link,"_self",1);
        }
        else if(confirm("Bạn có chắc chắn muốn mở khóa người dùng này?") == true){
            window.open(link,"_self",1);
        }
    }
</script>
@endsection