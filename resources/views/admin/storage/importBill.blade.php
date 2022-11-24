@extends('admin_masterlayout')
@section('importBill')
<link rel="stylesheet" href="{{ asset('public/backend/css/hienthi_sp.css') }}" />

<form class="formxulynhapxuat" action="" method="post" enctype="multipart/form-data" name="frm" onsubmit="return kiemtrahoadonnhapxuat()">
    <div class="add__sp">
		<div class="title__hdkh">
			<div colspan=2>Thêm hóa đơn nhập kho</div>
		</div>
        <div class="form-row mb-3">
            <div class="col-md-6">
                <label for="doitac">Đối tác: </label>
                <input class="form-control col-sm-4" type="text" name="doitac" required/>
            </div>
            <div class="col-md-6">
                <label for="dienthoai" style="display: grid"> điện thoại liên lạc: </label>
                <input class="form-control col-sm-4" type="text" name="dienthoai" required/>
            </div>
        </div>
        <div class="form-row mb-3">
            <div class="col-md-6">
                <label for="email" style="display: grid"> email: </label>
                <input class="form-control col-sm-4" type="text" name="email" required/>
            </div>
            <div class="col-md-6">
                <label for="ngaynhapxuat">Ngày nhập / xuất: </label>			
                <input class="form-control col-sm-4" type="date" name="ngaynhapxuat" required/>
            </div>
            
        </div>
        <div class="form-row mb-3">
            <div class="col-md-6">
				<label for="diachinhapkho">Địa chỉ nhập kho: </label>
                <br />	
                <select class="custom-select " style="width: 190px;" name="diachinhapkho" required>
                    <option value="">Chọn địa chỉ kho hàng</option>
                    @foreach ($storage as $row)
                        <option value="">{{ $row->tenkhohang }}</option>
                    @endforeach
                </select>
			</div>
            <div class="col-md-6">
               
            </div>
        </div>

        <table id="myTable">
            <thead>
                <tr class='tieude_hienthi_sp'>
                    <th>stt</th>
                    <th style="width: 130px;">Tên sản phẩm</th>
                    <th style="width: 100px;">Mã sản phẩm</th>
                    <th style="width: 90px;">Đơn giá</th>
                    <th style="width: 140px;">Số lượng</th>
                    <th style="width: 90px;">Đơn vị</th>
                </tr>
            </thead>
            
            <tbody>
                @php
                    $count = 0;
                @endphp
                @while ($count < 10)
                    <tr class='noidung_hienthi_sp'>
                        <td class='stt'>{{ ++$count }}</td>
                        <td class='stt_hienthi_sp'><input type='text' ></td>
                        <td class='masp_hienthi_sp'><input type='text' ></td>
                        <td class='sl_hienthi_sp'><input type='text' ></td>
                        <td class='sl_hienthi_sp'><input type='text' ></td>
                        <td class='sl_hienthi_sp'><input type='text' ></td>
                    </tr>   
                @endwhile
                <tr>
                    <td>
                        <a style="color: #fff;" class='btn btn-primary addNew'>
                            Thêm dòng dữ liệu
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
		<div class="form-group row" style="margin-top: 2rem;"> 
            <input class="btn btn-primary" style="margin:auto;" type="hidden" name="loaihoadon" value="" />
			<input class="btn btn-primary" style="margin:auto;" type="submit" name="submit-themhoadonnhapxuat" value="Thêm phiếu" />
			<input class="btn btn-danger" style="margin:auto; margin-right: 10rem" type="reset" name="" value="Về mặc định" />
		</div>
	</div>
</form>

<script>
$(function() {
    $('.addNew').click(function() {
        var count = $('#myTable tr.noidung_hienthi_sp').length + 1;
        var row = $(this).closest('tr'); 
        row.prev().clone().insertBefore(row). 
            find('input').val('').end(). 
            find('.stt').each(function(){
                $(this).html(count++);
            }).end();
    }); 
});

</script>
@endsection