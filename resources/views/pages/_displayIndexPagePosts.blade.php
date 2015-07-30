<section>
	<header>
		<h2>{{ $post->title }}</h2>
		@if(!empty($post->sub_title))
			<span class="byline">{{$post->sub_title}}</span>
		@endif
		<label class="text-info">{{$post->date}}</label>
	</header>

	@if(!empty($post->path))
		@if($post->image_align == $post::IMAGE_RIGHT)
			{!! HTML::image($post->path, '', array('class' => 'img-rounded post-image-right')) !!}
		@elseif($post->image_align == $post::IMAGE_LEFT)
			{!! HTML::image($post->path, '', array('class' => 'img-rounded post-image-left')) !!}	
		@else
			{!! HTML::image($post->path, '', array('class' => 'img-rounded post-image-center')) !!}
		@endif
	@endif
	<p>{!! $post->content !!}	</p>
</section>