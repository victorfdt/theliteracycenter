@foreach($sideBarImages as $image)
	<div class="row">
		<a href="{{$image->link}}">
			{!! HTML::image($image->path, '', ['class' => 'side_bar_image']) !!}
		</a>
	</div>			
@endforeach


