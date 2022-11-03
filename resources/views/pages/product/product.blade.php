@extends('masterlayout')
@section('product')
<div id="content">
    <div id="lofslidecontent45" class="lof-slidecontent" style="width: 1000px; height: 350px; margin: 12px auto; border: solid 4px grey;">
        <div class="preload"><div></div></div>
            <div id="lof-main-outer">
                <ul class="lof-main-wapper">
                    <li><img src="{{asset('public/uploads/slide/slide1.png')}}" width="1000" height="350"></li>
                    <li><img src="{{asset('public/uploads/slide/slide.png')}}" width="1000" height="350"></li>
                    <li><img src="{{asset('public/uploads/slide/slide2.png')}}" width="1000" height="350"></li>
                    <li><img src="{{asset('public/uploads/slide/slide3.png')}}" width="1000" height="350"></li>
                    <li><img src="{{asset('public/uploads/slide/slide4.png')}}" width="1000" height="350"></li>
                </ul>
            </div>
            <div class="lof-navigator-wapper">

            <div onClick="return false" href="" class="lof-next">Next</div>
                <div class="lof-navigator-outer">
                    <ul class="lof-navigator">
                        <li><img src="{{asset('public/uploads/slide/slide1.png')}}" width="70" height="25" /></li>       		
                        <li><img src="{{asset('public/uploads/slide/slide.png')}}" width="70" height="25" /></li>       		
                        <li><img src="{{asset('public/uploads/slide/slide2.png')}}" width="70" height="25" /></li>       		
                        <li><img src="{{asset('public/uploads/slide/slide3.png')}}" width="70" height="25" /></li>       		
                        <li><img src="{{asset('public/uploads/slide/slide4.png')}}" width="70" height="25" /></li>       		
                    </ul>
                </div>
            <div onClick="return false" href="" class="lof-previous">Previous</div>
        </div> 
    </div>
</div>
<div class="select__wrap">
    <div id="select">
        <form action="index.php?content=timkiem" method="GET">
            <input type="hidden" name="content" value="timkiem">
            <input class="search__sanpham" type="text" name="timkiem" onkeyup="livesreach(this.value)" placeholder="Nhập id hoặc tên sản phẩm"/>
            <div id="livesreach"></div>
            <button type="submit" name="btntk" value="Tìm kiếm" class="search__sanpham-icon" width="50px" height="50px">
                <i class='bx bx-search'></i>
            </button>
        </form>
    </div>
</div>
<div class="product-wrapper">
    <div class="product-filter">
        <div id="locsanpham">
            <div class="center">
            <h4><i class="far fa-copyright"></i> THƯƠNG HIỆU</h4>
                @foreach($filterBrand as $row => $fbr)
                <ul>
                    <li>
                        <a href="index.php?iddanhmuc={{$fbr->iddanhmuc}}">
                            <i class="far fa-hand-point-right"></i> 
                            {{$fbr->tendanhmuc}}
                        </a>
                    </li>
                </ul>
                @endforeach
            </div><!-- End .center -->
        </div>	<!-- End .menu-left -->
        <div id="locsanpham">
            <div class="center">
                <h4><i class="fas fa-gem"></i> PHỤ KIỆN</h4>
                @foreach($filterAccessory as $row => $fac)
                <ul>
                    <li>
                        <a href="index.php?iddanhmuc={{$fbr->iddanhmuc}}">
                            <i class="far fa-hand-point-right"></i> 
                            {{$fac->tendanhmuc}}
                        </a>
                    </li>
                </ul>
                @endforeach
            </div><!-- End .center -->
        </div><!-- End .phukien -->	
        <div id="locsanpham">
            <div class="center">
                <h4><i class="fas fa-funnel-dollar"></i> GÍA THÀNH</h4>
                <form style="margin: 5px auto;width: 250px;" action="index.php?content=timkiem" method="GET">
                <input type="hidden" name="content" value="timkiem">
                    <div class="form__row">
                        <div class="input__price">
                            <input class="form-control" type="text" name="minprice" placeholder="Từ giá: "/>
                        </div>
                        <div class="input__price ip-bot">
                            <input class="form-control" type="text" name="maxprice" placeholder="Đến giá: "/>
                        </div>
                    </div>
                    <div class="gia-submit">
                        <input type="submit" name="btntk" value="Lọc" class="btn btn-primary"/>
                    </div>
                </form>
            </div><!-- End .center -->
        </div><!-- End .phukien -->	
    </div>
    <div class="product-info">
        {{-- yield show where the page define in bracket will take place --}}
        @yield('watch')
        @yield('accessory')
    </div>
</div>
@endsection