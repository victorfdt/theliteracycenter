@extends('layouts.admin')

@section('content')

<h3>Create account</h3>	

<div class="container">
	{!! Form::open(array('route' => 'users.store', 'class' => 'form-horizontal', 'method' => 'post')) !!}

	@include('admin.user._form')

	<div class="form-group"> 
		{!! Form::submit('Create account', ['class' => 'btn btn-primary']) !!}
	</div>

	{!! Form::close() !!}

</div>

<div class="container text-right actionsButton">
	{!! link_to_route('users.index','Back', [] ,array('class' => 'btn btn-success')) !!}
</div>
@stop