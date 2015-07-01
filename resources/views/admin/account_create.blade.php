@extends('layouts.admin')

@section('content')

<h3>Create account</h3>	

<div class="container">
	{!! Form::open(array('route' => 'admin/account/store', 'class' => 'form-horizontal', 'method' => 'post')) !!}

	@include('admin._account_form')

	<div class="form-group"> 
		{!! Form::submit('Create account', ['class' => 'btn btn-primary']) !!}
	</div>

	{!! Form::close() !!}

</div>

<div class="container text-right">
	{!! link_to_route('admin/account','Back', [] ,array('class' => 'btn btn-success')) !!}
</div>
@stop