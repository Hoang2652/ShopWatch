@extends('masterlayout')
@section('productDetail')

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="{{asset('public/frontend/js/zoom/cloud-zoom.1.0.2.js')}}"></script>
<link href="{{asset('public/frontend/css/cloud-zoom.css')}}" rel="stylesheet" type="text/css" />

@foreach ( $viewsanpham as $row => $view)
	
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
					{{ $view->mota }}
				</div>
				<!--- Chức năng đánh giá và xem đánh giá --->
				<div class="danhgia">
					<div class="danhgia__title">
						<h4>Đánh giá </h4>
						<div class="sobinhluan">
							{{-- // add danh gia --}}
						</div>
					</div>
					
					<form action="index.php?content=xulydanhgia" method="post" class="form__danhgia" name="frm" onsubmit="return checkdanhgia();">
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
							{{-- post cap nhat danh gia --}}
							</button>
						</div>
					</form>	
					<div class="gachngang"></div>
					<div class="danhgia__title">
						<h4>Đánh giá tiêu biểu</h4>
					</div>		
					<div id="danhsachdanhgia" class="danhsachdanhgia">
						{{-- add danh gia		 --}}
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
								<b><font style="color: hsl(1, 100%, 56%)">{{ number_format($view->gia,0,",",".") }} VNĐ</b></font>
								<i><font size="5"> <?php echo '(giảm '.$row['giamgia'].'%)' ?></font></i>
							</span>
						@else
							<span>
								<b><font style="color: hsl(1, 100%, 56%)">{{ number_format($view->gia,0,",",".") }} VNĐ</b></font>
							</span>
						@endif
					</p>
					<div class="avg-rating">
					{{-- add rating --}}
					</div>
					<form action="index.php?content=cart&action=add&idsanpham={{ $view->idsanpham }}" method="post">
						@if(isset($dem))
							<a href='index.php?content=hethang'><div class='btn button__add-cart'>Mua ngay</div></a>
						@else
							<input class="btn button__add-cart" type="submit" value="Mua ngay" name="chovaogio" class="inputmuahang"/>
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
						{{-- // add dem  --}}
					</p>
					
				</div>
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