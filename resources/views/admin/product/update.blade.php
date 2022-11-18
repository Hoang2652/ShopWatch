@extends('admin_masterlayout')
@section('updateproduct')
<link rel="stylesheet" href="{{ asset('public/backend/css/hienthi_sp.css') }}" /> 
<link rel="stylesheet" href="{{ asset('public/backend/css/them_sanpham.css') }}" />
<form class="formthemsanpham" action="{{ URL::to('/admin/product/update/id='.$productDetail->idsanpham).'/execute' }}" method="post" name="frm" onsubmit="" enctype="multipart/form-data">
	{{ csrf_field() }}
	<div class="add__sp">
		<div class="tieude_themsp">
			<div colspan=2>Cập nhật thông tin Sản Phẩm </div>
		</div>

		<div class="form-row mb-3">
			<div class="col-md-6">
				<label for="tensanpham">Tên sản phẩm:</label>
				<input class="form-control" type="text" name="tensanpham" value="{{ $productDetail->tensanpham }}"/>
				@error('tensanpham')
					<span class='text-danger'>{{ $message }}</span>
				@enderror
			</div>
			<div class="col-md-6">
				<label for="iddanhmuc" style="display: grid">Thương Hiệu</label>
				<select class="custom-select mr-sm-2" style="width: 190px;" name="iddanhmuc">
					@foreach ($productBrand as $cate2)
						<option value="{{ $cate2->iddanhmuc }}" @if( $cate2->iddanhmuc == $productDetail->iddanhmuc) selected @endif>{{ $cate2->tendanhmuc }}</option>
					@endforeach
				</select>
				@error('iddanhmuc')
					<span class='text-danger'>{{ $message }}</span>
				@enderror
			</div>
		</div>
		<div class="form-row mb-3">
			<div class="col-md-6">
				<label for="soluong">Số lượng mở bán</label>
				<input class="form-control col-sm-5" type="text" name="soluong" value="{{ $productDetail->soluong }}" />
				@error('soluong')
					<span class='text-danger'>{{ $message }}</span>
				@enderror
			</div>
			<div class="col-md-6">
				<label for="soluong">Đã bán</label>
				<input class="form-control col-sm-5" type="text" name="daban" value="{{ $productDetail->daban }}" />
			</div>
			<div class="col-md-6">
				<label for="gia" >Giá</label>
				<input class="form-control col-sm-5" type="text" name="gia" value="{{ $productDetail->gia }}"/>
				@error('gia')
				<span class='text-danger'>{{ $message }}</span>
			@enderror
			</div>
			
		</div>
		<div class="form-row mb-3">
			<div class="col-md-6">
				<label for="hinhanh">Hình ảnh</label>
				<br />	
				<img src="{{ asset('public/uploads/products/'.$productDetail->hinhanh) }}" width="160" height="160"/>	
				<br />
				<br />	
				<input class="form-control-file" type="file" name="hinhanh" value="{{ $productDetail->hinhanh }}"/>
				@error('hinhanh')
				<span class='text-danger'>{{ $message }}</span>
				@enderror
			</div>
		</div>
		<div class='form-row mb-3'>
            <div class='col-md-6'>
                <label for='loaisanpham'>Loại sản phẩm</label>	
				<br />
                <select class='custom-select mr-sm-2' style='width: 190px;' name='loaisanpham' >
					@foreach ($productType as $cate)
					<option value="{{ $cate->iddanhmuc }}" @if( $cate->iddanhmuc == $productDetail->loaisanpham) selected @endif>{{ $cate->tendanhmuc }}</option>
					@endforeach
         	 	</select>
				  @error('loaisanpham')
				  <span class='text-danger'>{{ $message }}</span>
				  @enderror
            </div>
            <div class='col-md-6'>
                <label for='xuatxu'>Xuất xứ</label>			
                <input class='form-control' type='text' name='xuatxu' value="{{ $productDetail->xuatxu }}" />
            </div>
        </div>
        <div class='form-row mb-3'>
            <div class='col-md-6'>
                <label for='mota'>Mô tả</label>			
                <input class='form-control' type='text' name='mota' value="{!! $productDetail->mota !!}" >
				@error('mota')
					<span class='text-danger'>{{ $message }}</span>
				@enderror
            </div>
            <div class='col-md-6'>
                <label for='baohanh'>Bảo hành (tháng)</label>			
                <input class='form-control' type='text' name='baohanh' value="{{ $productDetail->baohanh }}" />
            </div>
        </div>
		<div class="mb-3">
			<label for="chitiet">Chi tiết</label>
			<div>
				<textarea name="chitiet" id="chitiet">{{ $productDetail->chitiet }}</textarea>
			</div>
		</div>
		Đề cử <font>(có thể bỏ qua)</font>
			<div class="mb-3 mt-2">
				<div class="form-check">
					<input class="form-check-input" class="form-control col-sm-5" type="checkbox" name="decusanpham" />
					<label class="form-check-label" for="decusanpham" >Sản phẩm đề cử</label>
				</div>
			</div>
		Cài đặt khuyến mãi <font>(có thể bỏ qua)</font>
		<div class="form-row mb-3 mt-2">
			<div class="col-md-6">
				<label for="giamgia">Giảm giá: </label>
				<input class="form-control col-sm-5" maxlength="3" type="text" name="giamgia" value="{{ $productDetail->giamgia }}"/>
			</div>
			<div class="col-md-6">
				<label for="quatang" >Quà tặng (id sản phẩm): </label>
				<input class="form-control col-sm-5" type="text" name="quatang" value="{{ $productDetail->quatang }}"/>
			</div>
		</div>
		<div class="form-row">
			<div class="col-md-6">
				<label for="soluongkhuyenmai" >số lượng khuyến mãi (không thể vượt qua số lượng sản phẩm):</label>
				<input class="form-control col-sm-5" maxlength="5" type="text" name="soluongkhuyenmai" value="{{ $productDetail->soluongkhuyenmai }}"/>
			</div>
		</div>
		<div class="form-group row" style="margin-top: 2rem;"> 
			<input class="btn btn-primary" style="margin:auto;" type="submit" name="submit" value="Sửa sản phẩm" />
			<input class="btn btn-danger" style="margin:auto; margin-right: 10rem" type="reset" name="" value="Về mặc định" />
		</div>
		<div class="danhgia__title">
			<h4>Đánh giá tiêu biểu</h4>	
			@foreach ($ratings as $row)
			<div id="danhsachdanhgia" class="danhsachdanhgia">
				@for($i = 1; $i <= $row->sodiem; $i++)
					<i class='fa-solid fa-star' style='color:hsl(47, 98%, 67%)'></i>
				@endfor
				@for($i = 1; $i <= 5-$row->sodiem; $i++)
					<i class='fa-solid fa-star' style='color: hsl(47, 2%, 71%);'></i>
				@endfor
					<div class='binhluan'>
						<div class='fas fa-trash-alt binhluan-xoadanhgia cl_red' onclick='checkdeldanhgia({{ $row->sodiem }})'></div>
						<div class='binhluan-tengnuoidung'>{{ $row->tennguoidung}} - {{ date("d-m-Y",$row -> updated_at)  }}</div>
						<div class='binhluan-sodiem'>{{ $row->sodiem }}</div>
						<div class='binhluan-chitiet'>{{ $row->binhluan }}</div>
					</div>
			</div>
			@endforeach
		</div>	
	</div>
</form>
<script type="text/javascript" language="javascript">
  CKEDITOR.replace( 'chitiet', {
	uiColor: '#d1d1d1'
});
</script>
{{-- @php
dd($ratings->all());
@endphp --}}
@endsection
{{-- {{ date_format(date_create_from_format($row -> updated_at),"d-m-Y") }} --}}