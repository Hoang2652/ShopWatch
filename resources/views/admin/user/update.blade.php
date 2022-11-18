@extends('admin_masterlayout')
@section('updateuser')
<link rel="stylesheet" href="{{ asset('public/backend/css/them_sanpham.css') }}" />
<form action="{{ URL::to('/admin/user/update/id='.$userDetail->idnguoidung).'/execute' }}" method="post" name="frm" enctype="multipart/form-data" style="width: fit-content; margin: auto;">
	{{ csrf_field() }}
	<div class="dangky">
		<div class="tabs">
			<div style="text-align: center; font-weight: bold;">SỬA NGƯỜI DÙNG</div>
		</div>
		
		<div class="form-row">			
			<div class="col-md-6"> 
				<label for="tendangnhap">Tên đăng nhập  </label>
				<input class="form-control @error('tendangnhap') is-invalid @enderror" type="text" name="tendangnhap" size="40" value="{{ $userDetail->tendangnhap }}">
				<div class='canhbao' id='canhbaotendangnhap'></div>
				@error('tendangnhap')
					<span class='invalid-feedback'>{{ $message }}</span>
				@enderror
			</div>
			<div class="col-md-6">
				<label for="tennguoidung">Tên người dùng</label>
				<input class="form-control @error('tennguoidung') is-invalid @enderror" type="text" name="tennguoidung" size="40" value="{{ $userDetail->tennguoidung }}">
				<div class='canhbao' id='canhbaotennguoidung'></div>
				@error('tennguoidung')
					<span class='invalid-feedback'>{{ $message }}</span>
				@enderror
			</div>
		</div>
	
		<div class="form-row">
			<div class="col-md-6">
				<label for="matkhau">Reset mật khẩu</label>
				<input type="checkbox" class="form-control" name="resetmatkhau" size="40">
			</div>
		</div>
		<div class="form-row">
			<div class="col-md-6">
				<label for="ngaysinh">Ngày sinh </label>
				<input class="form-control @error('ngaysinh') is-invalid @enderror" type="date" name="ngaysinh" value="{{ $userDetail->ngaysinh }}">
				@error('ngaysinh')
					<span class='invalid-feedback'>{{ $message }}</span>
				@enderror
			</div>
			<div class="col-md-6">
				<label for="diachi">Địa chỉ  </label>
				<input class="form-control" type="text" name="diachi" value="{{ $userDetail->diachi }}">
			</div>
		</div>
		<div class="form-row">
			<div class="col-md-6">
				<label for="email">Email </label>
				<input class="form-control @error('email') is-invalid @enderror" type="text" name="email" size="40" value="{{ $userDetail->email }}">
				@error('email')
					<span class='invalid-feedback'>{{ $message }}</span>
				@enderror
			</div>
			<div class="col-md-6">
				<label for="dienthoai">Điện thoại </label>
				<input class="form-control @error('dienthoai') is-invalid @enderror" type="text" name="dienthoai" size="40" value="{{ $userDetail->dienthoai }}">
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
					<option value="nam" @if($userDetail->gioitinh == "nam") selected @endif>Nam</option>
					<option value="nu" @if($userDetail->gioitinh == "nu") selected @endif>Nữ</option>
					<option value="bede" @if($userDetail->gioitinh == "bede") selected @endif>khác...</option>
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
					    <option value="2" @if($userDetail->phanquyen == 2) selected @endif>Quản lý</option>
				    	<option value="1" @if($userDetail->phanquyen == 1) selected @endif>Người dùng</option>
                </select>
				@error('phanquyen')
					<span class='invalid-feedback'>{{ $message }}</span>
				@enderror
				<div class='canhbao' id='canhbaophanquyen'></div>
            </div>
		</div>
		<div style="margin: auto; width: fit-content; margin-top: 2rem;">
			<button class="btn btn-primary" type="submit" name="submit">Cập nhật</button>
			<button type="reset" class="btn btn-danger" style="margin-left: 4rem;" name="btnhuy">Bỏ thay đổi</button>
		</div>
	</div>
</form>
 @endsection