@extends('admin_masterlayout')
@section('addcategory')
<title>Thêm Danh Mục</title>
<link rel="stylesheet" href="{{ asset('public/backend/css/them_sanpham.css') }}" />
<div class="contentdm">
	<form method="post" class="needs-validation" action="{{ URL::to('/admin/category/add/execute') }}">
		{{ csrf_field() }}
		<div class="tieude_themsp">
			Thêm Danh Mục
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Mã danh mục</label>
			<div class="col-sm-9">	
				<input class="form-control col-sm-3" type="text" disabled="disabled" name="iddanhmuc"/>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Tên danh mục</label>
			<div class="col-sm-9">	
				<input class="form-control" type="text" name="tendanhmuc" required />
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Mô tả danh mục</label>
			<div class="col-sm-9">
				<textarea class="form-control" name="mota" id="exampleFormControlTextarea1" rows="5" required ></textarea>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Loại danh mục</label>
			<div class="col-sm-3">
				<select class="form-control" name="loaidanhmuc">
					<option value="0">Danh mục chính</option>
					<option value="TH">Thương hiệu</option>
					<option value="LSP">Loại sản phẩm</option>
				</select>
			</div>
		</div>
		<div class="form-group row">
			<input type="submit" class="btn btn-primary" style="margin-left: 11rem;" value="Thêm" name="btnthem"/>
			<input type="reset" class="btn btn-danger" style="margin-left: 50px;" value="Hủy" name="btnhuy"/>
		</div>
	</form>
</div>
@endsection