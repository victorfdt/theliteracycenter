@extends('layouts.admin')

@section('content')

<h3>Images - create</h3>	

<div class="container">
	{!! Form::open(array('route' => 'image/store', 'class' => 'form-horizontal', 'method' => 'post', 'files' => 'true')) !!}

	@include('admin.image._form')

	<div class="form-group"> 
		{!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
	</div>

	{!! Form::close() !!}

</div>

<div class="container text-right actionsButton">
	{!! link_to_route('image/index','Back', [], array('class' => 'btn btn-success')) !!}
</div>
@stop