<!-- <base href="http://localhost/phonghap/" />-->

<!-- Đã xóa phần php include database -->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Phong Hấp </title>
<link rel="stylesheet" style="style/sheet" href="{{asset('public/frontend/slide/engine/style.css')}}">
<link rel="stylesheet" style="style/sheet" href="{{asset('public/frontend/css/index.css')}}">
<link rel="stylesheet" style="style/sheet" href="{{asset('public/frontend/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
<link rel="stylesheet" style="style/sheet" href="{{asset('public/frontend/css/style1.css')}}">
<link rel="stylesheet" style="style/sheet" href="{{asset('public/frontend/css/index.css')}}">

<script src="{{asset('public/frontend/js/jquery-1.3.2.min.js')}}" type="text/javascript"></script>
<script src="{{asset('public/frontend/js/code.js')}}"></script>
<script language="javascript" type="text/javascript" src="{{asset('public/frontend/js/jquery.easing.js')}}"></script>
<script language="javascript" type="text/javascript" src="{{asset('public/frontend/js/script.js')}}"></script>
<script src="https://kit.fontawesome.com/2c8a18bbf3.js" crossorigin="anonymous"></script>

<!-------------------------------------Tabs-------------------------------->
<script>

// Đợi cho đến khi DOM tải trước khi truy vấn

$(document).ready(function(){

	// dropdown siêu khủng
	var down = false;
	$('#bell').click(function(e){
		var color = $(this).text();
		$('#box').css('overflow', 'auto');
		if(down){
			$('#box').css('height','0px');
			$('#box').css('opacity','0');
			down = false;
		} else {
			$('#box').css('height','auto');
			$('#box').css('max-height','500px');
			$('#box').css('opacity','1');
			down = true;
			$('#main-content').click(function(e){
				$('#box').css('height','0px');
				$('#box').css('opacity','0');
				down = false;
			});
		}
	});


	$('ul.tabs').each(function(){

	// For each set of tabs, we want to keep track of
	// which tab is active and it's associated content

	var $active, $content, $links = $(this).find('a');

	// If the location.hash matches one of the links, use that as the active tab.

	// If no match is found, use the first link as the initial active tab.

	$active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);

	$active.addClass('active');

	$content = $($active.attr('href'));

	// Hide the remaining content

	$links.not($active).each(function () {

		$($(this).attr('href')).hide();

		});

		// Bind the click event handler

		$(this).on('click', 'a', function(e){

		// Make the old tab inactive.

		$active.removeClass('active');

		$content.hide();

		// Update the variables with the new link and content

		$active = $(this);

		$content = $($(this).attr('href'));

		// Make the tab active.

		$active.addClass('active');

		$content.show();
		// Prevent the anchor's default click action
		// Ngăn cản

		e.preventDefault();

		});

	});

});


</script>

<!-------------------------------------slide-------------------------------->
<script type="text/javascript">
 $(document).ready( function(){
		var buttons = { previous:$('#lofslidecontent45 .lof-previous') ,
						next:$('#lofslidecontent45 .lof-next') };

		$obj = $('#lofslidecontent45').lofJSidernews( { interval : 4000,
												direction		: 'opacitys',
											 	easing			: 'easeInOutExpo',
												duration		: 2000,
												auto		 	: true,
												maxItemDisplay  : 4,
												navPosition     : 'horizontal', // horizontal
												navigatorHeight : 32,
												navigatorWidth  : 80,
												mainWidth:1000,
												buttons			: buttons} );
	});
</script>
</head>
<body style="background:white">
<div id="wapper">
	<!-- <div class="alertBox" id="alertBox">
	<div class='exitField' onclick="document.getElementById('alertBox').innerHTML=''">
		<div class='alertBox-holder'>
			<div class='alertBox-title'>.$title</div>
			<div class='alertBox-context'>".$message."</div>
			<div class='alertBox-interact' onclick="document.getElementById('alertBox').innerHTML=''"> Oke </div>
		</div>
	</div> -->
	</div>
	<div id="header" class="header">
		<div class="nav container">
			<a href="{{URL::to('/')}}" class="nav__logo">
				<img src="{{asset('public/frontend/images/logo-header.png')}}" alt="">
			</a>
			<div class="nav__menu" id="nav-menu">
					<ul class="nav__list">
						<li class="nav__item">
							<a href="{{URL::to('/sanpham/dongho')}}" class="nav__link">Đồng hồ</a>
						</li>
						<li class="nav__item">
							<a href="{{URL::to('/sanpham/phukien')}}" class="nav__link">Phụ kiện</a>
						</li>
						<li class="nav__item">
							<a href="{{URL::to('/hotro')}}" class="nav__link">Hỗ trợ</a>
						</li>
                        <li class="nav__item">
                            <a href="{{URL::to('/tintuc')}}" class="nav__link">Tin tức</a>
						</li>

					</ul>
			</div>

			<div class="nav__acc">
					<a href="{{URL::to('/giohang')}}" style="margin-top: 4px; ">
						<i class="fas fa-shopping-cart nav__cart" style="transform: scale(1.3);"></i>
					</a>
				@php 
					$tennguoidung = Session::get('tennguoidung');
					$phanquyen = Session::get('phanquyen');
				@endphp
				@if(isset($tennguoidung))
					<ul>
						@if ($phanquyen == 'Quản trị viên' || $phanquyen == 'Nhân viên')
							<a href="{{asset('public/frontend/admin/admin.php')}}">
								<li>Trang admin </li>
							</a>
						@else
						<a>
							<li class="nav__item">
								<div id="display_numNofitication"></div>
								<div class="icon" id="bell"> <i class="fa-solid fa-bell" style="transform: scale(1.5);color: black;"></i> </div>
								<div class="notifications fade" id="box">
									<h2>Thông báo đơn hàng</h2>
									<div id="box2" style="width: fit-content;margin: auto;color: grey;"><p style="height: 35px;text-align: center;">Hiện chưa có thông báo nào</p></div>
								</div>
							</li>
						</a>
						<a href="{{URL::to('/thongtincanhan')}}"><li><i class="fas fa-user"></i>  {{ $tennguoidung }} </li></a>
						<a href="{{URL::to('/logout')}}"><li> Đăng xuất</li></a>
						@endif
					</ul>
				@else
					<ul>
						<a href="{{URL::to('/register')}}"><li>Đăng ký </li></a>
						<a href="{{URL::to('/login')}}"><li> Đăng nhập</li></a>
					</ul>
				@endif
			</div>
		</div>
	</div><!-- End .header -->

	<div id="main-content">
		<div id="center-content"> 
			{{-- yield show where the page define in bracket will take place --}}
            @yield('home')
			@yield('login')
			@yield('register')
			@yield('news')
			@yield('newsDetail')
			@yield('support')
			@yield('spDetail')
			@yield('product')
			@yield('productDetail')
			@yield('profile')
			@yield('transactionHistory')
			@yield('changeProfile')
			@yield('cart')
			@yield('checkout')
			@yield('changePassword')
		</div><!-- End .center-content -->
	</div><!-- End .main-content -->

	<div id="footer">
	    <div id="doitac">
		    <div id="center2">
			    <div id="doitaccon">
					    <img src="{{asset('public/frontend/images/footer-banner.png')}}" alt="Đối tác" />
			    </div><!-- End .doitaccon -->
		    </div><!-- End .center2 -->
	    </div><!-- End .doitac -->
		<div id="bg-footer">
			<div id="noidungfooter">
				<div id="noidung">
					<ul>
						<li><span id="tencongty">Cty TNHH chưa có thành viên PHONG HẤP</span></li> <br>

						<li>Địa chỉ: Đặng Văn Ngữ - TP.Hồ Chí Minh </li>
						<li>Điện thoại: 0938909944 - Hotline:  0972341193</li>
						<li>Email:  daylafooter@gmail.com</li>
					</ul>
				</div><!-- End .noidung -->
				<div id="thanhngang">
					<img src="{{asset('public/frontend/images/thanhngang-footer.png')}}" />
				</div><!-- End .thanhngang -->
				<div id="copyright">
					<p>Bản quyền thuộc sở hữu bởi Phong Hấp<p>
                    <p>Chịu trách nhiệm quản lí nội dung: một đứa ất ơ nào đó - Số điện thoại: cho nhá máy chết con nhà người ta<p>
                    <p>Mã số doanh nghiệp: chưa có<p>
				</div>
			</div><!-- End .noidungfooter -->
		</div><!-- End .bg-footer -->
	</div><!-- End .footer -->
</div><!-- End .wapper -->

<script>
$(document).ready(function () {
	setNotification();
	function setNotification(){
		var billNofitication = <?php if(isset($billNofitication) && $billNofitication != null){echo json_encode($billNofitication->toArray());} ?>;
		var actionsHtml ="";
		billNofitication.forEach(function(row) {
			switch(row.trangthai){
				case 'Chờ xử lý':
					actionsHtml +=`
					<div class="notifications-item"> <img src="{{asset('public/uploads/status/stopwatch.png')}}" alt="img">
						<a href="{{ URL::to('/thongtincanhan/lichsumuahang') }}">
							<div class="text">
								<h4>Đơn hàng (Mã HD: ` + row.idhoadon + `)</h4>
								<p>Đơn hàng của bạn đã được tiếp nhận chờ xử lý...</p>
							</div>
						</a>
					</div>`;
					break;
				case 'Đang giao hàng':
					actionsHtml +=`
					<div class="notifications-item"> <img src="{{asset('public/uploads/status/cargo-truck.png')}}" alt="img">
						<a href="{{ URL::to('/thongtincanhan/lichsumuahang') }}">
							<div class="text">
								<h4>Đơn hàng đang giao (Mã HD: ` + row.idhoadon + `)</h4>
								<p>Đơn hàng của bạn đang được giao, xin hãy kiên nhẫn...</p>
							</div>
						</a>
					</div>`;	
					break;
				case 'Đã giao hàng':
					actionsHtml +=`
					<div class="notifications-item"> <img src="{{asset('public/uploads/status/delivery.png')}}" alt="img">
						<a href="{{ URL::to('/thongtincanhan/lichsumuahang') }}">
							<div class="text">
								<h4>Sản phẩm đã tới (Mã HD: ` + row.idhoadon + `)</h4>
								<p>Hàng của ban đã được giao tới, vui lòng xác nhận đã nhận hàng...</p>
							</div>
						</a>
					</div>`;	
					break;
				case 'Hoàn tất':
					actionsHtml +=`
					<div class="notifications-item"> <img src="{{asset('public/uploads/status/completed.png')}}" alt="img">
						<a href="{{ URL::to('/thongtincanhan/lichsumuahang') }}">
							<div class="text">
								<h4>Đơn hàng hoàn tất (Mã HD: ` + row.idhoadon + `)</h4>
								<p>Bạn cảm thấy sản phẩm của chúng tôi như thế nào? Hãy đánh giá sản phẩm của chúng tôi nhé</p>
							</div>
						</a>
					</div>`;	
					break;
				case 'Yêu cầu bồi hoàn':
					actionsHtml +=`
					<div class="notifications-item"> <img src="{{asset('public/uploads/status/on-cancel.png')}}" alt="img">
						<a href="{{ URL::to('/hotro') }}">
							<div class="text">
								<h4>Yêu cầu bồi hoàn (Mã HD: ` + row.idhoadon + `)</h4>
								<p>Yêu cầu bồi hoàn của bạn đã được ghi nhận, chúng tôi sẽ liên lạc với bạn sau. Mọi thứ mắc vui lòng gửi thư hỗ trợ cho chúng tôi</p>
							</div>
						</a>
					</div>`;	
					break;
				case 'Đã hủy':
					actionsHtml +=`
					<div class="notifications-item"> <img src="{{asset('public/uploads/status/cancel.png')}}" alt="img">
						<a href="{{ URL::to('/thongtincanhan/lichsumuahang') }}">
							<div class="text">
								<h4>Đã hủy đơn hàng (Mã HD: ` + row.idhoadon + `)</h4>
								<p>Đơn hàng của bạn đã được hủy, mọi thắc mắc hãy gửi thư hỗ trợ cho chúng tôi</p>
							</div>
						</a>
					</div>`;	
					break;
        	}
		});
		$('#box2').html(actionsHtml);
		if(billNofitication.length > 0){
			$('#nofiticationNumber').html(billNofitication.length);
			$('#display_numNofitication').html('<div id="num_Nofitication" style="position: fixed;font-size: 12px;background: #ff2b2b;opacity: 0.8;border-radius: 50%;height: 11px;line-height: 10px;width: 11px;z-index: 2;text-align: center;margin-top: -7px;margin-left: 7px;"></div>');
		}
	}
});
</script>
</body>
</html>
