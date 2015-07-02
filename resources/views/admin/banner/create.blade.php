@extends('layouts.admin')

@section('content')

<h3>Banner's images create</h3>	

<div class="container">
	{!! Form::open(array('route' => 'banners.store', 'class' => 'form-horizontal', 'method' => 'post')) !!}

	@include('admin.banner._form')

	<div class="form-group"> 
		{!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
	</div>

	{!! Form::close() !!}

</div>

<div class="container text-right">
	{!! link_to_route('banners.index','Back', [] ,array('class' => 'btn btn-success')) !!}
</div>
@stop