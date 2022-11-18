@extends('masterlayout')
@section('support')

<div class="hotro">
	<div class="header__hotro">
		<div class="title__hotro">Xin chào, Chúng tôi có thể giúp gì cho bạn?</div>
		<div class="customAssist">
			<input class="search__hotro" type="text" name="timkiem" style="float: left;" placeholder="Nhập từ khóa hoặc nội dung cần tìm"/>
			
			<button type="submit" name="btntk" value="Tìm kiếm" class="icon__search_hotro" width="50px" height="50px">
						<i class='bx bx-search'></i>
			</button>
		</div>
		<div id="list-search-hotro"></div>
	</div>
	<div class="body__hotro">
		<div class="title__list-question">
			Câu hỏi thường gặp
		</div>
		<ul class="list-group list-group-flush" id="danhsachhotro">
            @foreach($FAQ as $row => $FAQ)
				<a href="{{ URL::to('/hotro/id='.$FAQ->idcauhoi) }}"><li class="list-question">{{$FAQ->noidungcauhoi}}</li></a>
			@endforeach
		</ul>
	</div>
	<form action="{{ URL::to('/sent-support') }}" method="post" name="frm" onsubmit="return kiemtraform()" class="form__hotro">
		{{ csrf_field() }}
		<div id="hotro">
			<h3 style="text-align: center; padding-bottom: 15px;">Gửi Hỗ Trợ</h3>
			<div>
				<div class="form-row">
					<div class="col-md-4 mb-2">
						<label for="hoten">Họ tên</label>
						<input class="form-control @error('hoten') is-invalid @enderror" type="text" name="hoten" size="40" value="">
						@error('hoten')
					        <span class='invalid-feedback'>{{ $message }}</span>
				        @enderror
					</div>
					<div class="col-md-4 mb-2">
						<label for="email">Email</label>
						<input class="form-control @error('email') is-invalid @enderror" type="text" name="email" size="40" value="">
						@error('email')
					        <span class='invalid-feedback'>{{ $message }}</span>
				        @enderror
					</div>
					<div class="col-md-4 mb-2">
						<label for="dienthoai">Điện thoại </label>
						<input class="form-control @error('dienthoai') is-invalid @enderror" type="text" name="dienthoai" size="40" value="" >
						@error('dienthoai')
					        <span class='invalid-feedback'>{{ $message }}</span>
				        @enderror
					</div>
				</div>
				<div class="form-group mb-4">
					<label for="chude">Chủ đề:</label>
					<input class="form-control @error('chude') is-invalid @enderror" type="text" name="chude" size="40">
					@error('chude')
					    <span class='invalid-feedback'>{{ $message }}</span>
				    @enderror
				</div>
				<div class="form-group">
					<label for="chude">Nội dung</label>
					<textarea class="form-control @error('noidung') is-invalid @enderror" style="height: 160px;" size="300" name="noidung" placeholder="Nhập không quá 400 ký tự..."></textarea>
					@error('noidung')
					    <span class='invalid-feedback'>{{ $message }}</span>
				    @enderror
				</div>
				<div style="max-width: 900px;width: fit-content;height: fit-content;margin: 0 auto;font-style: italic;color: #808080;font-size: 12px;">"Nếu quý khách có thắc mắc, góp ý cần được hỗ trợ có thể gửi thư hỗ trợ tới chúng tôi, chúng tôi sẽ trả lời qua email một cách sớm nhất"</div>
				<div class="form-group">
					<div colspan=2 style="text-align: center;">
						<button type="submit" name="submit" value="GỬI" class="btn btn-primary" style="padding: 8px 15px; margin-top: 40px;">GỬI</button>
						<button type="reset" value="HỦY"  class="btn btn-danger" style="padding: 8px 15px;margin-left: 75px;margin-top: 40px;">XÓA HẾT</button>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
<script>
$('.search__hotro').keyup(function(){
    var query= $(this).val();
    if(query.toString().length == 0){
        document.getElementById("list-search-hotro").innerHTML = "";
        return;
    }
    else{
        $.ajax({
        url:"{{ route('search_support')}}",
        type:"GET",
        data:{'search':query},
        success:function(data){
            $('#list-search-hotro').html(data);
        }
        }); 
    }
});
</script>
 @endsection