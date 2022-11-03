@extends('masterlayout')
@section('newsDetail')

@foreach($newsDetail as $row => $newsDetail)
<div class="chitiettintuc">
	<h3>{{$newsDetail->tieude}}</h3>
	<div class="noidungchitiettintuc">
		<img src="{{asset('public/uploads/tintuc/'.$newsDetail->hinhanh)}}" width="200" height="200">
		<p>{{$newsDetail->noidungngan}}</p>
	</div>
	<div class="noidungfull">
		<p>{{print_r($newsDetail->noidungchitiet)}}</p>
		<span>Tác giả: {{$newsDetail->tacgia}}</span>
	</div>
</div>
@endforeach
@endsection