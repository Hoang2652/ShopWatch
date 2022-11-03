@extends('masterlayout')
@section('profile')

@foreach ( $viewProfile as $row => $view)

<div id='khungcangiua'>
    <div id="thongtincanhan">
        <h6 style="text-align: center; font-weight: bold;"><i class="fas fa-user"></i> Thông tin cá nhân</h6>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Họ tên: {{ $view->tennguoidung }}</li>
            <li class="list-group-item">Tên đăng nhập: {{ $view->tendangnhap }}</li>
            <li class="list-group-item">Email: {{ $view->email }}</li>
            <li class="list-group-item">Địa chỉ: {{ $view->diachi }}</li>
            <li class="list-group-item">Điện thoại: {{ $view->dienthoai }}</li>
            <li class="list-group-item">Ngày sinh: {{ date_format(date_create($view->ngaysinh), 'd-m-Y') }}</li>
            <li class="list-group-item">Giới tính: 
                @if( $view->gioitinh == 'nam')
                    nam
                @else   
                    nữ
                @endif
            </li>
        </ul>
    </div>
    <div id="quanlythongtincanhan">
        <a href="thongtincanhan/doimatkhau">
            <div class="card-body vienthongtin">
                <h5 class="card-title"><i class="fas fa-key"></i> Sửa đổi mật khẩu</h5>
                <p class="card-text textchuthich">Thay đổi mật khẩu nâng cao bảo mật cho tài khoản.</p>
            </div>
        </a>
        <a href="thongtincanhan/lichsumuahang">
            <div class="card-body vienthongtin">
                <h5 class="card-title"><i class="fas fa-history"></i> Lịch sử mua hàng</h5>
                <p class="card-text textchuthich">Bạn có thể xem lại tất cả những gì bạn đã từng mua.</p>
            </div>
        </a>
        <a href="thongtincanhan/thaydoithongtincanhan">
            <div class="card-body vienthongtin">
                <h5 class="card-title"><i class="fas fa-wrench"></i> Thay đổi thông tin cá nhân</h5>
                <p class="card-text textchuthich">Cập nhật thông tin bản thân nếu cần thiết, mà chả thèm đâu lmao.</p>
            </div>
        </a>
    </div>
</div>
@endforeach

@endsection