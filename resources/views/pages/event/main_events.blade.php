@extends('layouts.master')
@inject('carbon', 'Carbon\Carbon')
@section('content')

<h1 class="text-center">Main Events</h1>
<br><br>
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
	<?php $panelId = 1 ?>	
	@foreach($events as $event)
		@include('pages.event._displayEvent')
		<br>

	<?php $panelId++ ?>
	@endforeach

	@if(sizeof($events) == 0)
	<p>There is no scheduled event</p>
	@endif
</div>
@stop