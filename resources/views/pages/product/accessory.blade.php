@extends('pages.product.product')
@section('accessory')

@foreach($viewAccessory as $row => $view)	
<div class="danhsachsanpham">
    <div class='tabs'>
        <div>Phân loại: {{$view->tendanhmuc}}</div> 
    </div>	 
   
    <div id="xemthem" style="height: 15px;">
        <p>
            <a href="iddanhmuc={{$view->iddanhmuc}}">
                Xem thêm >>
            </a> 
        </p>
    </div>
    <div class="danhsachsanphamcon">
        @php
            $count = 0;
        @endphp
        @foreach($id as $row => $pch)
            @if($count > 3)
                @break
            @elseif($pch->iddanhmuc === $view->iddanhmuc)
            @php
                $count++;
            @endphp
            <div class="sanpham card">
                <a href="/phonghap/sanpham/idsanpham={{ $pch->idsanpham }}">
                    <img class="card-img-top" src="{{asset('public/uploads/products/'.$pch->hinhanh)}}">				
                    <p>{{ $pch->tensanpham }}</p>
                    @if($pch->giamgia != null)
                        <h4 style="text-decoration: line-through; color: grey">{{ number_format($pch->gia,0,",",".") }} VNĐ</h4> 
                        <h4>
                            <i class="fa-solid fa-hand-point-right"></i>
                            {{ number_format($pch->gia*(1-$pch->giamgia/100),0,",",".") }} VNĐ
                        </h4> 
                    @else
                        &nbsp;
                        <h4>{{ number_format($pch->gia,0,",",".") }} VNĐ</h4> 
                    @endif
                </a>
            </div><!-- End .sanpham-->
            @endif
        @endforeach  
    </div>
</div><!-- end san pham-->
@endforeach

@endsection