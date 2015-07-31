@extends('layouts.admin')
@inject('carbon', 'Carbon\Carbon')

@section('content')

</script>

<h3>Event - Show</h3>

<div class="container">			
	
	<?php $panelId = 1 ?>
	@include('pages.event._displayEvent')

</div>

<div class="container text-right actionsButton">
	{!! link_to_route('event/index','Back', [] ,array('class' => 'btn btn-success')) !!}
</div>
@stop