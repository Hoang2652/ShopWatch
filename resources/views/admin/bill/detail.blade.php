@extends('admin_masterlayout')
@section('billDetail')
<link rel="stylesheet" href="{{ asset('public/backend/css/hienthi_sp.css') }}" />
<div class="bill-detail-layout">
	<h3 class="content-tieude">CHI TIẾT HÓA ĐƠN</h3>
    <div class="bill-detail-container">
        <ul class="bill-info list-group">
            <li class="list-group-item" style="text-align: center;"><b>Thông tin người đặt</b></li>
            <li class="list-group-item">Mã hóa đơn: {{ $BillInfo->idhoadon }}</li>
            <li class="list-group-item">Người đặt: {{ $BillInfo->hoten }}</li>
            <li class="list-group-item">Ngày xuất đơn: {{ date_format(date_create($BillInfo->created_at),"d-m-Y") }}</li>
            <li class="list-group-item">Địa chỉ giao: {{ $BillInfo->diachi }}</li>
            <li class="list-group-item">Số điện thoại: {{ $BillInfo->dienthoai }}</li>
            <li class="list-group-item">Email: {{ $BillInfo->email }}</li>
            <li class="list-group-item">Trạng thái: {{ $BillInfo->trangthai }}</li>
        </ul>
        <table class="bill-detail table border">
            <thead>
                <tr class='tieude_hienthi_sp'>
                    <th>Id sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Giảm giá</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                @php 
                    $totalPrice = 0; 
                    $totalBill = 0;
                @endphp
                @foreach ($BillDetail as $row)
                    <tr class='noidung_hienthi_sp'>
                        <td class="masp_hienthi_sp">{{ $row->idsanpham }}</td>
                        <td class="stt_hienthi_sp">{{ $row->tensanpham }}</td>
                        <td class="sl_hienthi_sp">{{ $row->soluong }}</td>
                        <td class="sl_hienthi_sp">{{ number_format($row->gia,0,",",".") }}</td>
                        <td class="sl_hienthi_sp">
                            @if($row->giamgia != null)
                                {{ $row->giamgia }} %
                            @endif
                        </td>
                        <td class="sl_hienthi_sp">{{ number_format($totalPrice = $row->gia * $row->soluong *(100 - $row->giamgia)/100,0,",",".") }}</td> 
                        @php $totalBill += $totalPrice; @endphp
                    </tr>
                @if($row->quatang != null)
                    <tr class='quatangcart'>
                        <td colspan='6'>Quà tặng: {{ $row->tenquatang }}</td>
                    </tr>
                @endif
                @endforeach
            </tbody>
        </table>
        <div class="bill-detail-summary"><b>Tổng:<font color="red">{{ number_format($totalBill,0,",",".")." VNĐ" }}</font></b></div>
        <form method="POST" action='{{URL::to('admin/bill/change-status/execute')}}' class="bill-actions">
            {{ csrf_field() }}
            <input name="id" value="{{ $BillInfo->idhoadon }}" hidden/>
            <button type="submit" name="status" class="btn btn-danger" value="Đã hủy" target="_blank">Hủy đơn</button>
            <button type="submit" name="status" class="btn btn-success" value="Hoàn tất" target="_blank">Hoàn tất</button>
            <a class="btn btn-primary" href="{{URL::to('admin/bill/print/id='.$BillInfo->idhoadon.'/execute')}}" target="_blank">In hoá đơn</a>
        </form>
    </div>
</div>
@endsection