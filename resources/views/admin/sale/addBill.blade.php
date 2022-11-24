@extends('admin_masterlayout')
@section('addBill')
<link rel="stylesheet" href="{{ asset('public/backend/css/hienthi_sp.css') }}" /> 
<div class="sale-container">
    <div class="row">
        <div class="col-md-8">
            <div class="card m-1">
                <div class="card-body row">
                    <div class="col-sm-5 row">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></div>
                            </div>
                            <input class="form-control" id="searchKeyword" name="searchKeyword" placeholder="Nhập id hoặc tên ...." />
                        </div>
                        </div>
                        <div class="col-sm-3">
                            <select class='custom-select mr-sm-2' style='width: 190px;' name='loaisanpham' id="loaisanpham">
                                <option value="">Chọn loại</option>
                                @foreach ($productType as $cate)
                                    <option value="{{ $cate->iddanhmuc }}">{{ $cate->tendanhmuc }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <select class="custom-select mr-sm-2" style="width: 190px;" name="iddanhmuc" id="iddanhmuc">
                                <option value="">Chọn thương hiệu</option>
                                @foreach ($productBrand as $cate2)
                                    <option value="{{ $cate2->iddanhmuc }}">{{ $cate2->tendanhmuc }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-1">
                            <button class="btn btn-primary" id="productFilter">Lọc</button>
                        </div>
                </div>
            </div>
            <div class="card m-1" style="height: 500px;">
                <div class="card-header">Danh sách sản phẩm (Có <b><span id="productNums"></span></b> sản phẩm)</div>
                <div class="card-body float-left"  style="height: 450px; overflow: auto;" id="display_productList">
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card custom-cart-list">
                <div class="card-header"><i class="fa-solid fa-cart-shopping"></i> Danh sách mua hàng</div>
                <div class="card-body"  style="height: 470px; overflow: auto; padding: 0px;">
                    <table class="table table-sm" id="cart-table-content">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Giá tiền</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody id="display_cartList">
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="container-fluid m-2 text-right">
                    Tổng cộng: <span id="paste-total-here" class="font-weight-bold"> 0 </span> VNĐ
                </div>
                <button class="getModal-checkoutConfirm m-4 btn btn-success">
                    Thanh toán
                </button>
            </div>
            <div class="modal fade" id="checkoutConfirm" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="ModalLabel">XÁC NHẬN THÔNG TIN THANH TOÁN</h5>
                      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="{{ URL::to('/sale/addBill') }}" method="POST" id="a" class="form__thanhtoan">
                        <div class="modal-body m-1 row">
                            <div class="col-sm-4">
                                {{ csrf_field() }}
                                <div class="form-group" style="width:100%; ">
                                    <h6 style="text-align:center; font-weight: bold;">Thông tin người mua</h6>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa-solid fa-user-tie"></i></div>
                                        </div>
                                        <input type="text" class="form-control @error('hoten') is-invalid @enderror" name="hoten" placeholder="Nhập tên khách hàng..." required/>
                                            @error('hoten')
                                                <span class='invalid-feedback'>{{ $message }}</span>
                                            @enderror
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa-solid fa-location-dot"></i></div>
                                        </div>
                                        <input type="text" class="form-control @error('diachi') is-invalid @enderror" name="diachi" placeholder="Nhập địa chỉ..." required/>
                                            @error('diachi')
                                                <span class='invalid-feedback'>{{ $message }}</span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa-solid fa-phone"></i></div>
                                        </div>
                                        <input type="text" class="form-control  @error('dienthoai') is-invalid @enderror" name="dienthoai" placeholder="Nhập số điện thoại..." required/>
                                            @error('dienthoai')
                                                <span class='invalid-feedback'>{{ $message }}</span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">@</div>
                                        </div>
                                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Nhập email..." required/>
                                            @error('email')
                                                <span class='invalid-feedback'>{{ $message }}</span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="form-group pb-4">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa-solid fa-money-bill"></i></div>
                                        </div>
                                        <select class="custom-select @error('phuongthuc') is-invalid @enderror" name="phuongthuc" style="height: 35px;" required>
                                            <option value="">Phương thức thanh toán</option>
                                            <option value="Thanh toán online">Thanh toán online</option>
                                            <option value="Thanh toán khi giao hàng">Thanh toán khi giao hàng</option>
                                        </select>
                                        @error('phuongthuc')
                                            <span class='invalid-feedback'>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div style="width: fit-content; margin: 0 auto;"><button class="btn btn-primary" type="submit" value="Đặt hàng">Xác nhận đặt hàng</button></div>
                          </div>
                          <div class="col-sm-8">
                                <h4>WEBSITE BÁN ĐỒNG HỒ TRỰC TUYẾN PHONG HẤP</h4>
                                <ul style='text-align: left;'>
                                    <li>Địa chỉ: Đăng Văn Ngữ - Phú Nhuận - Thành phố Hồ Chí Minh</li>
                                    <li>Di Động: 0938909944</li>
                                    <li>Email: phonghap@gmail.com</li>
                                    <li>Nhân viên: Hoàng Ezz</li>
                                </ul>
                                <div class='' style="border-bottom: black 1px solid;"></div>
                                    <table id="paste-table-here">
                                    </table>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
                    </div>
                  </div>
                </div>
            </div>  
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var count = 0;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('[name=csrf-token]').attr('content')
            }
        });

        // function add click event to Activate functions
        $('#productFilter').click(function(event) {
            ajaxGetProduct();
        });
    

        // aditional functions
        function addToCart(input){
            var idsanpham = input;
            $.ajax({
                url: '{{ route('product-detail-ajax') }}',
                type: 'get',
                data: { 
                    'idsanpham': idsanpham
                },
                beforeSend: function() {
                    $('#row-sanpham').html("<h4>Đang xử lý...</h4>");
                },
                success: function(data) {
                    $('#display_cartList').append(product_card_row(data.result));
                    $('#paste-total-here').text(parseInt($('#paste-total-here').text()) + (data.result.gia * (100-data.result.giamgia)/100));
                    $(".remove_fromcart").click(function(event) {
                        var target = "#" + $(this).val();
                        $(target).remove();
                    });
                }
            });
        }

        $('.getModal-checkoutConfirm').click (function() {
            var QuestionID = $(this).val();
            var cartTable = $("#cart-table-content").html();
            var cartTotal = $("#paste-total-here").html();
            $('#checkoutConfirm').modal('show');
            $('#paste-table-here').html(cartTable);
            $('#paste-table-here').append(`<tfoot><th colspan='4' style="text-align: right;">Tổng cộng: ` + cartTotal + `VNĐ</th></tfoot>`);
        });

        function product_card_row(result){
            count++;
            var row = result;
            var discountPriceHtml = row.gia.toLocaleString(undefined) + ` VNĐ`;
            var discountNote = '';
            var giftHtml = "";
            if(row.giamgia > 0){
                discountPriceHtml = `<span style="text-decoration: line-through; color: grey">` + row.gia.toLocaleString(undefined) + ` VNĐ</span> ` + (row.gia * (100 - row.giamgia)/100).toLocaleString(undefined) + ` VNĐ` + `<div>Giảm: ` + row.giamgia + `% </div>`;
                // discountNote = `<tr id="row_action` + count + `"><td colspan='4'>Giảm: ` + row.giamgia + `%</td></tr>`;
            }

            if(row.tenquatang){
                giftHtml = `<tr id="row_action` + count + `"><td colspan='4'>Quà tặng: ` + row.quatang + `</td></tr>`;
            }
            var htmlView = `   
                <tr id="row_action` + count + `"> 
                    <td class="row-tensanpham">` + row.tensanpham + `</td>
                    <td class="row-giatien">` + discountPriceHtml + `</td>
                    <td>
                        <input name="product[` + count + `][]" type='number' value='1' min='1' max='5'/>
                        <input name="product[` + count + `][]" value="` + row.idsanpham + `" hidden/>
                        <input name="product[` + count + `][]" value="` + row.tensanpham + `" hidden/>
                        <input name="product[` + count + `][]" value="` + row.gia + `" hidden/>
                        <input name="product[` + count + `][]" value="` + row.giamgia + `" hidden/>
                        <input name="product[` + count + `][]" value="` + row.quatang + `" hidden/>
                    </td>
                    <td><button class="remove_fromcart" value="row_action` + count + `"><i class="fa-solid fa-trash iconBig"></i></button></td>
                </tr>` + giftHtml + discountNote;
            return htmlView;
        }

        //called function to run once after fully load page
        ajaxGetProduct();
        function ajaxGetProduct(){
            var searchKeyword = $('#searchKeyword').val();
            var productType = $('#loaisanpham').val();
            var productBrand = $('#iddanhmuc').val();
            $.ajax({
                url: '{{ route('product-live-sreach') }}',
                type: 'get',
                data: { 
                    'searchKeyword': searchKeyword,
                    'productType': productType,
                    'productBrand': productBrand
                },
                beforeSend: function() {
                    $('#row-sanpham').html("<h4>Không có kết quả theo yêu cầu</h4>");
                },
                success: function(data) {
                    $('#productNums').text(data.total_row);
                    $('#display_productList').html(product_record_print(data.table_row));
                    $('.add-to-cart').click(function(event) {
                        var idsanpham = $(this).val();
                        addToCart(idsanpham);
                    });
                }
            });
        }


        function product_record_print(result) {
            var htmlView = '';
            var html = '';
            if (result.length <= 0) {
                htmlView += `<h4>Không có kết quả theo yêu cầu</h4>`;
            } else {
                for (var row of result) {
                    var khuyenmaiHtml = ``;
                    var displayGiaHtml = ``;
                    if(row.giamgia > 0){
                        khuyenmaiHtml = `<div class="card-tag"> -`+ row.giamgia +`%</div>`;
                        displayGiaHtml = `                                    
                                    <h4 style="text-decoration: line-through; color: grey">`+ row.gia.toLocaleString(undefined) +` VNĐ</h4> 
                                    <h4>
                                        <i class="fa-solid fa-hand-point-right"></i>
                                        `+ (row.gia * (100- row.giamgia)/100).toLocaleString(undefined) +` VNĐ
                                    </h4> `;
                    } else {
                        displayGiaHtml = `<h4>`+ row.gia.toLocaleString(undefined) +` VNĐ</h4> `;
                    }

                    htmlView += `<button class="custom-sale-product card add-to-cart" value="`+ row.idsanpham +`">
                                    ` + khuyenmaiHtml + `
                                    <img class="card-img-top" src="{{asset('public/uploads/products/`+ row.hinhanh +`')}}">				
                                    <p>`+ row.tensanpham +`</p>
                                    ` + displayGiaHtml + `
                                </button>`;
                };
            }

            return htmlView;
        }
    });
</script>
@endsection