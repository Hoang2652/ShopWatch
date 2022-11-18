@extends('masterlayout')
@section('spDetail')

@foreach($view as $row => $view)
<div class="chitiettintuc">
	<h3>{{$view->noidungcauhoi}}</h3>
	<div class="cautraloi">
		<p>{!! $view->cautraloi !!}</p>
	</div>
</div>
@endforeach
@endsection
