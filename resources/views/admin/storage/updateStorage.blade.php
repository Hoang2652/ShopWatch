@extends('admin_masterlayout')
@section('updateStorage')

<link rel="stylesheet" href="{{ asset('public/backend/css/them_sanpham.css') }}" />
@foreach ( $kho as $row)
    <form class="formsuakhohang" action="{{ URL::to('/admin/update-storage='.$row->idkhohang.'/execute') }}" method="post" name="frm" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="add__sp">
            <div class="tieude_themsp">
                <div colspan=2>Cập nhật thông tin {{ $row->tenkhohang }}</div>
            </div>
            <div class="form-row">
                        <label for="tenkhohang">Tên kho hàng</label>
                        <input class="form-control" type="text" name="tenkhohang" size="40"  value="{{ $row->tenkhohang }}">
                        <div class='canhbao' id='canhbaotenkhohang'></div>
                </div>
                <div class="form-row">
                        <label for="diachikhohang">Địa chỉ kho hàng</label>
                        <input class="form-control" type="text" name="diachikhohang" size="40"  value="{{ $row->diachikhohang }}">
                        <div class='canhbao' id='canhbaodiachikhohang'></div>
                </div>
                <div class="form-row">
                        <label for="ghichu">Ghi chú (có thể bỏ trống)</label>
                        <input class="form-control" type="text" name="ghichu" size="40"  value="{{ $row->ghichu }}">
                        <div class='canhbao' id='canhbaoghichu'></div>
                </div>
            <div class="form-group row" style="margin-top: 2rem;"> 
                <input class="btn btn-primary" style="margin:auto;" type="submit" name="submit-chinhsuakhohang" value="Cập nhật kho hàng" />
                <input class="btn btn-danger" style="margin:auto; margin-right: 10rem" type="reset" name="" value="Xóa form nhập lại" />
            </div>
        </div>
    </form>  
@endforeach
@endsection