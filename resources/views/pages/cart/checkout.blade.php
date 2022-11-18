@extends('masterlayout')
@section('checkout')

<div class="thongtinkhachhang-wrap">
    <div class="thongtinkhachhang">
        @foreach ($person_info as $ps)
            <form action="{{ URL::to('/check-out') }}" method="POST" id="a" onsubmit="return kiemtra();" class="form__thanhtoan">
                {{ csrf_field() }}
                <div class="form-group" style="width:100%; ">
                    <h4 style="text-align:center; font-weight: bold;">THÔNG TIN THANH TOÁN</h4>
                </div>
                <div class="form-group">
                    <label for="tennd">Họ và tên</label>
                    <input type="text" class="form-control @error('hoten') is-invalid @enderror" name="hoten" value="{{ $ps->tennguoidung }}" />
                        @error('hoten')
					        <span class='invalid-feedback'>{{ $message }}</span>
				        @enderror
                </div> 
                <div class="form-group">
                    <label for="tennd">Địa chỉ giao hàng</label>
                    <input type="text" class="form-control @error('diachi') is-invalid @enderror" name="diachi" value="{{ $ps->diachi }}" />
                        @error('diachi')
					        <span class='invalid-feedback'>{{ $message }}</span>
				        @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Điện thoại</label>
                    <input type="text" class="form-control  @error('dienthoai') is-invalid @enderror" name="dienthoai" value="{{ $ps->dienthoai }}" />
                        @error('dienthoai')
					        <span class='invalid-feedback'>{{ $message }}</span>
				        @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $ps->email }}" />
                        @error('email')
					        <span class='invalid-feedback'>{{ $message }}</span>
				        @enderror
                </div>
                <div class="form-group pb-4">
                    <label for="exampleInputEmail1">Phương thức</label>
                        <select class="custom-select @error('phuongthuc') is-invalid @enderror" name="phuongthuc" style="height: 35px;">
                            <option value="">Chọn phương thức thanh toán</option>
                            <option value="2">Chuyển khoản</option>
                            <option value="3">Tiền mặt</option>
                        </select>
                        @error('phuongthuc')
					        <span class='invalid-feedback'>{{ $message }}</span>
				        @enderror
                </div>
                <div style="width: fit-content; margin: 0 auto;"><button class="btn btn-primary" type="submit" value="Đặt hàng">Xác nhận đặt hàng</button></div>
            </form>
        @endforeach
        <div class="cart__thanhtoan">
            <h4>WEBSITE BÁN ĐỒNG HỒ TRỰC TUYẾN PHONG HẤP</h4>
            <ul style='text-align: left;'>
                <li>Địa chỉ: Đăng Văn Ngữ - Phú Nhuận - Thành phố Hồ Chí Minh</li>
                <li>Di Động: 0938909944</li>
                <li>Email: phonghap@gmail.com</li>
            </ul>
            <div class='' style="border-bottom: black 1px solid;"></div>
            <table class=''>
                <thead>
                    <tr class="tieudecart">
                    <th scope='col' style="width: 350px;">Tên sản phẩm</th>
                    <th scope='col'>Giá</th>
                    <th scope='col'>Số lượng</th>
                    <th scope='col'>Giảm giá</th>
                    <th scope='col'>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $content = Cart::content();
                    ?>
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
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection