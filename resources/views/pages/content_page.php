<div id="content">
    <div id="lofslidecontent45" class="lof-slidecontent"
        style="width: 1000px; height: 350px; margin: 12px auto; border: solid 4px grey;">
        <div class="preload">
            <div></div>
        </div>
        <div id="lof-main-outer">
            <ul class="lof-main-wapper">
                <li><img src="{{asset('public/frontend/images/slide/slide1.png')}}" width="1000" height="350"></li>
                <li><img src="{{asset('public/frontend/images/slide/slide.png')}}" width="1000" height="350"></li>
                <li><img src="{{asset('public/frontend/images/slide/slide2.png')}}" width="1000" height="350"></li>
                <li><img src="{{asset('public/frontend/images/slide/slide3.png')}}" width="1000" height="350"></li>
                <li><img src="{{asset('public/frontend/images/slide/slide4.png')}}" width="1000" height="350"></li>
            </ul>
        </div>
        <div class="lof-navigator-wapper">

            <div onClick="return false" href="" class="lof-next">Next</div>
            <div class="lof-navigator-outer">
                <ul class="lof-navigator">
                    <li><img src="{{asset('public/frontend/images/slide/slide1.png')}}" width="70" height="25" /></li>
                    <li><img src="{{asset('public/frontend/images/slide/slide.png')}}" width="70" height="25" /></li>
                    <li><img src="{{asset('public/frontend/images/slide/slide2.png')}}" width="70" height="25" /></li>
                    <li><img src="{{asset('public/frontend/images/slide/slide3.png')}}" width="70" height="25" /></li>
                    <li><img src="{{asset('public/frontend/images/slide/slide4.png')}}" width="70" height="25" /></li>
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
            <input class="search__sanpham" type="text" name="timkiem" onkeyup="livesreach(this.value)"
                placeholder="Nhập id hoặc tên sản phẩm" />
            <div id="livesreach"></div>
            <button type="submit" name="btntk" value="Tìm kiếm" class="search__sanpham-icon" width="50px" height="50px">
                <i class='bx bx-search'></i>
            </button>
        </form>
    </div>
</div>
<div class="product-wrapper">
    <div class="product-filter">
    </div>
    <div class="product-info">
        <div class="danhsachsanpham">
            <div class='tabs'>
                <div></div>
            </div>
            <div class="danhsachsanphamcon">
                <div class="phantrang">
                </div>
            </div>
        </div>
    </div>
</div>