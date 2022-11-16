@extends('masterlayout')
@section('login')
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<div id="dangnhap-in">
	<div class="login">
		<div class="login__content">
			<div class="login__img">
				<img src="{{asset('public/frontend/images/img-login.png')}}" alt="">
			</div>
			<div class="login__form">
				<form action="{{ URL::to('/login-execute') }}" class="form__login" id="login-in" method="post" name="frm">
					{{ csrf_field() }}
					<h1 class="login__title">Đăng nhập</h1>
					<div class="login__box">
						<i class='bx bx-user login__icon'></i>
						<input class="login__input" type="text" name="tendangnhap" maxlength="20" placeholder="Tên đăng nhập" required>
					</div>
					<div class="warning" id="warning-username"></div>
					<div class="login__box">
						<i class='bx bx-lock login__icon'></i>
						<input class="login__input" type="password" name="matkhau" size="20" placeholder="Mật Khẩu" required>
					</div>
					<div class="warning" id="warning-password"></div>
					<p class="login__save"><input type="checkbox" name="saveinfo" id="checkluudangnhap">  Lưu đăng nhập</p>
					<a><button name="login" class="btn btn-primary">Đăng nhập</button></a>
					<div class="login__dash"></div>
					<p id="dangkycss">Bạn chưa có tài khoản? => <a>Đăng ký</a></p>
                </div>
				</form>
			</div>
		</div>
	</div>
	
	<?php
	if(isset($_COOKIE['tendangnhap']) && isset($_COOKIE['matkhau']))
	{
	echo "<script language='javascript'>document.getElementById('tendangnhap').value='" .$_COOKIE['tendangnhap']. "';</script>";
	echo "<script language='javascript'>document.getElementById('matkhau').value='" .$_COOKIE['matkhau']. "';</script>";
	}
	?>
</div><!-- End .dangnhap-in-->
@endsection
