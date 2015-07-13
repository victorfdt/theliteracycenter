@extends('layouts.admin')

@section('content')

<h3>Members - create</h3>	

<div class="container">
	{!! Form::open(array('route' => 'member/store', 'class' => 'form-horizontal', 'method' => 'post', 'files' => 'true')) !!}

	@include('admin.member._form')

	<div class="form-group"> 
		{!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
	</div>

	{!! Form::close() !!}

</div>

<div class="container text-right actionsButton">
	{!! link_to_route('member/index','Back', [], array('class' => 'btn btn-success')) !!}
</div>
@stop