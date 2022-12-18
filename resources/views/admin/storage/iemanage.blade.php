@extends('admin_masterlayout')
@section('iemanage')

<link rel="stylesheet" href="{{ asset('public/backend/css/hienthi_sp.css') }}" />
<div class="quanlykhohang">
	<h3>QUẢN LÝ KHO HÀNG (QUẢN LÝ NHẬP XUẤT)</h3>
    <form action="admin.php?admin=xulynhapxuatkhohang" method="post" style="width:100%;">
        <div class="live-search form-row">
            <div class="col-md-3 mb-3 sreachsanpham">
                <label><i class="fas fa-search"></i> Tìm kiếm hóa đơn...</label>
                <input type="text" class="form-control" name="timkiem" placeholder="Nhập id hóa đơn" onkeyup="timkiemtructiep(this.value,'hoadonnhapxuat')">
            </div>
            <div class="form-row col-md-2 mb-3 mr-1 ml-1">
                <div>
                    <a href="{{ URL::to('/admin/import-Bill/add') }}" class="btn btn-primary mg-3">Thêm hóa đơn nhập kho</a>
                </div>
            </div>
            <div class="form-row col-md-2 mb-3 mr-1">
                <div>
                    <a href='{{ URL::to('/admin/export-Bill/add') }}' class="btn btn-primary mg-3">Thêm hóa đơn xuất kho</a>
                </div>
            </div>
            <div class="col-md-3 mb-3 form-row">
                <label>Cập nhật trạng thái:</label>
                <div style="border: none;width: 280px;">
                    <button class="btn btn-primary" type="submit" name="dagiaohang">Đã giao hàng</button>
                    <button class="btn btn-danger" type="submit" name="dabihuy">Hủy đơn hàng</button>
                </div>
             </div>
        </div>
        <div class='content-table scb'>
            <table>
                <thead>
                    <tr class='tieude_hienthi_sp'>
                        <th width="30"><input type="checkbox" name="check"  class="checkbox" onclick="checkall('item', this)"></th>
                        <th>ID hóa đơn</th>
                        <th style="width: 130px;">Đối tác</th>
                        <th style="width: 100px;">Loại hóa đơn</th>
                        <th style="width: 350px;">Ngày nhập/xuất</th>
                        <th style="width: 90px;">Trạng thái</th>
                        <th colspan=2 style="width: 90px;">Thao tác</th>
                    </tr>
                </thead>
                <tbody id="row-sanpham">
                    @foreach( $bill as $row)
                        <tr class='noidung_hienthi_sp'>
                            <td class="masp_hienthi_sp"><input type="checkbox" name="idhoadonhapxuat[]" class="item" class="checkbox" value="{{ $row->idhoadonnhapxuatkho }}"></td>
                            <td class="masp_hienthi_sp">{{ $row->idhoadonnhapxuatkho }}</td>
                            <td class="stt_hienthi_sp">{{ $row->tendoitac }}</td>
                            <td class="sl_hienthi_sp">{{ $row->loaihoadon }}</td>
                            <td class="sl_hienthi_sp">{{ date_format(date_create( $row->updated_at), "d-m-Y") }}</td>
                            <td class="sl_hienthi_sp">{{ $row->trangthai }}</td>
                            <td class="active_hienthi_sp" style="width:70px;">
                                <a href="{{ URL::to('/admin/info-bill='.$row->idhoadonnhapxuatkho) }}"><i class="fas fa-info-circle" style='transform: scale(1.5); color: #007bff;'></i></a>
                                <div onclick="checkdelhoadonnhapxuatkho()"><i class="fas fa-trash-alt" style="transform: scale(1.5); color: red;" ></i></div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </form>
</div>
@endsection