@extends('masterlayout')
@section('changeProfile')


@foreach ($changeProfile as $row => $change)
<form action="{{ URL::to('/thongtincanhan/change-profile') }}" method="post" name="frm" style="width: fit-content; margin: auto; margin-top: 4rem">
	{{ csrf_field() }}
	<div class="dangky">
		<h3 style="text-align: center; padding-bottom: 15px;">Cập nhật thông tin tài khoản</h3>
		<div class="center-align">
			<div class="form-row">
                <div class="col-md-6 mb-3">
					<label for="tennguoidung">Họ và tên</label>
					<input class="form-control @error('tennguoidung') is-invalid @enderror" type="text" name="tennguoidung" size="40" value="{{ $change->tennguoidung }}">
					@error('tennguoidung')
						<span class='invalid-feedback'>{{ $message }}</span>
					@enderror
				</div>
                <div class="col-md-6 mb-3">
					<label for="exampleInputEmail1">Điện thoại</label>
					<input class="form-control @error('dienthoai') is-invalid @enderror" type="text" name="dienthoai" size="40" value="{{ $change->dienthoai }}">
					@error('dienthoai')
						<span class='invalid-feedback'>{{ $message }}</span>
					@enderror
				</div>
			</div>
			<div class="form-row">
				<div class="col-md-6 mb-2">
					<label for="exampleInputEmail1">Email</label>
					<input class="form-control @error('email') is-invalid @enderror" type="text" name="email" size="40" value="{{ $change->email }}">
					@error('email')
						<span class='invalid-feedback'>{{ $message }}</span>
					@enderror
				</div>
				<div class="col-md-6 mb-2">
					<label for="exampleInputEmail1">Địa chỉ</label>
					<input class="form-control @error('diachi') is-invalid @enderror" value="{{ $change->diachi }}" type="text" name="diachi" size="40">
					@error('diachi')
						<span class='invalid-feedback'>{{ $message }}</span>
					@enderror
				</div>
			</div>
            <div class="form-row">
				<div class="col-md-6 mb-3">
					<label for="ngaysinh">Ngày sinh</label>
					<input class="form-control @error('date') is-invalid @enderror" value="{{ $change->ngaysinh }}" type="date" name="ngaysinh">
					@error('date')
						<span class='invalid-feedback'>{{ $message }}</span>
					@enderror
				</div>
				<div class="col-md-6 mb-3" style="display: grid">
					<label for="gioitinh">Giới tính</label>
					<select class="custom-select mr-sm-2 @error('gioitinh') is-invalid @enderror" style="width: 190px;" name="gioitinh">
						<option value="">-Chọn giới tính-</option>
						<option value="nam" @if($change->gioitinh == "nam") selected @endif>Nam</option>
						<option value="nu" @if($change->gioitinh == "nu") selected @endif>Nữ</option>
						<option value="bede" @if($change->gioitinh == "bede") selected @endif>khác...</option>
					</select>
					@error('gioitinh')
						<span class='invalid-feedback'>{{ $message }}</span>
					@enderror
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