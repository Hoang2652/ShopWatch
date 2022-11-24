@extends('admin_masterlayout')
@section('addStorage')
<link rel="stylesheet" href="{{ asset('public/backend/css/them_sanpham.css') }}" />

<form action="{{ URL::to('/admin/add-str') }}" method="post" name="frm" style="width: fit-content; margin: auto; margin-top: 3rem;">
    {{ csrf_field() }}
    <div class="dangky">
        <div class="tabs">
            <div style="text-align: center; font-weight: bold;">THÊM KHO HÀNG</div>
        </div>
        <div class="form-row">
                <label for="tenkhohang">Tên kho hàng</label>
                <input class="form-control" type="text" name="tenkhohang" size="40" >
                <div class='canhbao' id='canhbaotenkhohang'></div>
        </div>
        <div class="form-row">
                <label for="diachikhohang">Địa chỉ kho hàng</label>
                <input class="form-control" type="text" name="diachikhohang" size="40" >
                <div class='canhbao' id='canhbaodiachikhohang'></div>
        </div>
        <div class="form-row">
                <label for="ghichu">Ghi chú (có thể bỏ trống)</label>
                <input class="form-control" type="text" name="ghichu" size="40">
                <div class='canhbao' id='canhbaoghichu'></div>
        </div>
        <div style="margin: auto; width: fit-content; margin-top: 2rem;">
            <button class="btn btn-primary" type="submit" name="submit-themkhohang">Xác nhận thêm</button>
        </div>
    </div>
</form>
@endsection