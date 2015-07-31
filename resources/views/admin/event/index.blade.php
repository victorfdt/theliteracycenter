@extends('layouts.admin')
@inject('carbon', 'Carbon\Carbon')

@section('content')
<div class="container">
	<h3>Events</h3>	

	<!-- Error message -->
	@if(Session::has('message'))
		<div class="alert {{ Session::get('alert-class', 'alert-info') }}">
			<label for="name">{{ Session::get('message') }}</label>

		</div>
	@endif

	<table class="table table-striped" id="usersTable">
		<thead>
			<tr>
				<th></th>
				<th>Name</th>
				<th>Date</th>
				<th>Link</th>
			</tr>
		</thead>
		<tbody>
			@foreach($events as $event)
			<tr>
				<td>{!! Form::radio('eventId', $event->id) !!}</td>				
								
				<td>{!! HTML::linkRoute('event/show', $event->name, [$event->id]) !!}</td>

				<?php $dateString = $carbon->createFromFormat('Y-m-d', $event->date)->toFormattedDateString(); ?>
				<td>{{	$dateString }}</td>

				<td>{{	$event->link }}</td>			
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

<!-- Buttons -->
<div class="container text-right actionsButton">

	<button type="button" class="btn btn-success" id="deleteButton">Delete</button>	
	<button type="button" class="btn btn-success" id="updateButton">Update</button>	
	{!! link_to_route('event/create','Create', [] ,array('class' => 'btn btn-success')) !!}

</div>

<!-- Modal -->
@include('sections.modal')

<script>

/** Load the necessary information. 
	These information are used at admin.js
	*/
	var deletePath = "{{ url('event/destroy') }}";
	var editPath = "{{ url('event/edit') }}";
	var element = "event";	

</script>

@stop