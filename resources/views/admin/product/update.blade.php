@extends('admin_masterlayout')
@section('updateproduct')
<link rel="stylesheet" href="{{ asset('public/backend/css/hienthi_sp.css') }}" /> 
<form class="formthemsanpham" action="update_sanpham.php?idsanpham={{ $productDetail->idsanpham }}" method="post" name="frm" onsubmit="" enctype="multipart/form-data">
	<div class="add__sp">
		<div class="tieude_themsp">
			<div colspan=2>Cập nhật thông tin Sản Phẩm </div>
		</div>

		<div class="form-row mb-3">
			<div class="col-md-6">
				<label for="tensanpham">Tên SP</label>
				<input class="form-control" type="text" name="tensanpham" value="{{ $productDetail->tensanpham }}"/>
			</div>
			<div class="col-md-6">
				<label for="iddanhmuc" style="display: grid">Thương Hiệu</label>
				<select class="custom-select mr-sm-2" style="width: 190px;" name="iddanhmuc">
					@foreach (collect($categories)->where('loaisanpham', 'TH')->all() as $categories)
						<option value="{{ $categories->iddanhmuc }}" @if( $categories->iddanhmuc == $productDetail->iddanhmuc) selected @endif>{{ $categories->tendanhmuc }}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="form-row mb-3">
			<div class="col-md-6">
				<label for="soluong">Số lượng mở bán</label>
				<input class="form-control col-sm-5" type="text" name="soluong" value="{{ $productDetail->soluong }}" />
			</div>
			<div class="col-md-6">
				<label for="soluong">Đã bán</label>
				<input class="form-control col-sm-5" type="text" name="daban" value="{{ $productDetail->daban }}" />
			</div>
			<div class="col-md-6">
				<label for="gia" >Giá</label>
				<input class="form-control col-sm-5" type="text" name="gia" value="{{ $productDetail->gia }}"/>
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
			</div>
		</div>
		<div class='form-row mb-3'>
            <div class='col-md-6'>
                <label for='loaisanpham'>Loại sản phẩm</label>	
				<br />		
                <select class='custom-select mr-sm-2' style='width: 190px;' name='loaisanpham' required>
					@foreach (collect($categories)->where('loaisanpham', 'LSP')->all() as $categories)
					<option value="{{ $categories->iddanhmuc }}" @if( $categories->iddanhmuc == $productDetail->iddanhmuc) selected @endif>{{ $categories->tendanhmuc }}</option>
					@endforeach
         	 	</select>
            </div>
            <div class='col-md-6'>
                <label for='xuatxu'>Xuất xứ</label>			
                <input class='form-control' type='text' name='xuatxu' value="{{ $productDetail->xuatxu }}" required/>
            </div>
        </div>
        <div class='form-row mb-3'>
            <div class='col-md-6'>
                <label for='mota'>Mô tả</label>			
                <input class='form-control' type='text' name='mota' value="{{ $productDetail->mota }}" required>
            </div>
            <div class='col-md-6'>
                <label for='baohanh'>Bảo hành (tháng)</label>			
                <input class='form-control' type='text' name='baohanh' value="{{ $productDetail->baohanh }}" required/>
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
				@for($i = 1; $i <= 5; $i++)
					@if($i <= $row->sodiem)
						<i class='fa-solid fa-star' style='color:hsl(47, 98%, 67%)'></i>
					@else
						<i class='fa-solid fa-star' style='color: hsl(47, 2%, 71%);'></i>
					@endif
				@endfor
					<div class='binhluan'>
						<div class='fas fa-trash-alt binhluan-xoadanhgia cl_red' onclick='checkdeldanhgia({{ $row->sodiem }})'></div>
						<div class='binhluan-tengnuoidung'>{{ $row->tennguoidung}} - {{ date_format(date_create($row -> created_at),"d-m-Y") }}</div>
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
@endsection
