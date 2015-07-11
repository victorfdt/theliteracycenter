<div id="banner">
	<div class="container">	
		@if($banner != null)
			<a href="{{$banner->link}}">
				{!! HTML::image($banner->path, '', array('style' => 'width: 350px;')) !!}
			</a>
		@endif
	</div>
</div>
