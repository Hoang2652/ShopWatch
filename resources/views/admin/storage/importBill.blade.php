@extends('admin_masterlayout')
@section('importBill')
<link rel="stylesheet" href="{{ asset('public/backend/css/hienthi_sp.css') }}" />

<form class="formxulynhapxuat" action="{{ URL::to('admin/import-Bill/add/execute') }}" method="post" enctype="multipart/form-data" name="frm" onsubmit="return kiemtrahoadonnhapxuat()">
    {{ csrf_field() }}
    <div class="add__sp">
		<div class="title__hdkh">
			<div colspan=2>Thêm hóa đơn nhập kho</div>
		</div>
        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa-solid fa-user-tie"></i></div>
                        </div>
                        <input class="form-control" type="text" name="tendoitac" placeholder="Nhập tên đối tác..." required/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa-solid fa-phone"></i></div>
                        </div>
                        <input class="form-control" type="text" name="dienthoai" placeholder="Số điện thoại..." required/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">@</div>
                        </div>
                        <input class="form-control" type="text" name="email" placeholder="Nhập Email..." required/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa-solid fa-calendar-days"></i></div>
                        </div>	
                        <input class="form-control" type="date" name="ngaynhapxuat" placeholder="Ngày nhập xuất" required/>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa-solid fa-share-from-square"></i></div>
                        </div>
                        <input class="form-control" type="text" name="diachixuatkho" placeholder="Địa chỉ lấy hàng..." required/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa-solid fa-location-dot"></i></div>
                        </div>
                        <select class="custom-select " style="width: 190px; height: 35px;" name="diachinhapkho" required>
                            <option value="">Chọn kho nhập hàng...</option>
                            @foreach ($storage as $row)
                                <option value="{{ $row->tenkhohang }}">{{ $row->tenkhohang }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                   
                </div>
                <div class="form-group row" style="margin-top: 2rem;"> 
                    <div class="col-sm-6">
                        <input class="btn btn-primary" style="margin:auto;" type="hidden" name="loaihoadon" value="" />
                        <input class="btn btn-danger " type="reset" name="" value="Về mặc định" />
                    </div>
                    <div class="col-sm-6">
                        <input class="btn btn-primary " type="submit" name="submit-themhoadonnhapxuat" value="Thêm phiếu" />
                    </div>
                </div>
            </div>
            <div class="col-sm-8 card" style="padding: 0;">
                <div class="card-header">Danh sách sản phẩm: <span style=" color: grey; font-style: italic; font-size: 14px; ">(Những dòng dữ liệu bỏ trống sẽ tự động bỏ qua)</span></div>
                <div class="card-body">
                    <table id="myTable">
                        <thead>
                            <tr class='tieude_hienthi_sp'>
                                <th style="width: 25px;">stt</th>
                                <th style="width: 150px;">Tên sản phẩm</th>
                                <th style="width: 100px;">Mã sản phẩm</th>
                                <th style="width: 90px;">Đơn giá</th>
                                <th style="width: 100px;">Số lượng</th>
                                <th style="width: 90px;">Đơn vị</th>
                                <th></th>
                            </tr>
                        </thead>
                        
                        <tbody id="display_row_here">
                            @php
                                $count = 0;
                            @endphp
                            @while ($count < 5)
                                <tr class='noidung_hienthi_sp row-delete-id-{{ ++$count }}'>
                                    <td class='stt'>{{ $count }}</td>
                                    <td class='stt_hienthi_sp' style="width: 400px; "><input type='text' name="product[{{ $count }}][tensanpham]" style="width: 100%"></td>
                                    <td class='masp_hienthi_sp'><input type='text' name="product[{{ $count }}][idsanpham]" style="width: 100%"></td>
                                    <td class='sl_hienthi_sp' style="width: 100px; "><input type='text' name="product[{{ $count }}][dongia]" style="width: 100%"></td>
                                    <td class='sl_hienthi_sp'><input type='number' name="product[{{ $count }}][soluong]" style="width: 100%" min=0></td>
                                    <td class='sl_hienthi_sp'><input type='text' name="product[{{ $count }}][donvi]" style="width: 100%"></td>
                                    <td><i class="fa-solid fa-x execute-delete" data-value="{{ $count }}" style="color:red;"></i></td>
                                </tr>   
                            @endwhile
                        </tbody>
                    </table>
                    <div style=" width: fit-content;  margin: 10px auto;">
                        <a style="color: #fff;" class='btn btn-primary addNew'>
                            Thêm dòng dữ liệu
                        </a> 
                    </div>
                </div>
            </div>
        </div>
	</div>
</form>

<script>
$(document).ready(function () {
    $('.execute-delete').click(function(){
        $('.row-delete-id-' + $(this).attr('data-value')).remove();
    });

    $(function() {
        $('.addNew').click(function() {
            var count = $('.noidung_hienthi_sp').length + 1;
            var html = `
                <tr class='noidung_hienthi_sp row-delete-id-` + (count) + `'>
                    <td class='stt'>` + (count) + `</td>
                    <td class='stt_hienthi_sp' style="width: 400px; "><input type='text' name="product[` + (count) + `][tensanpham]" style="width: 100%" /></td>
                    <td class='masp_hienthi_sp'><input type='text' name="product[` + (count) + `][idsanpham]" style="width: 100%" /></td>
                    <td class='sl_hienthi_sp' style="width: 100px; "><input type='text' name="product[` + (count) + `][dongia]" style="width: 100%" /></td>
                    <td class='sl_hienthi_sp'><input type='number' name="product[` + (count) + `][soluong]" min="0" /></td>
                    <td class='sl_hienthi_sp'><input type='text' name="product[` + (count) + `][donvi]" style="width: 100%" /></td>
                    <td><i class="fa-solid fa-x execute-delete" data-value="` + (count) + `" style="color:red;"></i></td>
                </tr>
                            `;
                $('#display_row_here').append(html);
            $('.execute-delete').click(function(){
                $('.row-delete-id-' + $(this).attr('data-value')).remove();
            });
        }); 
    }); 
});

</script>
@endsection