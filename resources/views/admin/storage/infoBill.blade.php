@extends('admin_masterlayout')
@section('infoBill')
<link rel="stylesheet" href="{{ asset('public/backend/css/hienthi_sp.css') }}" />

<div class="content-table">
	<h3 class="content-tieude">CHI TIẾT HÓA ĐƠN NHẬP XUẤT KHO</h3>
    <div colspan=3 align="left" style=" margin-left: 2rem; padding:0px 20px 10px 0px; font-size:20px;">Mã hóa đơn: <b><font color="red">{{ $id }}</font></b></div>
    <table>
        <thead>
            <tr class='tieude_hienthi_sp'>
                <th>Id sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Đon giá</th>
                <th>Số lượng</th>
                <th>Đơn vị</th>
                <th>Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            @php
                $tong = 0;
            @endphp
            @foreach ( $info as $info)
                <tr class='noidung_hienthi_sp'>
                    <td class="masp_hienthi_sp">{{ $info->idsanpham }}</td>
                    <td class="stt_hienthi_sp">{{ $info->tensanpham }}</td>
                    <td class="sl_hienthi_sp">{{ number_format($info->dongia,0,",",".")}}</td>
                    <td class="sl_hienthi_sp">{{ $info->soluong }}</td>
                    <td class="sl_hienthi_sp">{{ $info->donvi }}</td>
                    @php
                        $thanhtien = $info->dongia * $info->soluong; 
                        $tong += $thanhtien;
                    @endphp
                    <td class="sl_hienthi_sp">{{ number_format($thanhtien,0,",",".")}}</td>    
                </tr>
            @endforeach
            <tr>
                <td colspan=6 align="right" style=" border-bottom: none; padding:20px 20px 10px 0px; font-size:20px;">
                    Tổng: <b><font color="red">{{ number_format($tong,0,",",".") }} VNĐ</font></b>
                </td>
            </tr>
        </tbody>
    </table>
    <div id="inhoadon">
        <p style="float:right; margin: 1rem 2rem ; padding-right:30px;">
            <a class="btn btn-primary" href="inhoadonnhapxuat.php?idhoadonnhapxuatkho=" target="_blank">
                In hoá đơn
            </a>
            </p>
    </div>
</div>
@endsection