@extends('layouts.admin')

@section('content')

</script>
	
	<h3>Event - Update</h3>

	<div class="container">			
		{!! Form::model($event, array('route' => ['event/update', $event->id], 'class' => 'form-horizontal', 'method' => 'PATCH', 'files' => 'true')) !!}

			@include('admin.event._form')

			<div class="form-group"> 
				{!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
			</div>

		{!! Form::close() !!}

	</div>

	<div class="container text-right actionsButton">
		{!! link_to_route('event/index','Back', [] ,array('class' => 'btn btn-success')) !!}
	</div>
@stop