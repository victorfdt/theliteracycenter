@extends('layouts.admin')

@section('content')

<h3>Wish list - Update</h3>

<div class="container">			
	{!! Form::model($item, array('route' => ['wishlist/update', $item->id], 'class' => 'form-horizontal', 'method' => 'patch')) !!}

	@include('admin.wishlist._form')

	<div class="form-group"> 
		{!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
	</div>

	{!! Form::close() !!}

</div>

<div class="container text-right actionsButton">
	{!! link_to_route('wishlist/index','Back', [] ,array('class' => 'btn btn-success')) !!}
</div>
@stop