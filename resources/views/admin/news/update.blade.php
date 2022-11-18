@extends('admin_masterlayout')
@section('updatenews')
<link rel="stylesheet" href="{{ asset('public/backend/css/them_sanpham.css') }}" />
<form action="{{ URL::to('/admin/news/update/id='.$newsDetail->idtintuc).'/execute' }}" method="post" name="frm" onsubmit="" enctype="multipart/form-data" class="form-suatintuc">
	{{ csrf_field() }}
	<div class="dangky">
		<table>
			<div class="tabs">
				<div style="text-align: center; font-weight: bold;">THÊM TIN TỨC</div>
			</div>
			<div class="form-row mb-3">			
				<div class="col-md-8"> 
					<label for="tieude">Tiêu đề  </label>
					<input type="text" name="tieude" class="form-control @error('tieude') is-invalid @enderror col-sm-10" value="{{ $newsDetail->tieude }}"/>
					@error('tieude')
						<span class='text-danger'>{{ $message }}</span>
					@enderror
				</div>
				<div class="col-md-4">
					<label for="tacgia">Tác giả</label>
					<input type="text" name="tacgia" class="form-control @error('tacgia') is-invalid @enderror col-sm-12" value="{{ $newsDetail->tacgia }}"/>
					@error('tacgia')
						<span class='text-danger'>{{ $message }}</span>
					@enderror
				</div>
			</div>
			<div class="form-row mb-3">			
				<div class="col-md-6"> 
					<label for="hinhanh">Hình ảnh  </label>
					<input type="file" name="hinhanh" class="form-control-file @error('hinhanh') is-invalid @enderror" value="{{ $newsDetail->hinhanh }}"/>
					@error('hinhanh')
						<span class='text-danger'>{{ $message }}</span>
					@enderror
				</div>
			</div>
			<div class="form-row mb-3">			
				<div class="col-md-12"> 
					<label for="noidungngan">Nội dung ngắn </label>
					<textarea name="noidungngan" class="form-control nd-ngan @error('noidungngan') is-invalid @enderror">{!! $newsDetail->noidungngan !!}</textarea>
					@error('noidungngan')
						<span class='text-danger'>{{ $message }}</span>
					@enderror
				</div>
			</div>	
			<div class="mb-3">
				<label for="chitiet">Nội dung chi tiết</label>
				<div>
					<textarea name="noidungchitiet" id="chitiet" class='@error('noidungchitiet') is-invalid @enderror'>
						{!! $newsDetail->noidungchitiet !!}
				   </textarea>
					@error('noidungchitiet')
						<span class='text-danger'>{{ $message }}</span>
					@enderror
				</div>
			</div>
			<div class="mb-3 mt-2">
				<div class="form-check">
					<input class="form-check-input" class="form-control col-sm-5" type="checkbox" name="trangthai" style="transform: scale(1.8);" @if($newsDetail->trangthai) checked @endif/>
					<label class="form-check-label" for="trangthai">  Công khai tin tức này ?</label>
				</div>
			</div>
			<div class="form-group row" style="margin-top: 2rem;"> 
				<input class="btn btn-primary" style="margin:auto;" type="submit" name="submit" value="Cập nhật tin tức" />
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
@endsection