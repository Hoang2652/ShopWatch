@extends('pages.product.product')
@section('watch')

@foreach($viewProduct as $row => $view)	
<div class="danhsachsanpham">
    <div class='tabs'>
        <div>Phân loại: {{$view->tendanhmuc}}</div> 
    </div>	 
   
    <div id="xemthem" style="height: 15px;">
        <p>
            <a href="index.php?iddanhmuc={{$view->iddanhmuc}}">
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
                $star = "";
                $sodanhgia = 0;
                $tongdanhgia = 0;
            @endphp
            @foreach ($danhgia as $row => $dg)
                @if($dg->idsanpham === $pch->idsanpham)
                    @php
                    $sodanhgia++;
                    $tongdanhgia += $dg->sodiem;
                    @endphp
                @endif
            @endforeach
            @if($sodanhgia > 0)
                @php
                $avgdanhgia = $tongdanhgia / $sodanhgia;
                $avgdanhgia = round($avgdanhgia,1);
                @endphp
                @for($i = 1; $i < 6; $i++)
                    @if($i <= $avgdanhgia)
                        @php
                            $star = $star."<i class='fa-solid fa-star' style='color:hsl(47, 98%, 67%)'></i>";
                        @endphp
                    @else
                        @php
                            $star = $star."<i class='fa-solid fa-star' style='color: hsl(47, 2%, 71%);'></i>";
                        @endphp
                    @endif
                @endfor
            @else  
                @php 
                    $star = "&nbsp;";
                @endphp
            @endif
            {{-- khuyến mãi --}}
            @php
            if($pch->soluongkhuyenmai > 0 && $pch->giamgia != null){
                $khuyenmai = "-".$pch->giamgia."%";
            } else if($pch->soluongkhuyenmai > 0  && $pch->quatang != null){
                $khuyenmai = '<i class="fa-solid fa-gift" style="line-height: 36px;font-size: 20px;"></i>';
            }
            @endphp
            <div class="sanpham card">
                @if(isset($khuyenmai))
                    <div class="card-tag">{{ $khuyenmai }}</div>
                @endif
                <a href="/phonghap/sanpham/idsanpham={{ $pch->idsanpham }}">
                    <img class="card-img-top" src="{{asset('public/uploads/products/'.$pch->hinhanh)}}">				
                    <p>{{ $pch->tensanpham }}</p>
                    @php
                        echo "<div class='avg__sp-star'>".$star."</div>";
                    @endphp
                    @if($pch->giamgia != null)
                        <h4 style="text-decoration: line-through; color: grey">{{ number_format($pch->gia,0,",",".") }} VNĐ</h4> 
                        <h4>
                            <i class="fa-solid fa-hand-point-right"></i>
                            {{ number_format($pch->gia*(1-$pch->giamgia/100),0,",",".") }} VNĐ
                        </h4> 
                    @else
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