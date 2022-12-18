@extends('admin_masterlayout')
@section('adduser')
<link rel="stylesheet" href="{{ asset('public/backend/css/them_sanpham.css') }}" />
<form action="{{ URL::to('/admin/user/add/execute') }}" method="post" enctype="multipart/form-data" name="frm" style="width: fit-content; margin: auto;">
	{{ csrf_field() }}
	<div class="dangky">
		<div class="tabs">
			<div style="text-align: center; font-weight: bold;">THÊM NGƯỜI DÙNG</div>
		</div>
		
		<div class="form-row">			
			<div class="col-md-6"> 
				<label for="tendangnhap">Tên đăng nhập  </label>
				<input class="form-control @error('tendangnhap') is-invalid @enderror" type="text" name="tendangnhap" size="40" >
				@error('tendangnhap')
					<span class='invalid-feedback'>{{ $message }}</span>
				@enderror
			</div>
			<div class="col-md-6">
				<label for="tennguoidung">Tên người dùng</label>
				<input class="form-control @error('tennguoidung') is-invalid @enderror" type="text" name="tennguoidung" size="40">
				@error('tennguoidung')
					<span class='invalid-feedback'>{{ $message }}</span>
				@enderror
			</div>
		</div>
	
		<div class="form-row">
			<div class="col-md-6">
				<label for="matkhau">Mật khẩu</label>
				<input type="password" class="form-control @error('matkhau') is-invalid @enderror" name="matkhau" size="40" onclick="document.getElementById('canhbaomatkhau').innerHTML=''">
				@error('matkhau')
					<span class='invalid-feedback'>{{ $message }}</span>
				@enderror
			</div>
			
			<div class="col-md-6">
				<label for="nhaplaimatkhau">Nhập lại mật khẩu </label>
				<input type="password" class="form-control @error('nhaplaimatkhau') is-invalid @enderror" name="nhaplaimatkhau" size="40" onclick="document.getElementById('canhbaonhaplaimatkhau').innerHTML=''">
				@error('nhaplaimatkhau')
					<span class='invalid-feedback'>{{ $message }}</span>
				@enderror
			</div>
			
		</div>
		<div class="form-row">
			<div class="col-md-6">
				<label for="ngaysinh">Ngày sinh </label>
				<input class="form-control @error('ngaysinh') is-invalid @enderror" type="date" name="ngaysinh">
				@error('ngaysinh')
					<span class='invalid-feedback'>{{ $message }}</span>
				@enderror
			</div>
			<div class="col-md-6">
				<label for="diachi">Địa chỉ  </label>
				<input class="form-control" type="text" name="diachi">
			</div>
		</div>
		<div class="form-row">
			<div class="col-md-6">
				<label for="email">Email </label>
				<input class="form-control @error('email') is-invalid @enderror" type="text" name="email" size="40" onclick="document.getElementById('canhbaoemail').innerHTML=''">
				@error('email')
					<span class='invalid-feedback'>{{ $message }}</span>
				@enderror
			</div>
			<div class="col-md-6">
				<label for="dienthoai">Điện thoại </label>
				<input class="form-control @error('dienthoai') is-invalid @enderror" type="text" name="dienthoai" size="40" onclick="document.getElementById('canhbaodienthoai').innerHTML=''">
				<div class='canhbao' id='canhbaodienthoai'></div>
				@error('dienthoai')
				<span class='invalid-feedback'>{{ $message }}</span>
			@enderror
			</div>
		</div>
		<div class="form-row">
			<div class="col-md-6">
				<label for="gioitinh" style="display: grid">Giới tính </label>
				<select class="custom-select mr-sm-2 @error('gioitinh') is-invalid @enderror" style="width: 190px;" name="gioitinh">
					<option value="">-Chọn giới tính-</option>
					<option value="nam">Nam</option>
					<option value="nu">Nữ</option>
					<option value="bede">khác...</option>
				</select>
				<div class='canhbao' id='canhbaogioitinh'></div>
				@error('gioitinh')
					<span class='invalid-feedback'>{{ $message }}</span>
				@enderror
			</div>
			<div class="col-md-6">
				<label for="phanquyen" style="display: grid">Phân quyền  </label>
                <select class="custom-select mr-sm-2 @error('phanquyen') is-invalid @enderror" style="width: 190px;" name="phanquyen">
						<option value="">-Chọn phân quyền-</option>
					    <option value="Quản trị">Quản trị</option>
				    	<option value="Người dùng">Người dùng</option>
						<option value="Nhân viên bán hàng">Nhân viên bán hàng</option>
						<option value="Nhân viên kho hàng">Nhân viên kho hàng</option>
                </select>
				@error('phanquyen')
					<span class='invalid-feedback'>{{ $message }}</span>
				@enderror
				<div class='canhbao' id='canhbaophanquyen'></div>
            </div>
		</div>
		<div style="margin: auto; width: fit-content; margin-top: 2rem;">
			<button class="btn btn-primary" type="submit" name="submit">Thêm người dùng</button>
		</div>
	</div>
</form>
@endsection