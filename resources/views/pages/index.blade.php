@extends('layouts.home')

@section('content')
<!-- Main -->
<div id="main" class="container">
	<div class="row">		
		@if(!empty($posts[0]))
			<div class="9u">				
				<?php $post = $posts[0]; ?>
				@include('pages._displayIndexPagePosts')				
			</div>

			<div class="3u">
				@include('sections.index_side_bar')
			</div>
		@endif
		
	</div>
	<div class="row">
		<div class="media 12u">		
			@if(!empty($posts[1]))
				@for($i = 1; $i < sizeof($posts); $i++)
					<?php $post = $posts[$i]; ?>				
					@include('pages._displayIndexPagePosts')
				@endfor
			@endif			
		</div>		
	</div>

</div>
<!-- Main -->

<br><br><br>

<!-- Extra -->
<div id="marketing" class="container">
	<div class="row">
		<div class="4u">
			<section>
				<header>
					<h2>Become a student</h2>
				</header>
				<p class="subtitle">We have all reading and writing leves for all age people.</p>
				<p><a href="{{ url('/student/client') }}"><img src="images/student.png" class="img-rounded"></a></p>
				<a href="{{ url('/student/client') }}" class="button">More</a>
			</section>
		</div>
		<div class="4u">
			<section>
				<header>
					<h2>Newsletter</h2>
				</header>
				<p class="subtitle">Read our newsletter and discover all our new information!</p>
				<p><a href="{{ url('/newsletter/index') }}"><img src="images/newspaper.jpg" class="img-rounded" alt=""></a></p>
				<a href="{{ url('/newsletter/index') }}" class="button">More</a>
			</section>
		</div>
		<div class="4u">
			<section>
				<header>
					<h2>Tutoring</h2>
				</header>
				<p class="subtitle">	Help someone reach his dreams. See how become a tutor.</p>
				<p><a href="{{ url('/volunteer/becomeavolunteer') }}"><img src="images/tutor.png" class="img-rounded" alt=""></a></p>
				<a href="{{ url('/volunteer/becomeavolunteer') }}" class="button">More</a>
			</section>
		</div>					
	</div>
</div>
<!-- /Extra -->



@stop