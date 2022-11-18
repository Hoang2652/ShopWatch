@extends('admin_masterlayout')
@section('news')
<link rel="stylesheet" href="{{ asset('public/backend/css/hienthi_sp.css') }}" /> 
<script type="text/javascript" src="{{ asset('public/backend/js/checkbox.js') }}"></script>
<form action="{{URL::to('admin/news/change-status/execute')}}" method="post">
<div class="quanlytintuc">
	<h3 class="title__tintuc">QUẢN LÝ TIN TỨC</h3>
	<div class="tacvu__tintuc">
		<a href='{{URL::to('admin/news/add')}}' class="btn btn-primary">Thêm tin tức</a>
		<div id="check">
			<p>
				<input type="submit" name="change-status" onclick="return confirm('Bạn có chắc muốn Ẩn / đăng những tin tức được chọn');" class="btn btn-danger" value="Ẩn / công khai"/>
			</p>
		</div>
		<p class="sum-tintuc">Có tổng <font color=red><b>{{ $NewsNums }}</b></font> tin tức</p>
	</div>
</div>
<div class="content-table">
	<table>
		<thead>
			<tr class='tieude_hienthi_sp tieude-tintuc'>
				<th width="30"><input type="checkbox" name="check"  class="checkbox" onclick="checkall('item', this)"></th>
				<th>ID</th>
				<th>Tiêu đề</th>
				<th>Nội dung ngắn</th>
				<th>Hình ảnh</th>
				<th>Tác giả</th>
				<th>Trạng thái</th>
				<th>Active</th>
			</tr>
		</thead>
		<tbody>
			@foreach($News as $row)
			<tr class='noidung_hienthi_sp'>
				<td class="masp_hienthi_sp"><input type="checkbox" name="id[]" class="item" class="checkbox" value="{{ $row->idtintuc }}>"/></td>
				<td class="masp_hienthi_sp" width="30">{{ $row->idtintuc }}</td>
				<td class="stt_hienthi_sp">{{ $row->tieude }}</td>
				<td class="img_hienthi_sp" width="300"> {{ Str::limit($row->noidungngan,125) }} </td>
				<td class="sl_hienthi_sp"><img src="{{asset('public/uploads/news/'.$row->hinhanh)}}" width="80" height="60"/></td>
				<td class="sl_hienthi_sp">{{ $row->tacgia }}</td>
				<td class="sl_hienthi_sp">
				@if ($row->trangthai)
					<font color='blue'>Công khai</font>
				@else
					<font color='red'>Ẩn</font>
				@endif</td>
				<td class="active_hienthi_sp">
					<a href="{{URL::to('admin/news/change-status/id='.$row->idtintuc.'/execute')}}" onclick="return confirm('Bạn có chắc muốn thay đổi trạng thái tin tức \'{{ $row->tieude }}\' này ?')"><i class="fa-solid fa-lock" style="transform: scale(1.5); color: green;"></i></a>
					<a href="{{URL::to('admin/news/update/id='.$row->idtintuc)}}"><i class="fas fa-tools" style="transform: scale(1.5); color: #007bff;"></i></a>
					 <a href="{{URL::to('admin/news/delete/id='.$row->idtintuc.'/execute')}}" onclick="return confirm('Bạn có chắc muốn XÓA tin tức \'{{ $row->tieude }}\' ?')"><i class="fas fa-trash-alt" style="transform: scale(1.5); color: red;"></i></a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<nav aria-label="page navigation" id="page-navigation">
		{{  $News -> appends(request()->all())->links() }}
	</nav>
</div>
</form>
@endsection