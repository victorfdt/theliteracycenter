@extends('layouts.admin')

@section('content')

<h3>Job Opportunity - create</h3>	

<div class="container">
	{!! Form::open(array('route' => 'job/store', 'class' => 'form-horizontal', 'method' => 'post')) !!}

	@include('admin.jobopportunity._form')

	<div class="form-group"> 
		{!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
	</div>

	{!! Form::close() !!}

</div>

<div class="container text-right actionsButton">
	{!! link_to_route('job/index','Back', [], array('class' => 'btn btn-success')) !!}
</div>
@stop