@extends('admin_masterlayout')
@section('addproduct')
<link rel="stylesheet" href="{{ asset('public/backend/css/them_sanpham.css') }}" />
</head>

<body>
<form class="formthemsanpham" action="{{ URL::to('/admin/product/add/execute') }}" method="post" enctype="multipart/form-data" name="frm" onsubmit="return kiemtra()">
	{{ csrf_field() }}
	<div class="add__sp">
		<div class="tieude_themsp">
			<div colspan=2>Thêm Sản Phẩm </div>
		</div>
		<div id='inputfield'>
			<div class="form-row mb-3">
				<div class="col-md-6">
					<label for="tensanpham">Tên sản phẩm: </label>
					<input class="form-control" type="text" name="tensanpham"/>
					@error('tensanpham')
						<span class='text-danger'>{{ $message }}</span>
					@enderror
				</div>
				<div class="col-md-6">
					<label for="iddanhmuc" style="display: grid">Thương hiệu</label>
					<select class="custom-select mr-sm-2" style="width: 190px;" name="iddanhmuc">
						<option value="">**Chọn danh mục**</option>
						@foreach ($productBrand as $cate2)
							<option value="{{ $cate2->iddanhmuc }}">{{ $cate2->tendanhmuc }}</option>
						@endforeach
					</select>
					@error('iddanhmuc')
					<span class='text-danger'>{{ $message }}</span>
				@enderror
				</div>
			</div>
			<div class="form-row mb-3">
				<div class="col-md-6">
					<label for="soluong">Số lượng</label>
					<input class="form-control col-sm-5" type="text" name="soluong"/>
					@error('soluong')
					<span class='text-danger'>{{ $message }}</span>
				@enderror
				</div>
				<div class="col-md-6">
					<label for="gia" >Giá bán</label>
					<input class="form-control col-sm-5" type="text" name="gia"/>
					@error('gia')
					<span class='text-danger'>{{ $message }}</span>
				@enderror
				</div>
			</div>
			<div class="form-row mb-3">
				<div class="col-md-6">
					<label for="hinhanh">Hình ảnh</label>			
					<input class="form-control-file" type="file" name="hinhanh"/>
					@error('hinhanh')
					<span class='text-danger'>{{ $message }}</span>
					@enderror
				</div>
				<div class='col-md-6'>
					<label for='loaisanpham'>Loại sản phẩm</label>	
					<br />
					<select class='custom-select mr-sm-2' style='width: 190px;' name='loaisanpham'>
						<option value="">**Chọn danh mục**</option>
						@foreach ($productType as $cate)
							<option value="{{ $cate->iddanhmuc }}">{{ $cate->tendanhmuc }}</option>
						@endforeach
					</select>
					@error('loaisanpham')
					<span class='text-danger'>{{ $message }}</span>
					@enderror
				</div>
			</div>
			<div class='form-row mb-3'>
				<div class='col-md-6'>
                	<label for='xuatxu'>Xuất xứ</label>			
	                <input class='form-control' type='text' name='xuatxu'/>
            	</div>
				<div class='col-md-3'>
					<label for='baohanh'>Bảo hành (tháng)</label>			
					<input class='form-control' type='text' name='baohanh'/>
				</div>
       		</div>
			<div class='form-row mb-3'>
			   <div class='col-md-6'>
					<label for='mota'>Mô tả</label>			
					<textarea class='form-control' type='text' name='mota'></textarea>
					@error('mota')
					<span class='text-danger'>{{ $message }}</span>
				@enderror
				</div>
			</div>
		</div>
		<div class="mb-3">
			<label for="chitiet">Chi tiết</label>
			<div>
				<textarea name="chitiet" id="chitiet"></textarea>
			</div>
		</div>
		Đề cử <font>(có thể bỏ qua)</font>
			<div class="mb-3 mt-2">
				<div class="form-check">
					<input class="form-check-input" class="form-control col-sm-5" type="checkbox" name="decusanpham" />
					<label class="form-check-label" for="decusanpham" >Đề cử sản phẩm này</label>
				</div>
			</div>
		Cài đặt khuyến mãi <font>(có thể bỏ qua)</font>
		<div class="form-row mb-3 mt-2">
			<div class="col-md-6">
				<label for="giamgia">Giảm giá: </label>
				<input class="form-control col-sm-5" maxlength="3" type="text" name="giamgia" value=""/>
			</div>
			<div class="col-md-6">
				<label for="quatang" >Quà tặng kèm: </label>
				<input class="form-control col-sm-5" type="text" name="quatang" value=""/>
			</div>
		</div>
		<div class="form-row">
			<div class="col-md-6">
				<label for="soluongkhuyenmai" >số lượng khuyến mãi (không thể vượt qua số lượng sản phẩm):</label>
				<input class="form-control col-sm-5" maxlength="5" type="text" name="soluongkhuyenmai" value=""/>
			</div>
		</div>
		<div class="form-group row" style="margin-top: 2rem;"> 
			<input class="btn btn-primary" style="margin:auto;" type="submit" name="submit" value="Thêm sản phẩm" />
			<input class="btn btn-danger" style="margin:auto; margin-right: 10rem" type="reset" name="" value="Về mặc định" />
		</div>
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
{{-- <script language="javascript">
 	function  kiemtra()
	{
	    
		if(frm.tensanpham.value=="")
	 	{
			alert("Bạn chưa nhập tên SP. Vui lòng kiểm tra lại");
			frm.tensanpham.focus();
			return false;	
		}
		if(frm.hinhanh.value=="")
		{
			alert("Bạn chưa chọn hình ảnh");	
			frm.hinhanh.focus();
			return false;
		}
		if(frm.soluong.value=="")
		{
			alert("Bạn chưa nhập số lượng");	
			frm.soluong.focus();
			return false;
		}
		if(frm.iddanhmuc.value=="")
		{
			alert("Bạn chưa chọn danh mục");	
			frm.iddanhmuc.focus();
			return false;
		}
	}
 </script> --}}
 