@extends('admin_masterlayout')
@section('infoStorage')

<link rel="stylesheet" href="{{ asset('public/backend/css/hienthi_sp.css') }}" />
@foreach ( $kho as $kho)
<div class="quanlysp">
	<h3>QUẢN LÝ KHO HÀNG ({{ $kho->tenkhohang }})</h3>
    <div class="live-search form-row">
		<div class="col-md-3 mb-3 sreachsanpham">
			<label><i class="fas fa-search"></i> Tìm kiếm sản phẩm trong kho...</label>
            <input type="text" class="form-control" name="timkiem" placeholder="Nhập id, tên sản phẩm">
        </div>
        <div class="col-md-5 mb-3 pl-4 form-row thaotac" style="margin-top: 30px;">
            <div >
                <a href="{{ URL::to('/admin/info-storage/add-location='.$kho->idkhohang) }}" class="btn btn-primary">Các vị trí trong kho</a>
            </div>
        </div>
    </div>
    <div class='content-table scb'>
        <table>
            <thead>
                <tr class='tieude_hienthi_sp'>
                    <th style="width: 120px;">Vị trí kho hàng</th>
                    <th style="width: 350px;">Tên sản phẩm</th>
                    <th>Mã sản phẩm</th>
                    <th style="width: 100px;">Số lượng trong kho</th>                    
                    <th style="width: 150px;">Đơn giá</th>
                    <th style="width: 90px;">Trạng thái</th>
                    <th colspan=2 style="width: 90px;">Thao tác</th>
                </tr>
            </thead>
            <tbody id="row-sanpham">
                @foreach ( $info as $row)
                    <tr class='noidung_hienthi_sp'>
                        <td class='masp_hienthi_sp' rowspan=$displayRowSpan>{{ $row->tenvitrikhohang }}</td> 
                        <td class="masp_hienthi_sp">{{ $row->tensanpham }}</td>
                        <td class="masp_hienthi_sp">{{ $row->idsanpham }}</td>
                        <td class="stt_hienthi_sp">{{ $row->soluong }}</td>
                        <td class="sl_hienthi_sp">{{ $row->dongia }}</td>
                        <td class="sl_hienthi_sp">sẵn sàng xuất kho</td>
                        <td class="active_hienthi_sp" style="width:70px;">
                            <a href="admin.php?admin=xulyhangtonkho&submit-formchinhsuasanphamtonkho="><i class="fas fa-info-circle" style='transform: scale(1.5); color: #007bff;'></i></a>                    
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
</div>
@endforeach
@endsection