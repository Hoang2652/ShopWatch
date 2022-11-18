@extends('masterlayout')
@section('productDetail')

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="{{asset('public/frontend/js/zoom/cloud-zoom.1.0.2.js')}}"></script>
<link href="{{asset('public/frontend/css/cloud-zoom.css')}}" rel="stylesheet" type="text/css" />

@foreach ( $viewsanpham as $row => $view)
	@php
		if($view->giamgia != null && $view->soluongkhuyenmai > 0){
			$khuyenmai = $view->giamgia;
			$giadagiam = $view->gia - $view->gia * $view->giamgia / 100;
		}
		if($view->quatang != null && $view->soluongkhuyenmai > 0){
			$quatang = $view->quatang;
		}		
	@endphp
<div class="chitietsp">
	<div class="chitietsp-in">
		<div class="tabs">
				<div>CHI TIẾT SẢN PHẨM</div>
		</div>
		<div class="chitietsp__wrap">
			<div class="content__left">
				<div class="zoom-small-image">
					<a href='{{asset('public/uploads/products/'.$view->hinhanh)}}' width="300" height="300"  class = 'cloud-zoom' id='zoom1' rel="adjustX: 10, adjustY:-4">
						<img src="{{asset('public/uploads/products/'.$view->hinhanh)}}" width="250" height="250"  alt='' title="Optional title display" />
					</a>
				</div>
				<div class="mota">
					{!! $view->mota !!}
				</div>
				<!--- Chức năng đánh giá và xem đánh giá --->
				<div class="danhgia">
					<div class="danhgia__title">
						<h4>Đánh giá </h4>
						<div class="sobinhluan">
							{{-- // add danh gia --}}
						</div>
					</div>
					
					<form action="{{ URL::to('/rating') }}" method="post" class="form__danhgia" name="frm" onsubmit="return checkdanhgia();">
						{{ csrf_field() }}
						<div id="rating">
							<input type="radio" id="star5" name="sodiem" onclick="printStar(this.value)" value="5"/>
							<label class = "full" for="star5" title="Awesome - 5 stars"></label>
						
							<input type="radio" id="star4" name="sodiem" value="4" onclick="printStar(this.value)" check/>
							<label class = "full" for="star4" title="Pretty good - 4 stars"></label>
						
							<input type="radio" id="star3" name="sodiem" value="3" onclick="printStar(this.value)" />
							<label class = "full" for="star3" title="Meh - 3 stars"></label>
						
							<input type="radio" id="star2" name="sodiem" value="2" onclick="printStar(this.value)" />
							<label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
						
							<input type="radio" id="star1" name="sodiem" value="1" onclick="printStar(this.value)" />
							<label class = "full" for="star1" title="Sucks big time - 1 star"></label>
						</div>
						<h4 style="clear: left">Ý kiến</h4>
						<div class="form-group row binhluan">
							<input class="form-control" type="text" name="binhluan" placeholder="Hãy để lại một chút ý kiến của bạn về sản phẩm này..." onclick="document.getElementById('warning-Password').innerHTML=''"/>
							<input type="text" name="idsanpham" value="{{ $view->idsanpham }}" style="display: none;">
							<div class='canhbao canhbao-danhgia' id='warning-sodiem'></div>	
							<button name="submit-danhgia" class="btn btn-primary button__danhgia">
									Đánh giá
							</button>
						</div>
					</form>	
					<div class="gachngang"></div>
					<div class="danhgia__title">
						<h4>Đánh giá tiêu biểu</h4>
					</div>		
					<div id="danhsachdanhgia" class="danhsachdanhgia">
							<div class="container">
							  <div class="d-flex justify-content-center">
								<div class="col-md-12 col-lg-12">
								  <div class="card text-dark" style="border: none">
									
						
										@foreach ($danhgia as $row => $danhgia)
											@php
												$star="";
											@endphp
											@if($danhgia->idsanpham == $view->idsanpham)
												@for($i = 1; $i < 6; $i++)
													@if($i <= $danhgia->sodiem)
														@php
															$star = $star."<i class='fa-solid fa-star' style='color:hsl(47, 98%, 67%)'></i>";
														@endphp
													@else
														@php
															$star = $star."<i class='fa-solid fa-star' style='color: hsl(47, 2%, 71%);'></i>";
														@endphp
													@endif
												@endfor
												<div class="card-body p-4">
													<div class="d-flex flex-start">
														<img class="rounded-circle shadow-1-strong me-3"
														src="" width="60"
														height="60" />
														<div>
															<h6 class="fw-bold mb-1">{{ $danhgia->tennguoidung }} </h6>
															<div class="d-flex align-items-center ">
																<p class="mb-0">
																	{{ date_format(date_create($danhgia -> created_at), "M d,Y") }}
																<span class="badge bg-primary">Pending</span>
																</p>
																<a href="#!" class="link-muted"><i class="fas fa-pencil-alt ms-2"></i></a>
															</div>
															<div class="mb-3">
																@php
																	echo "$star";
																@endphp
															</div>
															<p class="mb-0">
																{{ $danhgia->binhluan }}
															</p>
														</div>
													</div>
												</div>
											@endif
										@endforeach
								  </div>	
							    </div>
							  </div>
							</div>
					</div>
				</div> <!--- End Chức năng đánh giá và xem đánh giá --->
			</div>	
			<div class="content__right">
				<div class="basic_info">
					<p class="basic__info-name"> {{ $view->tensanpham }}</p>
					<p class="basic__info-price">
						@if(isset($khuyenmai))
							<span style="display:block;">
								<font style="color: hsl(0, 3%, 77%); text-decoration: line-through;">{{ number_format($view->gia,0,",",".") }} VNĐ</font>
							</span>
							<span>
								<b><font style="color: hsl(1, 100%, 56%)">{{ number_format($giadagiam,0,",",".") }} VNĐ</b></font>
								<i><font size="5"> (giảm {{ $view->giamgia }}%)</font></i>
							</span>
						@else
							<span>
								<b><font style="color: hsl(1, 100%, 56%)">{{ number_format($view->gia,0,",",".") }} VNĐ</b></font>
							</span>
						@endif
					</p>
					<div class="avg-rating">
						@php
            				$count = 0;
        				@endphp
						
					{{-- add rating --}}	
					</div>
					<form action="{{ URL::to('/save-cart') }}" method="POST">
						{{ csrf_field() }} 	
						@if($view->soluong <= 0)
							<a href='index.php?content=hethang'><div class='btn button__add-cart'>Mua ngay</div></a>
						@else
							<input class="btn button__add-cart" type="submit" value="Mua ngay" name="chovaogio" class="inputmuahang"/> 
							<input name="productID_hidden" value="{{ $view->idsanpham }}" type="hidden">
							<input name="qty" value="1" min="1" type="hidden">
						@endif
					</form>
					<p class="basic__info-origin">
						<b>Xuất xứ: </b> 
							{{ $view->xuatxu }}
					</p>
					<p class="basic__info-warranty">
						<b>Bảo hành: </b> 
						{{ $view->baohanh }} tháng
					</p>
					<p class="basic__info-number"> 
						<b>Còn lại: </b> 
						@if( $view->soluong > 0)
							{{ $view->soluong }} sản phẩm
						@else
							hết hàng
						@endif
					</p>
					
				</div>
				@if (isset($quatang))
					@foreach ($spkm as $row => $spkm)
					<div class="sanpham__gift-wrap">
						<div class="sanpham__gift-title">Khuyễn mãi, quà tặng kèm</div>
						<div class="sanpham__gift-info">
							<div class="sanpham__gift-1">
							<a href="index.php?idsanpham={{ $spkm->idsanpham }}" style="color:black;">
							<img class="img__spkm" src="{{asset('public/uploads/products/'.$spkm->hinhanh)}}">	
							<div class="gift-title">Quà Tặng</div>
							<div class="ten-spkm">
								{{ $spkm->tensanpham }}
							</div>
							<font style="color: hsl(0, 3%, 77%); text-decoration: line-through; font-weight: 500;"> 
								{{number_format( $spkm->gia ,0,",",".")}} VNĐ
							</font> 
							<font style="color: hsl(1, 100%, 56%); margin-left:12px;"> 
								0  VNĐ
							</font>
							</a>
							</div>
							<div class="sanpham__gift-2">
								@php
									$sum = $view->gia + $spkm->gia 
								@endphp
								<div class="sanpham__gift-2-sum">
									Tổng cộng: 
									<font style="color: hsl(0, 3%, 77%); text-decoration: line-through; font-size: 13px;"> 
										{{ number_format($sum ,0,",",".") }}
									</font>
									<font style="color: hsl(1, 100%, 56%)">
										{{number_format( $giadagiam ,0,",",".")}} VNĐ
									</font>
								</div>
								<div class="sanpham__gift-2-tk">
									Tiết kiệm: 
									<font style="color: hsl(1, 100%, 56%)">
										{{number_format($spkm->gia,0,",",".")}} VNĐ
									</font>
								</div>
								
							</div>
						</div> 
					</div>
					@endforeach
				@endif
				<div class="tinhnang">
					<div class="tieudetinhnang">
						<ul class="title__thuoctinhsp">
							<li>
								<h4>Thuộc tính sản phẩm</h4>
							</li>
						</ul>
					</div>
					
					<div id="tab1">
						{{ print_r($view->chitiet) }}
					</div>
				</div>	
			</div>	
		</div>
	</div>
</div>
@endforeach

<script language="javascript">
 	function checkdanhgia(){
		var error=0;
	    if(frm.sodiem.value==0)
		{
			document.getElementById('warning-sodiem').innerHTML="Bạn chưa đánh giá sản phẩm";
			error++;	
		}
		if(error>0) {
			alert('Bình luận thất bại');
			return false;
		} else {
			return true;
		}
	}
	function printStar(rating){
		document.getElementById("saodanhgia").innerHTML = " ("+ rating +")";
	}
</script>
@endsection