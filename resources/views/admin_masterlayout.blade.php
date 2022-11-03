<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script  src="{{asset('public/backend/js/jquery-1.3.2.min.js')}}" type="text/javascript"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script language="javascript"  src="{{asset('public/backend/ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript"  src="{{asset('public/backend/js/javafunction.js')}}"></script>
<script type="text/javascript"  src="{{asset('public/backend/js/code.js')}}"></script>
<title> Quản lý Phong Hấp </title>
<link rel="stylesheet" type="text/css" href="{{asset('public/backend/css/index.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/backend/css/bootstrap.css')}}">
<script src="https://kit.fontawesome.com/2c8a18bbf3.js" crossorigin="anonymous"></script>
</head>
<body>
<div id="wapper">
	<div id="content">
		<div id="top-content">
			<div class="lg-header">
				<h1><a href="admin.php"><img src="{{ asset('public/backend/images/logo-header.png') }}" alt="logo" class="lg-header-img"></a></h1>
			</div>	
			<p>Chào bạn <a href="../index.php?content=ttcn"><font color="white"><b><i class="fas fa-user"></i> <u>Admin</u></b></font></a><a href="logout.php" class="bt-logout">  Đăng xuất</a></p>
		</div>
		<div id="main-content">
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
							<li><a href="{{URL::to('admin/iebill')}}" class="changec"> Nhập xuất kho hàng</a></li>							
						</ul>
					</div><!-- End .center -->
				</div>	<!-- End .menu-left -->
			</div><!-- End .left-content -->
			<!---------------- Hiển trị content-admin------------------->
			
			
			<div id="center-content">
                {{-- This is where we yield all of them manage pages --}}
                @yield('home')
				@yield('category')
				@yield('addcategory')
				@yield('updatecategory')

				@yield('product')
				@yield('addproduct')
				@yield('updateproduct')

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