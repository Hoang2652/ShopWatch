@extends('admin_masterlayout')
@section('exportBill')
<link rel="stylesheet" href="{{ asset('public/backend/css/hienthi_sp.css') }}" />

<form class="formxulynhapxuat" action="{{ URL::to('admin/export-Bill/add/execute') }}" method="post" enctype="multipart/form-data" name="frm" onsubmit="return kiemtrahoadonnhapxuat()">
    {{ csrf_field() }}
    <div class="add__sp">
		<div class="title__hdkh">
			<div colspan=2>Thêm hóa đơn xuất kho</div>
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
                        <select id="select_diachixuatkho" class="custom-select " style="width: 190px; height: 35px;" name="diachixuatkho" required>
                            <option value="">Chọn kho xuất hàng...</option>
                            @foreach ($storage as $row)
                                <option value="{{ $row->tenkhohang }}">{{ $row->tenkhohang }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa-solid fa-location-dot"></i></div>
                        </div>
                        <input class="form-control" type="text" name="diachinhapkho" placeholder="Địa chỉ nhập hàng..." required/>
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
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-3" style=" font-size: 12px; font-style: italic; color: gray;"><i class="fa-solid fa-circle-info"></i> : Nhập tên, id sản phẩm. Ấn chọn sản phẩm sẽ add vào bảng</div>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text" ><i class="fa-solid fa-magnifying-glass"></i></div>
                                </div>
                                <input class="form-control" id="search_product_storage" placeholder="Chọn kho hàng cần xuất...." disabled/>
                                <div id="live_search_result" style="background-color: white;position: fixed;width: 587px;height: auto;max-height: 480px;margin-top: 38px;margin-left: 41px;z-index: 4;overflow: auto;border-radius: 3px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body" id="display_product_table">
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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
	</div>
</form>
<script>
var arrayObjectGlobal;
var timer;
var count = 0;

$("#select_diachixuatkho").change(function(){
    $("#live_search_result").empty();
    $("#search_product_storage").removeAttr('disabled');
    $("#search_product_storage").attr("placeholder", "Tìm sản phẩm ở " + $("#select_diachixuatkho").val() );
});

$('#search_product_storage').keyup(function(){
    clearTimeout(timer);
    var milisecondDelay = 400;
    var query= $(this).val();
    var tenkhohang = $("#select_diachixuatkho").val();
    timer = setTimeout(function() {
    lookup(query);
    }, milisecondDelay);

    function lookup(query){
        if(query.toString().length == 0){
            $("#live_search_result").empty();
            return;
        } else {
            $.ajax({
                url:"{{ route('search_product_in_stock')}}",
                type:"GET",
                data:{'keyword':query,
                      'tenkhohang': tenkhohang},
                success:function(data){
                    arrayObjectGlobal = data.table_row;
                    $('#live_search_result').html(searchResultHtml(data.table_row));
                    $('.actionAddToTable').click(function(){
                        var idsanpham = $(this).attr('data-value');
                        setHtmltoTable(idsanpham);
                    });
                }
            }); 
        }
    }

    $('#search_product_storage').click(function(){  
        $("#live_search_result").empty();
    });

    $('#display_product_table').click(function(){  
        $("#live_search_result").empty();
    });

    function setHtmltoTable(idsanpham) { 
        for(var row of arrayObjectGlobal){
            if(row.idsanpham == idsanpham){
                var html = `
                <tr class='noidung_hienthi_sp row-delete-id-` + (++count) + `'>
                    <td class='stt'>` + (count) + `</td>
                    <td class='stt_hienthi_sp' style="width: 400px; "><input type='text' name="product[` + (count) + `][tensanpham]" style="width: 100%" value="` + row.tensanpham + `" /></td>
                    <td class='masp_hienthi_sp'><input type='text' name="product[` + (count) + `][idsanpham]" style="width: 100%" value="` + row.idsanpham + `" readonly /></td>
                    <td class='sl_hienthi_sp' style="width: 100px; "><input type='text' name="product[` + (count) + `][dongia]" style="width: 100%" value="` + row.gia + `" /></td>
                    <td class='sl_hienthi_sp'><input type='number' name="product[` + (count) + `][soluong]" value="1" min="0" max="` + row.soluong + `" /></td>
                    <td class='sl_hienthi_sp'><input type='text' name="product[` + (count) + `][donvi]" style="width: 100%" value="chiếc"></td>
                    <td><i class="fa-solid fa-x execute-delete" data-value="` + (count) + `" style="color:red;"></i></td>
                </tr>
                            `;
                $('#display_row_here').append(html);
                break;
            }
        }

        $('.execute-delete').click(function(){
            $('.row-delete-id-' + $(this).attr('data-value')).remove();
        });
    }

    function searchResultHtml(arrayObject){
        var resultHtml = ``;
        if(arrayObject.length <= 0){
            resultHtml += `<div class="row no-found-result">Không có kết quả tìm kiếm</div>`;
        } else {
            resultHtml += `<ul class="live-search-list">`;
            for (var row of arrayObject){
                if(row.tenvitrikhohang != "Chưa có vị trí"){
                    row.tenvitrikhohang = `<span class="badge badge-success align-middle" style="transform: scale(1.2);">` + row.tenvitrikhohang + `</span>`;
                } else {
                    row.tenvitrikhohang = `<span class="badge badge-secondary align-middle" style="transform: scale(1.2);">Chưa có vị trí</span>`;
                }
                resultHtml += `
                    <li class="row actionAddToTable" data-value="` + row.idsanpham + `">
                        <div class="col-sm-1">` + row.idsanpham + `</div>
                        <div class="col-sm-1"><img src="{{ asset('public/uploads/products/` + row.hinhanh + `') }}"/></div>
                        <div class="col-sm-5">` + row.tensanpham + `</div>
                        <div class="col-sm-2">` + row.gia + `</div>
                        <div class="col-sm-1">` + row.soluong + `</div>
                        <div class="col-sm-2">` + row.tenvitrikhohang + `</div>
                    </li>
                    `;
            }
            resultHtml += `</ul>`;
        }
        return resultHtml;
    }
});

</script>
@endsection