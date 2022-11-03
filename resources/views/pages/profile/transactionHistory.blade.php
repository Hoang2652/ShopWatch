@extends('masterlayout')
@section('transactionHistory')

@php
    $idnguoidung = session::get('idnguoidung');
@endphp
<div id="lichsumuahang">
    @if(!isset($idnguoidung))
            <div id='thongbaokhongco'>Bạn cần phải đăng nhập để xem lịch sử mua hàng</div>";
    @else
        <div class="tabs">
                <div style="text-align: center;">Lịch sử mua hàng </div>
        </div>
        <div id="sub-lichsumuahang">  
            @foreach ($viewBill as $row => $viewBill)
                @php
                    $tongtien = 0;
                @endphp
                <div class='hoadon'>
                    <div class='tieudehoadon'>
                        <div style='float:left;margin-left: 20px;'>Mã hóa đơn: {{ $viewBill->idhoadon }}</div>
                        <div style='float:right;margin-right: 20px;'>Ngày đặt hàng: {{ date_format(date_create($viewBill->updated_at), 'd-m-Y') }}</div>
                    </div>
                    <div class='hoadon-content' style='display:block'>
                        @if( $count == 0)
                            <div style='margin:auto;width: fit-content;padding: 10px;color:red;'>Không có dữ liệu về hóa đơn này</div>";
                        @else
                        <table class='table'>
                            <thead class='tieude-hienthi-hoadon'>
                            <tr>
                                <th scope='col'>Tên sản phẩm</th>
                                <th scope='col' style='width: 82px;'>Số lượng</th>
                                <th scope='col'>Giá</th>
                                <th scope='col'>Giảm giá</th>
                                <th scope='col'>Thành tiền</th>
                            </tr>
                            </thead>
                            @foreach ($billDetail as $row => $billdetail)
                                @if($viewBill->idhoadon == $billdetail->idhoadon)
                                    @php
                                        $gia= $billdetail->gia;
                                        $soluong = $billdetail->soluong;
                                        $giamgia = $billdetail->giamgia;
                                        $thanhtien = $gia * $soluong - $gia * $soluong * $giamgia / 100;
                                        $tongtien += $thanhtien;
                                    @endphp
                                    <tbody>
                                        <tr class='noidung_hienthi_sp' style='color: #666666; font-size: 14px;'>
                                            <td class='stt_hienthi_sp'> {{ $billdetail->tensanpham }} </td>
                                            <td class='sl_hienthi_sp'> {{ $billdetail->soluong }} </td>
                                            <td class='sl_hienthi_sp'> {{ number_format($billdetail->gia,0,",",".") }} </td>
                                            <td class='sl_hienthi_sp'> {{ number_format($billdetail->giamgia) }}%</td>
                                            <td class='sl_hienthi_sp'> {{ number_format($thanhtien,0,",",".") }} </td>
                                        </tr>
                                        @if($billdetail->quatang != null)
                                            @foreach ($nameGift as $row => $name)
                                                @if ($billdetail->quatang == $name->idsanpham)
                                                    @php
                                                        $tenquatang = 'Tặng kèm: '.$name->tensanpham;
                                                    @endphp
                                                @endif
                                            @endforeach
                                        @else
                                            @php
                                                $tenquatang = null;
                                            @endphp
                                        @endif
                                        @if(isset($tenquatang))
                                            <tr class='quatangcart'>
                                                <td colspan='5'> {{ $tenquatang  }}</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                @endif  
                            @endforeach
                            <tr>
                                <td colspan=5 style='padding:10px; font-size:16px;' class='tongtienhoadon'>
                                    <div style='float:left;font-size: 14px;font-weight: bold;padding: 5px;'>Trạng thái đơn hàng:
                                        @if($viewBill->trangthai == 1)
                                            Chưa xử lý 
                                        @elseif($viewBill->trangthai == 2) 
                                            <font color='blue'>Đã giao hàng</font>
                                        @else 
                                            <font color='red'>Đã hủy đơn hàng</font>
                                        @endif
                                    </div> 
                                    <div style='float:right;'>Tổng tiền: <b><font color='red'>{{ number_format($tongtien,0,",",".") }}</font></b> VND</div>
                                </td>
                            </tr>
                        </table>
                        @endif
                    </div>
                </div>
            @endforeach
        </div> <!--- end lichsumuahang --->
   @endif
</div><!--- ho tro --->
@endsection