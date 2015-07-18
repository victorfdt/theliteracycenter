@extends('layouts.admin')

@section('content')

<h3>Wish list - create</h3>	

<div class="container">
	{!! Form::open(array('route' => 'wishlist/store', 'class' => 'form-horizontal', 'method' => 'post')) !!}

	@include('admin.wishlist._form')

	<div class="form-group"> 
		{!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
	</div>

	{!! Form::close() !!}

</div>

<div class="container text-right actionsButton">
	{!! link_to_route('wishlist/index','Back', [], array('class' => 'btn btn-success')) !!}
</div>
@stop