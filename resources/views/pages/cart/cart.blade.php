@extends('masterlayout')
@section('cart')

<div class="cart">
    <div class="tabs">
        <div class="cart__title"> Giỏ hàng của bạn</div>
    </div>
    <?php
        $content = Cart::content();
        $number = Cart::content()->count();
    ?>
    @if($number > 0)
        <table class='table table__cart'>
            <thead>
                <tr class="tieudecart">
                    <th scope='col' style="width: 350px;">Tên sản phẩm</th>
                    <th scope='col'>Giá</th>
                    <th scope='col'>Số lượng</th>
                    <th scope='col'>Giảm giá</th>
                    <th scope='col'>Thành tiền</th>
                    <th scope='col'>Tùy chọn</th>
                </tr>
            </thead>
        
            <tbody>
                @foreach ($content as $v_content )
                    <tr class="sanphamcart">
                        <td>
                            <p class="carta">
                                <a href="sanpham/idsanpham={{ $v_content->id }}">{{ $v_content->name }}</a>
                            </p>
                        </td>
                        <td>{{number_format($v_content->price) }}</td>
                        <td>{{ $v_content->qty }}</td>
                        <td>{{ $v_content->options->sale }}%</td>
                        @php
                            Cart::setDiscount($v_content->rowId, $v_content->options->sale);
                        @endphp
                        <td>
                            @php
                                $subtotal = $v_content->price * $v_content->qty;
                                if($v_content->options->sale > 0){
                                    $subtotal = $subtotal - $subtotal * $v_content->options->sale / 100;
                                }
                                echo number_format($subtotal);
                            @endphp    
                        </td>
                        <td>
                            <a class="xoa btn btn-danger" href="{{ URL::to('/delete-to-cart/'.$v_content->rowId) }}">Xóa</a>
                        </td>
                    </tr>
                    @if ($v_content->options->gift > 0)
                        <tr class="quatangcart">
                            <td colspan='6'>
                                Tặng kèm: {{ $v_content->options->gift }}
                            </td>
                        </tr>
                    @endif
                @endforeach
                <tr>
                    <td colspan=5 align="right" style=" border-bottom: none; padding:20px 20px 10px 0px; font-size:17px;">
                        Tổng cộng: <b><font color="red">{{ Cart::subtotal(0,0,'.') }} </font> VNĐ </b>
                    </td>
                    <td>
                    <a href="{{ URL::to('/clear-cart') }}"><button class="btn btn-danger">Xóa toàn bộ</button></a>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="tieptucmuahang">
            <a href="{{ URL::to('/sanpham/dongho') }}">
                <button class="btn btn-primary" style="margin: auto">
                <i class="fas fa-cart-arrow-down"></i> Mua hàng tiếp
                </button>
            </a>
            <a href="{{ URL::to('/thanhtoan') }}">
                <button class="btn btn-success" style="margin: auto; margin-left: 3rem">
                    <i class="fas fa-dollar-sign"></i> Thanh toán
                </button>
            </a>
        </div>
    @else
        <div id='thongbaokhongco'>Chưa có sản phẩm nào được thêm vào giỏ hàng !</div>
    @endif
</div>

@endsection