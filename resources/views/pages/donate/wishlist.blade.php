@extends('layouts.master')
@section('content')


<h1 class="text-center">Wish list</h1>

<br><br>

<p>Help us donating one of the following items.</p>

<br>

<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
	
	<?php $panelId = 1 ?>
	@foreach($wishlist as $item)
	<div class="panel panel-success">
		<div class="panel-heading" role="tab" id="{{ '#heading' . $panelId }}">
			<h4 class="panel-title">					
				<a role="button" data-toggle="collapse" data-parent="#accordion" href="{{ '#collapse' . $panelId }}" aria-expanded="true" aria-controls="{{ 'collapse' . $panelId }}">
					{{$item->item}}
				</a>
			</h4>
		</div>
		<div id="{{ 'collapse' . $panelId }}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="{{ '#heading' . $panelId }}">
			<div class="panel-body">
				@if(!empty($item->description))
				<p>{{ $item->description }}</p>
				@endif

				<p>Link: {!! HTML::link($item->link, 'Go to product') !!}</p>
				
			</div>
		</div>
	</div>
	<?php $panelId++ ?>
	@endforeach	
</div>

<script type="text/javascript">

$(document).ready(function(){
	$(".collapse").collapse('hide');
});

</script>

@stop