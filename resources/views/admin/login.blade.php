<link rel="stylesheet" href="{{ asset('public/backend/css/login.css') }}" type="text/css">
<div class="body">
    <div class="tieude1">
        <div class="quantri">
            <h2>Đăng nhập quản trị</h2>
        </div>
    </div>
    <div class="admin_login">
        <form action="{{ URL::to('/admin/login-execute') }}"  class="form__login" id="login-in" method="post" name="frm">
            {{ csrf_field() }}
            <label>Tên tài khoản:</label><input type="text" name="tendangnhap" placeholder=" tendangnhap"><br>
            <label>Mật khẩu:</label><input type="password" name="matkhau" placeholder=" matkhau"><br>
            <button name="login" class="dangnhap">Đăng nhập</button><button class="thoat">Thoát</button>
        </form>
    </div>
</div>
