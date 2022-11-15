@extends('pages.product.product')
@section('category')    
<div class="product-info">
    <div class="danhsachsanpham">	
        @foreach ($viewCategory as $row)
        <div class='tabs'>
            <div>{{ $row->tendanhmuc }}</div>
        </div>
        <div class="danhsachsanphamcon">
            <div class="motadanhmuc">
                {{ $row->mota }}
            </div>
            
            @php
                $count = 0;
            @endphp
            @foreach ( $newsByPage as $row => $list)
            {{-- star --}}
            @php
                $count++;
                $star = "";
                $sodanhgia = 0;
                $tongdanhgia = 0;
            @endphp
            @foreach ($danhgia as $row => $dg)
                @if($dg->idsanpham === $list->idsanpham)
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
            if($list->soluongkhuyenmai > 0 && $list->giamgia != null){
                $khuyenmai = "-".$list->giamgia."%";
            } else if($list->soluongkhuyenmai > 0  && $list->quatang != null){
                $khuyenmai = '<i class="fa-solid fa-gift" style="line-height: 36px;font-size: 20px;"></i>';
            }
            @endphp
            <div class="sanpham card">
                @if(isset($khuyenmai))
                    <div class="card-tag">{{ $khuyenmai }}</div>
                @endif
                <a href="/phonghap/sanpham/idsanpham={{ $list->idsanpham }}">
                    <img class="card-img-top" src="{{asset('public/uploads/products/'.$list->hinhanh)}}">				
                    <p>{{ $list->tensanpham }}</p>
                    @if($list->giamgia != null)
                        @php
                            echo "<div class='avg__sp-star'>".$star."</div>";
                        @endphp
                        <h4 style="text-decoration: line-through; color: grey">{{ number_format($list->gia,0,",",".") }} VNĐ</h4> 
                        <h4>
                            <i class="fa-solid fa-hand-point-right"></i>
                            {{ number_format($list->gia*(1-$list->giamgia/100),0,",",".") }} VNĐ
                        </h4> 
                    @else
                        &nbsp;
                        <h4>{{ number_format($list->gia,0,",",".") }} VNĐ</h4> 
                    @endif
                </a>
            </div><!-- End .sanpham-->
            @endforeach
        </div>
        @endforeach
        <div id="phantrang_sp">
            {{  $newsByPage -> appends(request()->all())->links() }}
        </div>
    </div>
</div>
@endsection