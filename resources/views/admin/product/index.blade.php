@extends('admin_masterlayout')
@section('product')
<link rel="stylesheet" href="{{ asset('public/backend/css/hienthi_sp.css') }}" /> 
<script type="text/javascript" src="{{ asset('public/backend/js/checkbox.js') }}"></script>
<div class="quanlysp">
	<h3>QUẢN LÝ SẢN PHẨM</h3>
    <p style="float:right;">Có tổng cộng:<font color=red><b>{{ $ProductNums }}</font> sản phẩm</b></p>
    <form action="{{URL::to('admin/product/change-status/execute')}}" method="post" onsubmit="return deleteconfirm()" style="width: 100%;">
        {{ csrf_field() }}
    <div class="live-search form-row">
		<div class="col-md-3 mb-3 sreachsanpham">
			<label><i class="fas fa-search"></i> Tìm kiếm sản phẩm</label>
            <input type="text" class="form-control" name="timkiem" placeholder="Nhập id, tên sản phẩm" onkeyup="timkiemtructiep(this.value,'sanpham')">
        </div>
        <div class="col-md-6 mb-3 pl-4 form-row thaotac">
            <div class="col-md-5 mb-3">
                <div class='themsanpham' style="margin-top: 32px; border: none"><a href="{{URL::to('admin/product/add')}}" class="btn btn-primary">Thêm sản phẩm</a></div>
            </div>
            <div class="col-md-5 mb-3">
                <button class="btn btn-primary" type="submit" name="hide" style="margin-top: 32px;">Ngưng bán / Mở bán</button>
            </div>
        </div>
    </div>
    <div class='content-table scb'>
        <table>
            <thead>
                <tr class='tieude_hienthi_sp'>
                    <th width="30"><input type="checkbox" name="check"  class="checkbox" onclick="checkall('item', this)"></th>
                    <th>ID</th>
                    <th>Hình ảnh</th>
                    <th style="width: 350px;">Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Đã bán</th>
                    <th style="width: 110px;">Giá</th>
                    <th>Danh mục</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody id="row-sanpham">
                @if($Product->count() > 0)
                    @foreach($Product as $row)
                    <tr class='noidung_hienthi_sp'>
                        <td class="masp_hienthi_sp"><input type="checkbox" name="id[{{ $row->idsanpham }}]" class="item" class="checkbox" value="{{ $row->trangthai }}"/></td>
                        <td class="masp_hienthi_sp">{{ $row->idsanpham }}</td>
                        <td class="img_hienthi_sp"><img src="{{asset('public/uploads/products/'.$row->hinhanh)}}"  width='62px' height='62px'></td>
                        <td class="img_hienthi_sp">{{ $row->tensanpham }}</td>
                        <td class="sl_hienthi_sp">{{ $row->soluong }}</td>
                        <td class="sl_hienthi_sp">{{ $row->daban }}</td>
                        <td class="gia_hienthi_sp">{{ number_format($row->gia) }} VND</td>
                        <td  class="madm_hienthi_sp">{{ $row->tendanhmuc }}</td>
                        <td  class="madm_hienthi_sp">
                            @if($row->trangthai)
                                <font color=blue>mở bán</font>
                            @else
                                <font color=red>Ngưng bán</font>
                            @endif    
                        </td>
                        <td class="active_hienthi_sp">
                            <a href="{{URL::to('admin/product/update/id='.$row->idsanpham)}}"><i class="fas fa-tools" style="transform: scale(1.5); color: #007bff;"></i></a>
                         <a href="{{URL::to('admin/product/delete/id='.$row->idsanpham.'/execute')}}"><button><i class="fas fa-trash-alt" style="transform: scale(1.5); color: red;"></i></button></a>
                        </td>
                    </tr>
                    @endforeach
                @else
                    {{ "<tr><td colspan='10'>Không có sản phẩm trong CSDL</td></tr>" }}
                @endif
            </tbody>
        </table>
    </div>
    <nav aria-label="page navigation">
		{{  $Product -> appends(request()->all())->links() }}
	</nav>
    </form>
</div>
@endsection
