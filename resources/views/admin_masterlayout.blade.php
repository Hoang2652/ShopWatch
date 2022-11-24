<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<script type="text/javascript" src="{{asset('public/backend/js/jquery-3.6.1.min.js')}}"></script>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<script language="javascript"  src="{{asset('public/backend/ckeditor/ckeditor.js')}}"></script>
	<script type="text/javascript"  src="{{asset('public/backend/js/javafunction.js')}}"></script>
	<script type="text/javascript"  src="{{asset('public/backend/js/code.js')}}"></script>
	<link rel="stylesheet" type="text/css" href="{{asset('public/backend/css/index.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/backend/css/bootstrap.css')}}">
	
	{{-- This link is for the modal, don't delete it --}}
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

	{{-- This link will get ya sum o' dem icon  --}}
	<script src="https://kit.fontawesome.com/2c8a18bbf3.js" crossorigin="anonymous"></script>

	{{-- Toaster js --}}
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


	<base href="/" /> 

	<title> Quản lý Phong Hấp </title>
</head>
<body>
<div id="wapper">
	<div id="content">
		<div id="top-content">
			<div class="lg-header">
				<h1><a href="admin.php"><img src="{{ asset('public/backend/images/logo-header.png') }}" alt="logo" class="lg-header-img"></a></h1>
			</div>	
			<p>Chào bạn <a href="../index.php?content=ttcn"><font color="white"><b><i class="fas fa-user"></i> <u>Hoàng Ezz</u></b></font></a><a href="{{ URL::to('/logout') }}" class="bt-logout">  Đăng xuất</a></p>
		</div>
		<div id="main-content">
			@php
				$admin = Session::get('admin_name');
			@endphp
			@if(isset($admin))
			<div id="left-content">
				<div class="danhmucsp">
					<div class="center" id="change-Class">
						<ul>
							<li><a href="{{URL::to('admin/home')}}" class="changec">Trang chủ</a></li>
							<li><a href="{{URL::to('admin/category')}}" class="changec"> Quản lý danh mục</a></li>
							<li><a href="{{URL::to('admin/user')}}" class="changec"> Quản lý người dùng</a></li>
							<li><a href="{{URL::to('admin/statistic')}}" class="changec"> Thống kê doanh thu</a></li>
							<li><a href="{{URL::to('admin/news')}}" class="changec"> Quản lý tin tức</a></li>
							<li><a href="{{URL::to('admin/support')}}" class="changec"> Hỗ trợ khách hàng</a></li>
							<li><a href="{{URL::to('admin/product')}}" class="changec"> Quản lý sản phẩm</a></li>
							<li><a href="{{URL::to('admin/bill')}}" class="changec"> Quản lý hóa đơn</a></li>						
						</ul>
					</div><!-- End .center -->
				</div>	<!-- End .menu-left -->
			</div><!-- End .left-content -->
			@else
			<div id="left-content">
				<div class="danhmucsp">
					<div class="center" id="change-Class">
						<ul>
							<li><a href="{{URL::to('admin/home')}}" class="changec">Trang chủ</a></li>
							<li><a href="{{URL::to('admin/bill')}}" class="changec"> Quản lý hóa đơn</a></li>
							<li><a href="{{URL::to('/sale')}}" class="changec"> Quản lý bán hàng</a></li>
						</ul>
					</div><!-- End .center -->
				</div>	<!-- End .menu-left -->
			</div><!-- End .left-content -->							
			@endif
			{{------------- Hiển trị content-admin--------------}}
			
			
			<div id="center-content">
                {{-- This is where we yield all of them manage pages --}}
                @yield('home')
				@yield('category')
				@yield('addcategory')
				@yield('updatecategory')

				@yield('product')
				@yield('addproduct')
				@yield('updateproduct')

				@yield('user')
				@yield('adduser')
				@yield('updateuser')

				@yield('support')
				@yield('addsupport')
				@yield('updatesupport')

				@yield('news')
				@yield('addnews')
				@yield('updatenews')

				@yield('bill')
				@yield('billDetail')
				@yield('billPrint')

				@yield('iebill')
				@yield('addiebill')
				@yield('updateiebill')

				@yield('statistic')

				{{-- Page for Sale Employee --}}
				@yield('addBill')

				@yield('quanlynguoidung')
				@yield('quanlydoanhthu')
				@yield('quanlytintuc')
				@yield('quanlyhotro')
				@yield('quanlysanpham')
				@yield('quanlyhoadon')
				@yield('quanlynhapxuatkhohang')
			</div>
		</div><!-- End .main-content -->
	</div><!-- End .content -->
	
</div><!-- End .wapper -->
</body>
</html>