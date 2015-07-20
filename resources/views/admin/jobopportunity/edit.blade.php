@extends('layouts.admin')

@section('content')

</script>
	
	<h3>Job Opportunity - Update</h3>

	<div class="container">			
		{!! Form::model($job, array('route' => ['job/update', $job->id], 'class' => 'form-horizontal', 'method' => 'PATCH')) !!}

			@include('admin.jobopportunity._form')

			<div class="form-group"> 
				{!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
			</div>

		{!! Form::close() !!}

	</div>

	<div class="container text-right actionsButton">
		{!! link_to_route('job/index','Back', [] ,array('class' => 'btn btn-success')) !!}
	</div>
@stop