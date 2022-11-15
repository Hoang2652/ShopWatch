@extends('pages.product.product')
@section('searchproduct')

	
<div class="danhsachsanpham">
        <div class="tabs">
            <div> kết quả </div>
        </div>
    @foreach($newsByPage as $row => $data)
        @php
            $star = "";
            $sodanhgia = 0;
            $tongdanhgia = 0;
        @endphp
        @foreach ($danhgia as $row => $dg)
            @if($dg->idsanpham === $data->idsanpham)
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
        if($data->soluongkhuyenmai > 0 && $data->giamgia != null){
            $khuyenmai = "-".$data->giamgia."%";
        } else if($data->soluongkhuyenmai > 0  && $data->quatang != null){
            $khuyenmai = '<i class="fa-solid fa-gift" style="line-height: 36px;font-size: 20px;"></i>';
        }
        @endphp
        <div class="sanpham card">
            @if(isset($khuyenmai))
                <div class="card-tag">{{ $khuyenmai }}</div>
                @php
                    $khuyenmai = null;
                @endphp
            @endif
            <a href="/phonghap/sanpham/idsanpham={{ $data->idsanpham }}">
                <img class="card-img-top" src="{{asset('public/uploads/products/'.$data->hinhanh)}}">				
                <p>{{ $data->tensanpham }}</p>
                @php
                    echo "<div class='avg__sp-star'>".$star."</div>";
                @endphp
                @if($data->giamgia != null && $data->soluongkhuyenmai > 0)
                    <h4 style="text-decoration: line-through; color: grey">{{ number_format($data->gia,0,",",".") }} VNĐ</h4> 
                    <h4>
                        <i class="fa-solid fa-hand-point-right"></i>
                        {{ number_format($data->gia*(1-$data->giamgia/100),0,",",".") }} VNĐ
                    </h4> 
                @else
                    <h4>{{ number_format($data->gia,0,",",".") }} VNĐ</h4> 
                @endif
            </a>
        </div><!-- End .sanpham-->
    @endforeach
    <div id="phantrang_sp">
        {{  $newsByPage -> appends(request()->all())->links() }}
    </div>
</div><!-- end san pham-->

@endsection