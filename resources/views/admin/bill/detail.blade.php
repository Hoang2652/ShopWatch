@extends('admin_masterlayout')
@section('billDetail')
<link rel="stylesheet" href="{{ asset('public/backend/css/hienthi_sp.css') }}" />
<div class="bill-detail-layout">
	<h3 class="content-tieude">CHI TIẾT HÓA ĐƠN</h3>
    <div class="bill-detail-container row">
        <ul class="bill-info list-group col-sm-4">
            <li class="list-group-item" style="text-align: center;"><b>Thông tin người đặt</b></li>
            <li class="list-group-item">Mã hóa đơn: {{ $BillInfo->idhoadon }}</li>
            <li class="list-group-item">Người đặt: {{ $BillInfo->hoten }}</li>
            <li class="list-group-item">Ngày xuất đơn: {{ date_format(date_create($BillInfo->created_at),"d-m-Y") }}</li>
            <li class="list-group-item">Địa chỉ giao: {{ $BillInfo->diachi }}</li>
            <li class="list-group-item">Số điện thoại: {{ $BillInfo->dienthoai }}</li>
            <li class="list-group-item">Email: {{ $BillInfo->email }}</li>
            <li class="list-group-item">Trạng thái: {{ $BillInfo->trangthai }}</li>
        </ul>
        <div class="col-sm-8">
            <table class="bill-detail table border">
                <thead>
                    <tr class='tieude_hienthi_sp'>
                        <th>Id sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Giảm giá</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @php 
                        $totalPrice = 0; 
                        $totalBill = 0;
                    @endphp
                    @foreach ($BillDetail as $row)
                        <tr class='noidung_hienthi_sp'>
                            <td class="masp_hienthi_sp">{{ $row->idsanpham }}</td>
                            <td class="stt_hienthi_sp">{{ $row->tensanpham }}</td>
                            <td class="sl_hienthi_sp">{{ $row->soluong }}</td>
                            <td class="sl_hienthi_sp">{{ number_format($row->gia,0,",",".") }}</td>
                            <td class="sl_hienthi_sp">
                                @if($row->giamgia != null)
                                    {{ $row->giamgia }} %
                                @endif
                            </td>
                            <td class="sl_hienthi_sp">{{ number_format($totalPrice = $row->gia * $row->soluong *(100 - $row->giamgia)/100,0,",",".") }}</td> 
                            @php $totalBill += $totalPrice; @endphp
                        </tr>
                    @if($row->quatang != null)
                        <tr class='quatangcart'>
                            <td colspan='6'>Quà tặng: {{ $row->tenquatang }}</td>
                        </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
            <div class="bill-detail-summary"><b>Tổng:<font color="red">{{ number_format($totalBill,0,",",".")." VNĐ" }}</font></b></div>
            <form id="billActionForm" method="POST" action='{{URL::to('admin/bill/change-status/execute')}}' class="bill-actions">
                <input name="idhoadon" value="{{ $BillInfo->idhoadon }}" hidden/>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
</div>

            {{-- ************************************************************ --}}
            {{-- *******Modal display execute bill (get from storage)******** --}}
            {{-- ************************************************************ --}}
<div class="modal fade" id="modal_billExecute" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalLabel">Xử lý đơn hàng (Mã hóa đơn: {{ $BillInfo->idhoadon }})</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body m-1">
            <form id="billDetailForm">
                <input name="billID" value="{{ $BillInfo->idhoadon }}" hidden/>
                <table class="bill-detail table border table-hover">
                    <thead>
                        <tr class='tieude_hienthi_sp'>
                            <th>Id sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Kho hàng đáp ứng</th>

                        </tr>
                    </thead>
                    <tbody>
                        @php 
                            $totalPrice = 0; 
                            $totalBill = 0;
                            $count = 0;
                        @endphp
                        @foreach ($BillDetail as $row)
                            <tr class='noidung_hienthi_sp' id="action-row-{{ ++$count }}">
                                <td class="masp_hienthi_sp">{{ $row->idsanpham }} 
                                    <input class="billDetailValue" name="inputProduct[{{ $count-1 }}][idsanpham]" value="{{ $row->idsanpham }}" hidden/>
                                    <input class="billDetailValue" name="inputProduct[{{ $count-1 }}][soluong]" value="{{ $row->soluong }}" hidden/>
                                </td>
                                <td class="stt_hienthi_sp">{{ $row->tensanpham }}</td>
                                <td class="sl_hienthi_sp">{{ $row->soluong }}</td>
                                <td class="storage_select">
                                    <select name="inputProduct[{{ $count-1 }}][idvitrikhohang]" id="action-select-id-{{ $row->idsanpham }}" class="custom-select actionWaiting">
            
                                    </select>
                                </td>
                        @if($row->quatang != null)
                            <tr class='quatangcart' id="action-row-{{ ++$count }}">
                                <td colspan='3'>Quà tặng: {{ $row->tenquatang }}
                                    <input class="billDetailValue" name="inputProduct[{{ $count-1 }}][idsanpham]" value="{{ $row->idquatang }}" hidden/>
                                    <input class="billDetailValue" name="inputProduct[{{ $count-1 }}][soluong]" value="{{ $row->soluong }}" hidden/>
                                </td>
                                <td class="storage_select">
                                    <select name="inputProduct[{{ $count-1 }}][idvitrikhohang]" id="action-select-id-{{ $row->idquatang }}" class="custom-select actionWaiting">
                
                                    </select>
                                </td>
                            </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tạm thời thoát</button>
          <button type="button" class="btn btn-primary" id="submit_getProductStorage">Xác nhận xử lý</button>
        </div>
      </div>
    </div>
</div>  

<script>
$(document).ready(function () {
    var executeOnce = 1;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('[name=csrf-token]').attr('content')
        }
    });

    getActionButtons();
    function getActionButtons(){
        var status = "{{ $BillInfo->trangthai }}";
        var actionsHtml = ``;
        switch(status){
            case 'Chờ xử lý':
                actionsHtml =`
                <button type="submit" name="status" class="btn btn-danger" value="Đã hủy" target="_blank">Hủy đơn</button>
                <div type="submit" name="status" class="btn btn-info" id="getModal-billExecute" value="{{ $BillInfo->idhoadon }}" target="_blank">Xử lý đơn</div>
                <a class="btn btn-primary" href="{{URL::to('admin/bill/print/id='.$BillInfo->idhoadon.'/execute')}}" target="_blank">In / Lưu hoá đơn</a>
                `;
                break;
            case 'Đang giao hàng':
                actionsHtml = `
                <button type="submit" name="status" class="btn btn-danger" value="Đã hủy" target="_blank">Hủy đơn</button>
                <div type="submit" name="status" class="btn btn-info" id="getModal-billExecute" value="{{ $BillInfo->idhoadon }}" target="_blank">Cập nhật đơn giao</div>
                <a class="btn btn-primary" href="{{URL::to('admin/bill/print/id='.$BillInfo->idhoadon.'/execute')}}" target="_blank">In / Lưu hoá đơn</a>
                <button type="submit" name="status" class="btn btn-success" value="Đã giao hàng" target="_blank">Đánh dấu đã giao</button>`;
                break;
            case 'Đã giao hàng': case 'Hoàn tất':
                actionsHtml = `
                <a class="btn btn-primary" href="{{URL::to('admin/bill/print/id='.$BillInfo->idhoadon.'/execute')}}" target="_blank">In / Lưu hoá đơn</a>`;
                break;
            case 'Yêu cầu bồi hoàn':
                actionsHtml = `
                <div type="submit" name="status" class="btn btn-info" id="getModal-billExecute" value="{{ $BillInfo->idhoadon }}" target="_blank">Cập nhật đơn giao</div>
                <a class="btn btn-primary" href="{{URL::to('admin/bill/print/id='.$BillInfo->idhoadon.'/execute')}}" target="_blank">In / Lưu hoá đơn</a>
                <button type="submit" name="status" class="btn btn-danger" value="Đã hủy" target="_blank">Đánh dấu hủy đơn</button>`;
                break;
        }
        $('#billActionForm').append(actionsHtml);
    }

    // Enable Modal "execute product from storage"
    $('#getModal-billExecute').click (function() {
        
        $('#modal_billExecute').modal('show');

        if(executeOnce > 0){
            executeOnce--;
        } else {
            return;
        }

        var billDetailForm = $("#billDetailForm").serialize();
        $.ajax({
                url: '/phonghap/admin/bill/StorageProduct',
                type: 'get',
                data: billDetailForm,
                success: function(data) {
                    addSelectStorage(data);
                },
                error: function(data) {
                    toastr.error("Tìm sản phẩm trong kho thất bại ! Vui lòng thử lại sau");
                }
            });
    });

    //
    $('#submit_getProductStorage').click (function() {
            var billDetailForm = $("#billDetailForm").serialize();
            $.ajax({
                    url: '/phonghap/admin/bill/handleBill',
                    type: 'get',
                    data: billDetailForm,
                    success: function(data) {
                        toastr.info(data.message);
                    },
                    error: function(data) {
                        toastr.error("Đã xuất dữ liệu trong review !");
                    }
            });
        });

    function addSelectStorage(data){
        data.table_row.forEach(function(row) {
            var optionHtml = `<option value="` + row.idvitrikhohang +`">` + row.tenkhohang + ` (Còn lại: ` + row.soluongconlai + `)</option>` ;
            $('#action-select-id-' + row.idsanpham ).append(optionHtml);
        });
    }
});

</script>
@endsection