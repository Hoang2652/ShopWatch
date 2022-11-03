@extends('admin_masterlayout')
@section('updatecategory')
<link rel="stylesheet" href="{{ asset('public/backend/css/them_sanpham.css') }}" />
<div class="contentdm">
	<form action="{{ URL::to('/admin/category/update/id='.$categoryDetail->iddanhmuc.'/execute')}}" method="post" name="frm" onsubmit="return kiemtra()"> 
		{{ csrf_field() }}
		<div class="tieude_themsp">
			Sửa Danh Mục
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Mã danh mục</label>
			<div class="col-sm-9">	
				<input class="form-control col-sm-3" type="text" disabled="disabled" name="iddanhmuc" value="{{ $categoryDetail->iddanhmuc }}"/>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Tên danh mục</label>
			<div class="col-sm-9">	
				<input class="form-control" value="{{ $categoryDetail->tendanhmuc }}" type="text" name="tendanhmuc" required />
			</div>
		</div>
		<div class="form-group row">
		<label class="col-sm-2 col-form-label">Mô tả danh mục</label>
		<div class="col-sm-9">
			<textarea class="form-control" name="mota" id="exampleFormControlTextarea1" required >{{ $categoryDetail->mota }}</textarea>
		</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Loại danh mục</label>
			<div class="col-sm-3">
				<select class="form-control" name="loaidanhmuc" value="">
					<option value="{{ $categoryDetail->loaidanhmuc }}">{{ $categoryDetail->loaidanhmuc }}</option>
					<option value="TH">Thương Hiệu</option>
					<option value="LSP">Loại sản phẩm</option>
				</select>
			</div>
		</div>
		<div class="form-group row">
			<input type="submit" class="btn btn-primary" style="margin-left: 11rem;" value="Sửa" name="btnthem"/>
			<input type="reset" class="btn btn-danger" style="margin-left: 4rem;" value="Hủy" name="btnhuy"/>
		</div>
		</table>
	</form>
</div>
</body>
</html>

<script language="javascript">
 	function  kiemtra()
	{
	    if(frm.tendanhmuc.value=="")
		{
			alert("Bạn chưa nhập tên danh mục. Vui lòng kiểm tra lại");
			frm.tendanhmuc.focus();
			return false;	
		}
	}
 </script>
 @endsection