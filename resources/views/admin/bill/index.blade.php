@extends('admin_masterlayout')
@section('bill')
<script type="text/javascript">
    $(document).ready(function() {
        function bill_record_print(result) {
            var htmlView = '';
            var html = '';
            if (result.length <= 0) {
                htmlView += `<tr><td colspan='10'>Không có kết quả theo yêu cầu</td></tr>`;
            }
            for (var row of result) {
                var dateObject = new Date(row.created_at);
                htmlView += `
                <tr class='noidung_hienthi_sp'>
                    <td class="masp_hienthi_sp">` + row.idhoadon + `</td>
                    <td class="stt_hienthi_sp">` + row.hoten + `</td>
                    <td class="stt_hienthi_sp">` + String(dateObject.getDate() + 1).padStart(2, '0') + `-` + String(dateObject.getMonth() + 1).padStart(2, '0') + `-` + dateObject.getFullYear() + `</td>
                    <td class="sl_hienthi_sp">` + row.diachi + `</td>
                    <td class="sl_hienthi_sp">` + row.dienthoai + `</td>
                    <td class="sl_hienthi_sp">` + row.email + `</td>
                    <td class="sl_hienthi_sp">` + row.trangthai + `</td>
                    <td class="active_hienthi_sp" style="width:70px;">
                        <a href="{{URL::to('admin/bill/detail/id=` + row.idhoadon + `')}}"><i class="fa-solid fa-circle-info" style="transform: scale(1.5); color: #007bff;"></i></a>
                        <a href="{{URL::to('admin/bill/delete/id=` + row.idhoadon + `/execute')}}"><button><i class="fas fa-trash-alt" style="transform: scale(1.5); color: red;"></i></button></a>
                    </td>
                </tr>
                `;
            }
            return htmlView;
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('[name=csrf-token]').attr('content')
            }
        });
        $('#billFilter').click(function(event) {
            var IDkeyword = $('#timkiem-hoadon').val();
            var from = $('#date-from').val();
            var to = $('#date-to').val();
            var status = $('#filter-donhang').val();
            
            event.preventDefault();
            $.ajax({
                url: '{{ route('bill-live-sreach') }}',
                type: 'get',
                data: { 
                    'IDkeyword': IDkeyword,
                    'from': from,
                    'to': to,
                    'BillStatus': status
                },
                beforeSend: function() {
                    $('#row-sanpham').html("<tr><td colspan='10'>Loading ....</td></tr>");
                },
                success: function(data) {
                    $('#billNums').text(data.total_row);
                    $('#row-sanpham').html(bill_record_print(data.table_row));
                }
            });
        });
    });
</script>
<link rel="stylesheet" href="{{ asset('public/backend/css/hienthi_sp.css') }}" /> 
<script type="text/javascript" src="{{ asset('public/backend/js/checkbox.js') }}"></script>
<div class="quanlysp">
	<h3>QUẢN LÝ HÓA ĐƠN</h3>
    <p style="text-align:right; margin-right: 100px;">Có tổng cộng: <font color=red><b id='billNums'>{{ $BillNums }}</b></font> hóa đơn</p>
    <div class="form-row col-md-10">
        <div class="col-mb mb-3">
            <label><i class="fas fa-search"></i> Tìm kiếm hóa đơn</label>
            <input type="text" class="form-control" id="timkiem-hoadon" name="timkiem" placeholder="Nhập id hóa đơn" />
        </div>
        <div class="col mb-3">
            <label>Từ ngày: </label>
            <input type="date" id="date-from" class="form-control" name="ngaydathang"  />
        </div>
        <div class="col mb-3">
            <label>Đến ngày: </label>
            <input type="date" id="date-to" class="form-control" name="ngaydathang"  />
        </div>
        <div id="check" class="col-mb mb-3">
            <label>Lọc trạng thái: </label>
            <select id="filter-donhang" class="form-control" >
                <option selected>--trạng thái--</option>
                <option>Chờ xử lý</option>
                <option>Đang giao hàng</option>
                <option>Đã giao hàng</option>
                <option>Hoàn tất</option>
                <option>Yêu cầu bồi hoàn</option>
                <option>Đã hủy</option>
            </select>
        </div>
        <div class="col mb-3">
            <input type="button" id="billFilter" class="form-control btn btn-primary" style="width: 50px; margin-top: 30px;" value="Lọc"/>
        </div>
        {{-- <div class="col mb-3">
            <label>Cập nhật trạng thái:</label>
            <div style="border: none;width: 280px;">
                <button class="btn btn-primary" type="submit" name="hoantat" value="Đã giao hàng" >Hoàn tất</button>
                <button class="btn btn-danger" type="submit" name="huy" value="Hủy đơn hàng" >Đã hủy</button>
            </div>
        </div> --}}
    </div>
</div>
<div class='content-table scb'>
<table>
    <thead>
        <tr class='tieude_hienthi_sp'>
            <th>ID</th>
            <th style="width: 130px;">Họ Tên</th>
            <th style="width: 100px;">Ngày đặt hàng</th>
            <th style="width: 350px;">Địa chỉ giao hàng</th>
            <th>Điện Thoại</th>
            <th>Email</th>
            <th style="width: 90px;">Trạng thái</th>
            <th colspan=2 style="width: 90px;">Thao tác</th>
        </tr>
    </thead>
    <tbody id="row-sanpham">
        @foreach($Bill as $row)
        <tr class='noidung_hienthi_sp'>
            <td class="masp_hienthi_sp">{{ $row->idhoadon }}</td>
            <td class="stt_hienthi_sp">{{ $row->hoten }}</td>
            <td class="stt_hienthi_sp">{{ date_format(date_create($row->created_at),"d-m-Y") }}</td>
            <td class="sl_hienthi_sp">{{ $row->diachi }}</td>
            <td class="sl_hienthi_sp">{{ $row->dienthoai }}</td>
            <td class="sl_hienthi_sp">{{ $row->email }}</td>
            <td class="sl_hienthi_sp">
                {{ $row->trangthai }}
            </td>
            <td class="active_hienthi_sp" style="width:70px;">
                <a href="{{URL::to('admin/bill/detail/id='.$row->idhoadon)}}"><i class="fa-solid fa-circle-info" style="transform: scale(1.5); color: #007bff;"></i></a>
                <a href="{{URL::to('admin/bill/delete/id='.$row->idhoadon.'/execute')}}" onclick="return confirm('Bạn có chắc muốn XÓA hóa đơn \'{{ $row->idhoadon }}\' ?')"><i class="fas fa-trash-alt" style="transform: scale(1.5); color: red;"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
<nav aria-label="page navigation">
    {{  $Bill -> appends(request()->all())->links() }}
</nav>
@endsection