@extends('masterlayout')
@section('changePassword')
<div id="dangnhap-in">
	<form class="dangky" action="{{ URL::to('/thongtincanhan/change-password') }}" method="post" name="frm" style="width: 500px;margin: auto;margin-top: 4rem;">
		{{ csrf_field() }}
		<b><h3 style="text-align: center">Đổi mật khẩu</h3></b>
		<div class="form-group pr-4">
			<label for="CustomerID">Nhập mật khẩu cũ:</label>
			<input class="form-control @error('oldpassword') is-invalid @enderror" type="password" name="oldpassword" maxlength="20" >
			@error('oldpassword')
				<span class='invalid-feedback'>{{ $message }}</span>
			@enderror
		</div>
		<div class="form-group pr-4">
			<label for="Password">Nhập mật khẩu mới: </label>
			<input class="form-control @error('newpassword') is-invalid @enderror" type="password" name="newpassword" size="20" >
			@error('newpassword')
				<span class='invalid-feedback'>{{ $message }}</span>
			@enderror
		</div>
        <div class="form-group pr-4">
			<label for="retypePassword">Nhập lại mật khẩu: </label>
			<input class="form-control @error('retypenewpassword') is-invalid @enderror" type="password" name="retypenewpassword" size="20" >
			@error('retypenewpassword')
				<span class='invalid-feedback'>{{ $message }}</span>
			@enderror
		</div>
		<div style="width: fit-content; margin: 15px auto;"><a><button name="changepassword" class="btn btn-primary">Đổi mật khẩu</button></a></div>
	</form>
</div>

@endsection