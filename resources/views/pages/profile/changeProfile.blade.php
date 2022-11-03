@extends('masterlayout')
@section('changeProfile')


@foreach ($changeProfile as $row => $change)
<form action="index.php?content=doithongtincanhan" method="post" name="frm" style="width: fit-content; margin: auto; margin-top: 4rem">
	<div class="dangky">
		<h3 style="text-align: center; padding-bottom: 15px;">Cập nhật thông tin tài khoản</h3>
		<div class="center-align">
			<div class="form-row">
                <div class="col-md-6 mb-3">
					<label for="tennguoidung">Họ và tên</label>
					<input class="form-control" type="text" name="tennguoidung" size="40" value="{{ $change->tennguoidung }}" onclick="document.getElementById('canhbaotennguoidung').innerHTML=''"><div class='canhbao' id='canhbaotennguoidung'></div>
				</div>
                <div class="col-md-6 mb-3">
					<label for="exampleInputEmail1">Điện thoại</label>
					<input class="form-control" type="text" name="dienthoai" size="40" value="{{ $change->dienthoai }}" onclick="document.getElementById('canhbaodienthoai').innerHTML=''"><div class='canhbao' id='canhbaodienthoai'></div>
				</div>
			</div>
			<div class="form-row">
				<div class="col-md-6 mb-2">
					<label for="exampleInputEmail1">Email</label>
					<input class="form-control" type="text" name="email" size="40" value="{{ $change->email }}" onclick="document.getElementById('canhbaoemail').innerHTML=''"><div class='canhbao' id='canhbaoemail'></div>
				</div>
				<div class="col-md-6 mb-2">
					<label for="exampleInputEmail1">Địa chỉ</label>
					<input class="form-control" value="{{ $change->diachi }}" type="text" name="diachi" size="40">
				</div>
			</div>
            <div class="form-row">
				<div class="col-md-6 mb-3">
					<label for="ngaysinh">Ngày sinh</label>
					<input class="form-control" value="{{ $change->ngaysinh }}" type="date" name="ngaysinh">
				</div>
				<div class="col-md-6 mb-3" style="display: grid">
					<label for="gioitinh">Giới tính</label>
							<select value="{{ $change->gioitinh }}" class="custom-select mr-sm-2" style="width: 190px;" name="gioitinh">
								<option value="">-Chọn giới tính-</option>
								<option value="nam">Nam</option>
								<option value="nu">Nữ</option>
							</select>
				</div>
			</div>
			<div style="margin: auto; width: fit-content; margin-top: 20px;">
				<button class="btn btn-primary" type="submit" name="submitupdate">Cập nhật</button>
				<button class="btn btn-danger" type="reset" style="margin-left: 60px;">Xóa hết</button>
			</div>
		</div>
	</div>
</form>
@endforeach
@endsection