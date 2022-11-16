@extends('masterlayout')
@section('register')

<div class="register">
	<div class="register__content">
		<div class="register__img">
			<img src="{{asset('public/frontend/images/img-login.png')}}" alt="">
		</div>
		<div class="register__form">
			<form action="{{ URL::to('/register-Account') }}" class="form__register" method="post" name="frm">
				{{ csrf_field() }}
				<h1 class="login__title">Đăng ký</h1>
				<div class="register__box">
					<input class="login__input @error('tennguoidung') is-invalid @enderror" placeholder="Họ và tên" type="text" name="tennguoidung">
					@error('tennguoidung')
					    <span class='invalid-feedback'>{{ $message }}</span>
				    @enderror
				</div>
				<div class="register__box">
					<input class="login__input @error('tendangnhap') is-invalid @enderror" placeholder="Tên đăng nhập" type="text" name="tendangnhap">
					@error('tendangnhap')
					    <span class='invalid-feedback'>{{ $message }}</span>
				    @enderror
				</div>
				<div class="register__box">
					<input class="login__input @error('matkhau') is-invalid @enderror" placeholder="Mật khẩu" type="password" name="matkhau">
					@error('matkhau')
					    <span class='invalid-feedback'>{{ $message }}</span>
				    @enderror
				</div>
				<div class="register__box">
					<input class="login__input @error('matkhau1') is-invalid @enderror" placeholder="Nhập lại mật khẩu" type="password" name="matkhau1">
					@error('matkhau1')
					    <span class='invalid-feedback'>{{ $message }}</span>
				    @enderror
				</div>
				<div class="register__box">
					<input class="login__input @error('dienthoai') is-invalid @enderror" placeholder="Điện thoại" type="text" name="dienthoai">
					@error('dienthoai')
					    <span class='invalid-feedback'>{{ $message }}</span>
				    @enderror
				</div>
				<div class="register__box">
					<input class="login__input @error('email') is-invalid @enderror" placeholder="Email" type="text" name="email">
					@error('email')
					    <span class='invalid-feedback'>{{ $message }}</span>
				    @enderror
				</div>
				<div class="register__box">
					<input class="login__input @error('diachi') is-invalid @enderror" placeholder="Địa chỉ" type="text" name="diachi">
					@error('diachi')
					    <span class='invalid-feedback'>{{ $message }}</span>
				    @enderror
				</div>
					
				<div class="register__row">
					<div class="col-md-7">
						<label for="exampleInputEmail1" class="register__label">Ngày sinh</label>
						<input class="form-control @error('ngaysinh') is-invalid @enderror" type="date" name="ngaysinh" style="border-radius: 0.5rem">
						@error('ngaysinh')
					    	<span class='invalid-feedback'>{{ $message }}</span>
				    	@enderror
					</div>
					<div class="col-md-5">
						<label for="exampleInputEmail1" class="register__label">Giới tính</label>
						<select class="custom-select mr-sm-2 @error('gioitinh') is-invalid @enderror" style="width: 140px; border-radius: 0.5rem" name="gioitinh">
							<option value="">-Giới tính-</option>
							<option value="nam">Nam</option>
							<option value="nu">Nữ</option>
						</select>
						@error('gioitinh')
					    	<span class='invalid-feedback'>{{ $message }}</span>
				    	@enderror
					</div>	
				</div>
				<div style="margin: auto; width: fit-content; margin-top: 20px;">
					<button class="btn btn-primary" type="submit" name="submit">Đăng ký</button>
					<button class="btn btn-danger" type="reset" style="margin-left: 60px;">Hủy</button>
				</div>
				</div>
			</form>
		</div>
	</div>
</div>
 @endsection