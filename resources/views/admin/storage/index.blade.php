@extends('admin_masterlayout')
@section('storage')

<link rel="stylesheet" href="{{ asset('public/backend/css/hienthi_sp.css') }}" />
<div class="quanlykhohang">
    <div class="tacvu-qlkh">
	    <h3>QUẢN LÝ KHO HÀNG</h3>
        <div class="col-md-8 form-row">
            <a href='{{ URL::to('/admin/add-storage') }}' class="btn btn-primary add-khohang">Thêm kho hàng</a>
        </div>
    </div>
	<div class='content-table scb'>
        <table>
            <thead>
                <tr class='tieude_hienthi_sp tieude-khohang'>
                    <th width="30"><input type="checkbox" name="check"  class="checkbox" onclick="checkall('item', this)"></th>
                    <th>ID hóa đơn</th>
                    <th style="width: 130px;">Tên kho hàng</th>
                    <th style="width: 200px;">Địa chỉ</th>
					<th style="width: 100px;">Ngày thành lập</th>
                    <th style="width: 150px;">Ghi chú</th>
					<th style="width: 90px;">Thao tác</th>
                </tr>
            </thead>
            <tbody id="row-sanpham">
                @foreach ( $kho as $row)
                	<tr class='noidung_hienthi_sp'>
							<td class="masp_hienthi_sp"><input type="checkbox" name="idkhohang[]" class="item" class="checkbox" value="{{ $row->idkhohang }}"></td>
							<td class="masp_hienthi_sp">{{ $row->idkhohang }}</td>
							<td class="stt_hienthi_sp">{{ $row->tenkhohang }}</td>
							<td class="sl_hienthi_sp">{{ $row->diachikhohang }}</td>
							<td class="sl_hienthi_sp">{{ date_format(date_create($row->created_at), "d-m-Y") }}</td>
							<td class="stt_hienthi_sp">{{ $row->ghichu }}</td>
							<td class="masp_hienthi_sp">
                                <a href="{{ URL::to('/admin/info-storage='.$row->idkhohang) }}"><i class="fa-solid fa-arrow-right-to-bracket" style='transform: scale(1.5); color: grey;'></i></a>
                                <a href="{{ URL::to('/admin/update-storage='.$row->idkhohang) }}"><i class="fas fa-tools" style='transform: scale(1.5); color: #007bff;'></i></a>
                                <a href="{{ URL::to('/admin/delete-storage='.$row->idkhohang) }}" onclick="checkdelkhohang()"><i class="fas fa-trash-alt" style="transform: scale(1.5); color: red;" ></i></a>
                            </td>						
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection