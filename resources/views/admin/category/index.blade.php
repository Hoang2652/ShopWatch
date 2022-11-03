@extends('admin_masterlayout')
@section('category')
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Danh Mục</title>
<link rel="stylesheet" href="{{ asset('public/backend/css/hienthi_sp.css') }}" /> 
{{-- sửa lại đường link --}}
</head>
<div class="quanlysp" style=" height: 130px;">
	<h3>QUẢN LÝ DANH MỤC</h3>
	
	<div class="live-search form-row">
		<div class="col-md-2 mb-3">
			<label><i class="fas fa-search"></i> Tìm kiếm danh mục</label>
			<input class="form-control" type="text" name="timkiem" placeholder="Nhập id hoặc tên..." onkeyup="timkiemtructiep(this.value,'danhmuc')">
		</div>
		<div class="col-md-2 mb-3">
			<button style="margin-top: 32px; border: none"><a href="{{URL::to('admin/category/add')}}" class="btn btn-primary">Thêm danh mục</a></button>
		</div>
		<p style="float:right; margin-top: 45px;">Có tổng cộng: <font color=red><b>{{ $CategoryNums }}</b></font> danh mục</p>
	</div>
</div>
<div class='scb content-table'>
	<table>
		<thead>
        <tr class="tieude_hienthi_sp">
        	<th>ID</th>
            <th> Tên phân loại</th>
            <th>Loại danh mục</th>
			<th style="width: 620px;">Mô tả</th>
            <th colspan=2>Chỉnh sửa</th>
        </tr>
		</thead>
		<tbody id="row-sanpham">
			@foreach($Category as $row)
			<tr>
				<td class="masp_hienthi_sp">
					 {{ $row->iddanhmuc }}
				</td>
				<td class="tensp_hienthi_sp">
					 {{ $row->tendanhmuc }}
				 </td>
				 <td class="masp_hienthi_sp">
					@if($row->loaidanhmuc == "LSP")
					<p>Loại sản phẩm</p>
					@elseif($row->loaidanhmuc == "TH")
					<p>thương hiệu</p>
					@else
					<p>chưa rõ</p>
					@endif
				 </td>
				 <td class="masp_hienthi_sp">
					 {{ Str::limit($row->mota,100) }}
				 </td>
				 <td class="active_hienthi_sp">
					 <a href="{{URL::to('admin/category/update/id='.$row->iddanhmuc)}}"><i class="fas fa-tools" style="transform: scale(1.5); color: #007bff;"></i></a>
					 <a href="{{URL::to('admin/category/delete/id='.$row->iddanhmuc.'/execute')}}"><button><i class="fas fa-trash-alt" style="transform: scale(1.5); color: red;"></i></button></a>
				</td>
			@endforeach
		</tbody>
    </table>
	<nav aria-label="page navigation">
		{{  $Category -> appends(request()->all())->links() }}
	</nav>
			</div>
<body>
</body>
</html>
@endsection