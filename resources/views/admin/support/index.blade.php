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
        <div class="live-search form-row">
            <div class="col-md-4 mb-3 sreachsanpham">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text" ><i class="fa-solid fa-magnifying-glass"></i></div>
                    </div>
                    <input type="text" class="form-control" name="search_support" placeholder="Tìm kiếm theo id hoặc họ tên khách hàng..." />
                    <div id="live_search_result" style="background-color: white;position: fixed;width: 587px;height: auto;max-height: 480px;margin-top: 38px;margin-left: 41px;z-index: 4;overflow: auto;border-radius: 3px;"></div>
                </div>
                
            </div>
            <div class="col-md-4" style="border: none; margin-top: 7px;">
                <!-- Button trigger modal -->
                <button type="button" id="getModal-addFaq" class="btn btn-primary" data-toggle="modal" data-target="#modal_addFaq">
                    Thêm câu hỏi thường gặp
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
    <div class="row align-items-top">
        <div class="col-lg-6">
            <div class='card'>
                <div class="card-header">Yêu cầu hỗ trợ: (Có <b>{{ $SupportNums }}</b> thư hỗ trợ)</div>
                <div class='card-body'>
                    <div class="custom-list-scroll">
                        <table class="table table-fixed table-hover custom-support-table">
                            <thead>
                                <tr class='tieude_hienthi_sp'>
                                    <th style="width: 35px;">ID</th>
                                    <th style="width: 130px;">Họ và tên</th>
                                    <th style="width: 130px;">Chủ đề</th>
                                    <th style="width: 100px;">Email</th>
                                    <th style="width: 100px;"></th>
                                </tr>
                            </thead>
                            <tbody id="row-sanpham">
                                @foreach ( $Support as $row )
                                <tr class='noidung_hienthi_sp  support-row-id-{{ $row->idhotro }}'>
                                    <td class="masp_hienthi_sp getModal-supportDetail" data-value="{{ $row->idhotro }}">{{ $row->idhotro }}</td>
                                    <td class="sl_hienthi_sp getModal-supportDetail" data-value="{{ $row->idhotro }}">{{ $row->hoten }}</td>
                                    <td class="stt_hienthi_sp getModal-supportDetail"  data-value="{{ $row->idhotro }}" style="text-align:left;"><div class="noidungchude">{{ $row->chude }}</div></td>
                                    <td class="sl_hienthi_sp getModal-supportDetail"  data-value="{{ $row->idhotro }}">{{ $row->email }}</td>
                                    <td>
                                            <input id="supportInfo-{{ $row->idhotro }}" value="{{ $row->hoten }}" hidden />
                                            <button class="btn btn-link getModal-confirmDeleteSupport" data-toggle="modal" value="{{ $row->idhotro }}"><i class="fa-solid fa-trash" style="color:red; font-size: 20px;"></i></button>
                                    </td>
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
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
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

                                {{-- SUPPORT MODAL SECTIONS --}}

                        {{-- Modal display letter support delete confirmation --}}
                        <div class="modal fade" id="modal-confirmDeleteSupport" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLongTitle">Xác nhận xóa thư hỗ trợ ?</h5>
                                  <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  Bạn có chắc là muốn thư hỗ trợ của <b><span id="display-user-letter"></span></b> không?
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
                                  <button type="button" class="btn btn-primary" id="submit-confirmDeleteSupport">Xác nhận</button>
                                </div>
                              </div>
                            </div>
                          </div>

                        {{-- Modal display letter support detail --}}
                        <div class="modal fade" id="supportDetail" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xs" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="ModalLabel">Chủ đề: <span id="display-support-title"></span></h5>
                                  <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body m-1">
                                  <div id="display-support-problem"></div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
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

    //SUPPORT LETTER JAVASCRIPT SECTION

    // Enable visible support letter delete confirm modal
       $('.getModal-confirmDeleteSupport').click (function() {
        $('#modal-confirmDeleteSupport').modal('show');
        $('#display-user-letter').html($('#supportInfo-' + $(this).val()).val());
        $('#submit-confirmDeleteSupport').val($(this).val());
    });

    // Perform Ajax DELETE support letter in database after click submit button, include
    $('#submit-confirmDeleteSupport').click (function(){
        var supportID = $(this).val();
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('[name=csrf-token]').attr('content')
                }
            });
        $.ajax({
                url: '/phonghap/admin/support/delete/execute',
                type: 'post',
                data: { 
                    'supportID': supportID
                },
                success: function(data) {
                    toastr.success(data.message);
                    $(".support-row-id-" + supportID).remove();
                },
                error: function(data) {
                    toastr.error("Xóa thư hỗ trợ thất bại");
                }
            });
    });
    
    // Enable Modal "letter support detail pop up" include get data from database
    $('.getModal-supportDetail').click (function() {
        var supportID = $(this).attr('data-value');
        $('#supportDetail').modal('show');
        $.ajax({
                url: '{{ route('support-detail') }}',
                type: 'get',
                data: { 
                    'supportID': supportID
                },
                success: function(data) {
                    $('#display-support-title').html(data.title);
                    $('#display-support-problem').html(data.problem);
                }
            });
    });
    
</script>
@endsection