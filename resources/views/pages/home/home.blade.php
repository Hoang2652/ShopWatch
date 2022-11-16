@extends('masterlayout')
@section('home')
    <main class="main" id="abc">
        <!--==================== HOME ====================-->
            <section class="home" id="home">
                <div class="home__container container grid">
                    @foreach ($headPageProduct as $row => $product)
                    <div class="home__img-bg">
                        <img src="{{asset('public/uploads/products/'.$product->hinhanh)}}" alt="" class="home__img">
                    </div>
    
                    <div class="home__data">
                        <h1 class="home__title"><br>{{$product->tensanpham}}</h1>
                        <p class="home__description">
                            {{$product->mota}}
                        </p>
                        <span class="home__price">{{ number_format($product->gia) }} VNĐ</span>

                        <div class="home__btns">
                            <a href='/phonghap/sanpham/idsanpham={{ $product->idsanpham }}' class="button button--gray button--small">
                                Chi tiết
                            </a>
                            <form action="{{ URL::to('/save-cart') }}" class="button" method="post">
                                {{ csrf_field() }} 	
                                <button class="home__button" type="submit" name="chovaogio">Thêm giỏ hàng</button>
                                <input name="productID_hidden" value="{{ $product->idsanpham }}" type="hidden">
							    <input name="qty" value="1" min="1" type="hidden">
                            </form>
                        </div>
                    @endforeach
                    </div>
                </div>
            </section>
            <!--==================== FEATURED ====================-->
            <section class="featured section container" id="featured">
                <h2 class="section__title" style="color: hsl(206, 93%, 55%);">
                    MẶT HÀNG BÁN CHẠY
                </h2>
                <div class="featured__container grid">
                    @foreach ($bestSaleProuctList as $row => $product)
                    <article class="featured__card">
                        <a href="/phonghap/sanpham/idsanpham={{ $product->idsanpham }}">
                            <span class="featured__tag">Sale</span>
                
                            <img src="{{asset('public/uploads/products/'.$product->hinhanh)}}" alt="" class="featured__img">
                
                            <div class="featured__data">
                                <h3 class="featured__title">{{$product->tensanpham}}</h3>
                                <span class="featured__price">{{ number_format($product->gia) }} VNĐ</span>
                            </div>
                
                            <button class="button featured__button">Xem chi tiết</button>
                        </a>
                    </article>
                    @endforeach
                </div>
            </section>     
            <!--==================== STORY ====================-->
            <section class="story section container">
                <div class="story__container grid">
                    @foreach ($middlePageProduct as $row => $product)
                    <div class="story__data">
                        <h2 class="section__title story__section-title">
                            Sản phẩm đặc biệt
                        </h2>
    
                        <h1 class="story__title">
                            {{$product->tensanpham}}
                        </h1>
    
                        <p class="story__description">
                            {{$product->mota}}
                        </p>
    
                        <a href="/phonghap/sanpham/idsanpham={{ $product->idsanpham }}" class="button button--small">Xem chi tiết</a>
                    </div>

                    <div class="story__images">
                        <img src="{{asset('public/uploads/products/'.$product->hinhanh)}}" alt="" class="story__img">
                        <div class="story__square"></div>
                    </div>
                    @endforeach
                </div>
            </section>
            
            <!--==================== PRODUCTS ====================-->
            <section class="products section container" id="products">
                <h2 class="section__title" style="color: hsl(206, 93%, 55%);">
                    SẢN PHẨM MỚI NHẤT
                </h2>
                <div class="products__container grid">
                    @foreach ($NewestProductList as $row => $product)
                    <article class="products__card">
                        <a href="/phonghap/sanpham/idsanpham={{ $product->idsanpham }}">
                            <img src="{{asset('public/uploads/products/'.$product->hinhanh)}}" alt="" class="products__img">

                            <h3 class="products__title">{{$product->tensanpham}}</h3>
                            <span class="products__price">{{ number_format($product->gia) }} VNĐ</span>
                        </a>
                    </article>
                    @endforeach
                </div>
            </section>
            
            <!--==================== TESTIMONIAL ====================-->
            <section class="testimonial section container">
                <div class="testimonial__container grid">
                    <div class="testimonial-swiper">
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                @foreach ($NewsList as $row => $news)
                                <a href="/phonghap/tintuc/id={{$news->idtintuc}}">
                                    <div class="swiper-slide">
                                        <div class="testimonial__quote">
                                            <i class='bx bxs-quote-alt-left' ></i><h5>   {{$news->tieude}}</h5>
                                        </div>
                                        <p class="testimonial__description"> {{$news->noidungngan}} </p>
                                        <h3 class="testimonial__date">Ngày đăng tin: {{$news->updated_at}}</h3>
            
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="swiper-button-wrapper"> 
                            <div class="swiper-button-prev">
                                <i class='bx bx-left-arrow-alt' ></i>
                            </div>
                            <div class="swiper-button-next">
                                <i class='bx bx-right-arrow-alt' ></i>
                            </div>
                        </div> 
                    </div>
                    <div class="testimonial__images">
                        <div class="testimonial__square"></div>
                        <img src="{{asset('public/uploads/assets/testimonial.png')}}" alt="" class="testimonial__img">
                    </div>
                </div>
            </section>
            
            <!--==================== NEW ====================-->
            <section class="new section container" id="new">
                <h2 class="section__title" style="color: hsl(206, 93%, 55%);">
                    SẢN PHẨM ĐỀ CỬ
                </h2>
                <div class="new__container">
                    <div class="swiper new-swiper">
                        <div class="swiper-wrapper-1">
                            @foreach ($recommendedProductList as $row => $product)
                            <article class="new__card swiper-slide">
                                <a href="/phonghap/sanpham/idsanpham={{ $product->idsanpham }}">
                                    <span class="new__tag">Recommended</span>
                        
                                    <img src="{{asset('public/uploads/products/'.$product->hinhanh)}}" alt="" class="new__img">
                        
                                    <div class="new__data">
                                        <h3 class="new__title">{{$product->tensanpham}}</h3>
                                        <span class="new__price">{{ number_format($product->gia) }} VNĐ</span>
                                    </div>
                        
                                    <button class="button new__button">Xem chi tiết</button>
                                </a>
                            </article>
                            @endforeach
                        </div>
                        <div class="new-button-wrapper"> 
                            <div class="new-button-prev">
                                <i class='bx bx-chevron-left'></i>
                            </div>
                            <div class="new-button-next">
                                <i class='bx bx-chevron-right' ></i>
                            </div>
                        </div> 
                    </div>
                </div>
            </section>
        
            <!--==================== NEWSLETTER ====================-->
            <section class="newsletter section container">
                <div class="newsletter__bg grid">
                    <div>
                        <h2 class="newsletter__title">Liên hệ với chúng tôi</h2>
                        <p class="newsletter__description">
                            Đừng bỏ lỡ các đợt giảm giá của bạn. Đăng kí bản tin qua 
                            email của chúng tôi để nhận được thêm nhiều ưu đãi, chiết khấu 
                            giảm giá, quà tặng tốt nhất và nhiều hơn nữa
                        </p>
                    </div>

                    <form action="" class="newsletter__subscribe">
                        <input type="email" placeholder="Nhập email của bạn" class="newsletter__input">
                        <button class="button">
                            Đặt mua
                        </button>
                    </form>
                </div>
            </section>  
        </main>
@endsection