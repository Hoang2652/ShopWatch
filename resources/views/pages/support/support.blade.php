@extends('masterlayout')
@section('support')

<div class="hotro">
	<div class="header__hotro">
		<div class="title__hotro">Xin chào, Chúng tôi có thể giúp gì cho bạn?</div>
		<div class="customAssist">
			<input class="search__hotro" type="text" name="timkiem" style="float: left;" onkeyup="livesreachhotro(this.value)" placeholder="Nhập từ khóa hoặc nội dung cần tìm"/>
			
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
	<form action="insert_hotro.php" method="post" name="frm" onsubmit="return kiemtraform()" class="form__hotro">
		<div id="hotro">
			<h3 style="text-align: center; padding-bottom: 15px;">Gửi Hỗ Trợ</h3>
			<div>
				<div class="form-row">
					<div class="col-md-4 mb-2">
						<label for="hoten">Họ tên</label>
						<input class="form-control" type="text" name="hoten" size="40" value="" onclick="document.getElementById('canhbaohoten').innerHTML=''"><div class='canhbao' id='canhbaohoten'></div>
					</div>
					<div class="col-md-4 mb-2">
						<label for="email">Email</label>
						<input class="form-control" type="text" name="email" size="40" value="" onclick="document.getElementById('canhbaoemail').innerHTML=''"><div class='canhbao' id='canhbaoemail'></div>
					</div>
					<div class="col-md-4 mb-2">
						<label for="dienthoai">Điện thoại </label>
						<input class="form-control" type="text" name="dienthoai" size="40" value="" onclick="document.getElementById('canhbaodienthoai').innerHTML=''"><div class='canhbao' id='canhbaodienthoai'></div>
					</div>
				</div>
				<div class="form-group mb-4">
					<label for="chude">Chủ đề:</label>
					<input class="form-control" type="text" name="chude" size="40" onclick="document.getElementById('canhbaochude').innerHTML=''"><div class='canhbao' id='canhbaochude'></div>
				</div>
				<div class="form-group">
					<label for="chude">Nội dung</label>
					<textarea class="form-control" style="height: 160px;" size="300" name="noidung" onclick="document.getElementById('canhbaonoidung').innerHTML=''" placeholder="Nhập không quá 400 ký tự..."></textarea><div class='canhbao' id='canhbaonoidung'></div>
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

<script language="javascript">
 	function  kiemtraform()
	{
		var error=0;

	    if(frm.chude.value=="")
		{
			document.getElementById('canhbaochude').innerHTML="Bạn chưa nhập chủ đề. Vui lòng kiểm tra lại";
			error++;
		}

		if(frm.hoten.value=="")
	 	{
			document.getElementById('canhbaohoten').innerHTML="Bạn chưa nhập họ tên . Vui lòng kiểm tra lại";
			error++;
		}

		if(frm.noidung.value=="")
		{
			document.getElementById('canhbaonoidung').innerHTML="Bạn chưa nhập nội dung. Vui lòng kiểm tra lại";
			error++;
		} else if(frm.noidung.value.length>300) {
			document.getElementById('canhbaonoidung').innerHTML="Nội dung không quá 300 ký tự";	
			error++;
		}

	   dt=/^[0-9]+$/;
	   dienthoai=frm.dienthoai.value;
	   if(frm.dienthoai.value=="")
	   {
			document.getElementById('canhbaodienthoai').innerHTML="Bạn chưa nhập số điện thoại. Vui lòng kiểm tra lại";
			error++;
	   } else if(!dt.test(dienthoai)){
			document.getElementById('canhbaodienthoai').innerHTML="Số điện thoại không hợp lệ";
			error++;
	   } else {
		    dd=frm.dienthoai.value;
			if(10>dd.length || dd.length>11)
			{
				document.getElementById('canhbaodienthoai').innerHTML="Số điện thoại không đủ độ dài. Vui lòng nhập lại";
				error++;
			}
	   }

		if(frm.email.value=="")
		{
			document.getElementById('canhbaoemail').innerHTML="Bạn chưa nhập email. Vui lòng nhập lại";	
			error++;
		} else {
			mail=frm.email.value;
			m=/^([A-z0-9])+[@][a-z]+[.][a-z]+[.]*([a-z]+)*$/;
			if(!m.test(mail))
			{
				document.getElementById('canhbaoemail').innerHTML="Email không hợp lệ";	
				error++;
			}
		}

		if(error!=0)
		{
			alert("Góp ý không hợp lệ");
			return false;
		}
	}
 </script>
 @endsection