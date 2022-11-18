@extends('admin_masterlayout')
@section('addnews')
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Thêm Tin Tức</title>
<link rel="stylesheet" href="{{ asset('public/backend/css/them_sanpham.css') }}" />
</head>

<body>
<form action="{{ URL::to('/admin/news/add/execute') }}" method="post" enctype="multipart/form-data" class="form-themtintuc">
	{{ csrf_field() }}
	<div class="dangky">
      	<table>
			<div class="tabs">
				<div style="text-align: center; font-weight: bold;">THÊM TIN TỨC</div>
			</div>
			<div class="form-row mb-3">			
				<div class="col-md-8"> 
					<label for="tendangnhap">Tiêu đề  </label>
					<input type="text" name="tieude" class="form-control @error('tieude') is-invalid @enderror col-sm-10"/>
					@error('tieude')
						<span class='text-danger'>{{ $message }}</span>
					@enderror
				</div>
				<div class="col-md-4">
					<label for="tennguoidung">Tác giả</label>
					<input type="text" name="tacgia" class="form-control @error('tacgia') is-invalid @enderror col-sm-12"/>
					@error('tacgia')
						<span class='text-danger'>{{ $message }}</span>
					@enderror
				</div>
			</div>
			<div class="form-row mb-3">			
				<div class="col-md-6"> 
					<label for="hinhanh">Hình ảnh  </label>
					<input type="file" name="hinhanh" class="form-control-file @error('hinhanh') is-invalid @enderror"/>
					@error('hinhanh')
						<span class='text-danger'>{{ $message }}</span>
					@enderror
				</div>
			</div>
			<div class="form-row mb-3">			
				<div class="col-md-12"> 
					<label for="noidungngan">Nội dung ngắn </label>
					<textarea name="noidungngan" class="form-control nd-ngan @error('noidungngan') is-invalid @enderror"></textarea>
					@error('noidungngan')
						<span class='text-danger'>{{ $message }}</span>
					@enderror
				</div>
			</div>	
			<div class="mb-3">
				<label for="chitiet">Nội dung chi tiết</label>
				<div class="@error('noidungchitiet') is-invalid @enderror">
					<textarea name="noidungchitiet" id="chitiet"></textarea>
					@error('noidungchitiet')
						<span class='text-danger'>{{ $message }}</span>
					@enderror
				</div>
			</div>
			<div class="mb-3 mt-2">
				<div class="form-check">
					<input class="form-check-input" class="form-control col-sm-5" style="transform: scale(1.8);" type="checkbox" name="trangthai" />
					<label class="form-check-label" for="trangthai" >  Công khai ngay khi thêm tin tức</label>
				</div>
			</div>
			<div class="form-group row" style="margin-top: 2rem;"> 
				<input class="btn btn-primary" style="margin:auto;" type="submit" name="submit" value="Thêm tin tức" />
				<input class="btn btn-danger" style="margin:auto; margin-right: 10rem" type="reset" name="" value="Về mặc định" />
			</div>
        </table> 
	</div> 
</form>

<script type="text/javascript" language="javascript">
 
  CKEDITOR.replace( 'chitiet', {
	uiColor: '#d1d1d1'
});
</script>

</body>
</html>
@endsection