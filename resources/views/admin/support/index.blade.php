@extends('admin_masterlayout')
@section('support')
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Thêm Sản Phẩm</title>
{{-- <link rel="stylesheet" href="css/them_sanpham.css" /> --}}
</head>
<link rel="stylesheet" href="{{ asset('public/backend/css/hienthi_sp.css') }}" /> 
<script type="text/javascript" src="{{ asset('public/backend/js/checkbox.js') }}"></script>
<div class="custom-layout">
    <div class="row-fluid">
        <h4>HỖ TRỢ KHÁCH HÀNG</h4>
    </div>
    <div class="row-fluid">
        <p style="float:right; margin-top: 40px;">Có tổng cộng: <font color=red><b>{{ $SupportNums }}</b></font> thư hỗ trợ</p>
        <div class="live-search form-row">
            <div class="col-md-4 mb-3 sreachsanpham">
                <label><i class="fas fa-search"></i> Tìm kiếm thư hỗ trợ</label>
                <input type="text" class="form-control" name="timkiem" style="margin-top: 7px;" placeholder="Nhập id, họ tên khách hàng" onkeyup="timkiemtructiep(this.value,'hotro')">
            </div>
            <div class="col-md-6 mb-3 ml-5">
                <label>Thao tác:</label>
                <div style="border: none; margin-top: 7px;">
                    <!-- Button trigger modal -->
                    <button type="button" id="getModal-addFaq" class="btn btn-primary" data-toggle="modal" data-target="#modal_addFaq">
                        Thêm hỗ trợ
                    </button>
                    <!-- Modal add FAQ -->
                    <div class="modal fade" id="modal_addFaq" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="ModalLabel">Thêm câu hỏi thường gặp</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <label for="noidungcauhoi" class="col-sm-2 col-form-label">Câu hỏi: </label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="noidungcauhoi" id="noidungcauhoi" size="40" required>
                                            {{-- <input class="form-control" type="hidden" name="idcauhoi" id="idcauhoi" size="40"> --}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="col-form-label">Giải đáp:</label>
                                        <textarea name="cautraloi" id="cautraloi" required></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer" id="ModalFooter">
                                    <button class="btn btn-primary" id="submit_addFAQ" type="submit" name="submit" >Xác nhận thêm</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>   
                    
                    <button class="btn btn-danger" type="submit" name="xoa" value="Xóa góp ý"> Xóa thư hỗ trợ</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row align-items-top">
        <div class="col-lg-6">
            <div class='card'>
                <div class="card-header font-weight-bold">Yêu cầu hỗ trợ:</div>
                <div class='card-body'>
                    <div class="custom-list-scroll">
                        <table class="table table-fixed">
                            <thead>
                                <tr class='tieude_hienthi_sp'>
                                    <th width="30"><input type="checkbox" name="check"  class="checkbox" onclick="checkall('item', this)"></th>
                                    <th style="width: 35px;">ID</th>
                                    <th style="width: 130px;">Họ và tên</th>
                                    <th style="width: 130px;">Chủ đề</th>
                                    <th style="width: 100px;">Email</th>
                                </tr>
                            </thead>
                            <tbody id="row-sanpham">
                                @foreach ( $Support as $row )
                                <tr class='noidung_hienthi_sp'>
                                    <td class="masp_hienthi_sp"><input type="checkbox" name="id[]" class="item" class="checkbox" value="{{ $row->idhotro }}"/></td>
                                    <td class="masp_hienthi_sp">{{ $row->idhotro }}</td>
                                    <td class="sl_hienthi_sp">{{ $row->hoten }}</td>
                                    <td class="stt_hienthi_sp"><div class="noidungchude">{{ $row->chude }}</div></td>
                                    <td class="sl_hienthi_sp">{{ $row->email }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class='card'>
                <div class="card-header font-weight-bold">Câu hỏi thường gặp:</div>
                <div class='card-body'>
                    <div class="p-1 list-group custom-list-scroll">
                        @foreach ( $FAQ as $row )
                                <div class="m-1 pl-2 p-1 border row list-group-item-action">
                                        <button type="button" class="col-10 nav text-wrap btn btn-link text-secondary getModal-faqDetail" data-toggle="modal" data-target="#faqDetail" value="{{ $row->idcauhoi }}">
                                            {{ $row->noidungcauhoi }}
                                        </button>
                                    <div class="col-1 nav justify-content-center align-middle" style="transform: scale(1.2);">
                                        <button class="btn btn-link getModal-updateFaq" data-toggle="modal" value="{{ $row->idcauhoi }}" ><i class="fa-solid fa-wrench"></i></button>
                                    </div>
                                    <div class="col-1 nav justify-content-center align-middle" style="transform: scale(1.2);">
                                        <button class="btn btn-link getModal-deleteFaq" data-toggle="modal" value="{{ $row->idcauhoi }}"><i class="fa-solid fa-trash text-danger"></i></button>
                                    </div>
                                </div>
                        @endforeach

                        {{-- Modal display FAQ detail --}}
                        <div class="modal fade" id="faqDetail" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="ModalLabel">Câu hỏi: <span id="display-faq-title"></span></h5>
                                  <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body m-1">
                                  <div id="display-faq-answer"></div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="button" class="btn btn-primary" id="submit_addfag">Sửa</button>
                                </div>
                              </div>
                            </div>
                        </div>  

                        {{-- Modal display FAQ delete confirmation --}}
                        <div class="modal fade" id="modal_confirmDeleteFaq" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLongTitle">Xác nhận xóa câu hỏi ?</h5>
                                  <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  Bạn có chắc là muốn xóa câu hỏi không ?
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
                                  <button type="button" class="btn btn-primary" id="submit-confirmDelete">Xác nhận</button>
                                </div>
                              </div>
                            </div>
                          </div>
                    </div>      
                </div>
            </div>
        </div>
    </div>
</div>    
@include('admin.support.FaqDetail')               
<script type="text/javascript">
    // Add CKeditor to "add FAQ in Modal"
    CKEDITOR.replace( 'cautraloi', {
	    uiColor: '#d1d1d1',
        width: '100%',
        height: 300
    });

    // Enable Modal "add FAQ form"
    $('#getModal-addFaq').click (function() {
        $('#modal_addFaq').modal('show');
        $('#ModalLabel').html('Thêm câu hỏi thường gặp');
        $('#ModalFooter').html('<button class="btn btn-primary" id="submit_addFAQ" type="submit" name="submit" >Xác nhận thêm</button>');

        // Perform Ajax add FAQ to database after click submit button
        $('#submit_addFAQ').click (function() {
            var noidungcauhoi = $('#noidungcauhoi').val();
            var cautraloi = CKEDITOR.instances.cautraloi.getData();
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('[name=csrf-token]').attr('content')
                    }
                });
            $.ajax({
                    url: '/phonghap/admin/faq/add/execute',
                    type: 'post',
                    data: { 
                        'noidungcauhoi': noidungcauhoi,
                        'cautraloi': cautraloi
                    },
                    success: function(data) {
                        toastr.success("Thêm FAQ '<b>" + data.noidungcauhoi + "</b>' thành công");
                    },
                    error: function(data) {
                        toastr.error("Thêm FAQ thất bại");
                    }
                });
        });        
    });

    // Perform Ajax get current data and add to UPDATE FAQ modal after click get Modal button
    $('.getModal-updateFaq').click (function() {
        var QuestionID = $(this).val();
        $('#modal_addFaq').modal('show');
        $('#ModalLabel').html('Sửa câu hỏi thường gặp');
        $('#ModalFooter').html('<button class="btn btn-primary" id="submit_updateFAQ" type="submit" name="submit" value="'+ QuestionID +'">Cập nhật</button>');

        // Perform Ajax update FAQ to database after click submit button
        $('#submit_updateFAQ').click (function() {
            var idcauhoi = $(this).val();
            var noidungcauhoi = $('#noidungcauhoi').val();
            var cautraloi = CKEDITOR.instances.cautraloi.getData();
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('[name=csrf-token]').attr('content')
                    }
                });
            $.ajax({
                    url: '/phonghap/admin/faq/update/execute',
                    type: 'post',
                    data: { 
                        'idcauhoi': idcauhoi,
                        'noidungcauhoi': noidungcauhoi,
                        'cautraloi': cautraloi
                    },
                    success: function(data) {
                        toastr.success("Cập nhật FAQ '<b>" + data.noidungcauhoi + "</b>' thành công");
                    },
                    error: function(data) {
                        toastr.error("Cập nhật FAQ thất bại");
                    }
                });
        });        

        $.ajax({
                url: '{{ route('faq-detail') }}',
                type: 'get',
                data: { 
                    'QuestionID': QuestionID
                },
                success: function(data) {
                    CKEDITOR.instances.cautraloi.setData(data.answer);
                    $('#modal_addFaq').find('#noidungcauhoi').val(data.title);
                }
            });
    });

    // Enable visible delete confirm modal
    $('.getModal-deleteFaq').click (function() {
        $('#modal_confirmDeleteFaq').modal('show');
        $('#submit-confirmDelete').val($(this).val());
    });

    // Perform Ajax DELETE FAQ in database after click submit button, include
    $('#submit-confirmDelete').click (function(){
        var faqID = $(this).val();
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('[name=csrf-token]').attr('content')
                }
            });
        $.ajax({
                url: '/phonghap/admin/faq/delete/execute',
                type: 'post',
                data: { 
                    'faqID': faqID
                },
                success: function(data) {
                    toastr.success(data.success);
                },
                error: function(data) {
                    toastr.error("Xóa FAQ thất bại");
                }
            });
    });

    // Enable Modal "FAQ detail pop up" include get data from database
    $('.getModal-faqDetail').click (function() {
        var QuestionID = $(this).val();
        $('#faqDetail').modal('show');
        $.ajax({
                url: '{{ route('faq-detail') }}',
                type: 'get',
                data: { 
                    'QuestionID': QuestionID
                },
                success: function(data) {
                    $('#faqDetail').find('#display-faq-title').html(data.title);
                    $('#faqDetail').find('#display-faq-answer').html(data.answer);
                }
            });
    });
    
</script>
@endsection