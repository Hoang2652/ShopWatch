@extends('admin_masterlayout')
@section('addLocation')
<link rel="stylesheet" href="{{ asset('public/backend/css/hienthi_sp.css') }}" />

<form action="{{ URL::to('/admin/add-location='.$id.'/execute') }}" method="post" name="frm" onsubmit="return checkvitrikhohang()" style="width: fit-content; margin: auto;">
    {{ csrf_field() }}
    <div class="container__addvitrikhohang">
        <div class="title__hdkh">
            <div>THÊM VỊ TRÍ KHO HÀNG</div>
        </div>
        <div class="form-row mb-3">
                <label for="tenvitrikhohang">Tên vị trí:</label>
                <input class="form-control" type="text" name="tenvitrikhohang" size="40" onclick="document.getElementById('canhbaotenvitrikhohang').innerHTML=''" required>
                <div class='canhbao' id='canhbaotenvitrikhohang'></div>
        </div>
        <div class="form-row mb-3">
        <div class="col-md-6">
            <label for="diachixuatkho">Vị trí cho kho hàng: </label>
                <select class="custom-select mr-sm-2" style="width: 190px;" name="idkhohang" required>
                    <option value="">-Chọn địa chỉ kho hàng-</option>
                    @foreach ( $storage as $row)
                        <option value="">{{ $row->tenkhohang }}</option>
                    @endforeach
                </select>
        </div>
        
    </div>
        <div style="margin: auto; width: fit-content; margin-top: 2rem;">
            <button class="btn btn-primary mb-3" type="submit" name="submit-themvitrikhohang">Xác nhận thêm</button>
        </div>
</form>

<div id="danhsachvitrikhohang">
    <h6 style="text-align: center; font-weight: bold;"><i class="fas fa-user"></i> Danh sách vị trí kho hàng</h6>
    <table>
        <thead>
            <tr class='tieude_hienthi_sp'>
                <th>Vị trí</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($location as $location)
                <tr class='noidung_hienthi_sp'>
                    <td>{{ $location->tenvitrikhohang }}</td>
                    <td>
                        <a href="{{ URL::to('/admin/delete-location='.$location->idvitrikhohang) }}">
                            <i class="fas fa-trash-alt" style="transform: scale(1.5); color: red;" ></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection