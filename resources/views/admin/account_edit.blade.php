@extends('layouts.admin')

@section('content')

</script>
	
	<h3>Update account</h3>

	<div class="container">			
		{!! Form::model($user, array('route' => ['admin/account/update', $user->id], 'class' => 'form-horizontal', 'method' => 'PATCH')) !!}

			@include('admin._account_form')

			<div class="form-group"> 
				{!! Form::submit('Update account', ['class' => 'btn btn-primary']) !!}
			</div>

		{!! Form::close() !!}

	</div>

	<div class="container text-right">
		{!! link_to_route('admin/account','Back', [] ,array('class' => 'btn btn-success')) !!}
	</div>
@stop