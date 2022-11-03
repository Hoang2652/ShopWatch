@extends('masterlayout')
@section('news')

<script language="javascript" type="text/javascript" src="{{asset('public/frontend/js/news.js')}}"></script>
<div class="title__tintuc">
	TIN TỨC MỚI NHẤT
</div>

<div id="tintuc">
<div class="img__tintuc">
	<img src="{{asset('public/uploads/tintuc/Biatintuc.png')}}" alt="">
</div>
	<div class="container__tintuc">
		
        @foreach( $newsByPage as $row => $news)
		<div class="tintuccon">
			<div class="imgtintuc">
				<a href="{{ URL::to('/tintuc/id='.$news->idtintuc) }}">
					<img src="{{asset('public/uploads/tintuc/'.$news->hinhanh)}}" width="450px" height="300px;">
				</a>
			</div>
			<div class="tieudetintuc">
				<!-- <p><a href="index.php?content=chitiettintuc&idtintuc=<</a></p> -->
			</div>
			<div class="post-date">
				<span class="post-date-day">
                    {{ date_format(date_create($news -> created_at),"d") }}
				</span>
				<span class="post-date-month">
                    TH{{ date_format(date_create($news -> created_at),"m") }}
				</span>
			</div>
			<div class="noidungtintuc">
			<p>
				<span> 
                    {{Str::limit($news->noidungngan, 50)}}
				</span>
			</p>
			</div>
		
		</div>
        @endforeach
	</div>
</div>
<div id="phantrang_sp">
    {{  $newsByPage -> appends(request()->all())->links() }}
	</div>
 @endsection