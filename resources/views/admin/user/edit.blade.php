@extends('layouts.admin')

@section('content')

</script>
	
	<h3>Update account</h3>

	<div class="container">			
		{!! Form::model($user, array('route' => ['users/update', $user->id], 'class' => 'form-horizontal', 'method' => 'PATCH')) !!}

			@include('admin.user._form')

			<div class="form-group"> 
				{!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
			</div>

		{!! Form::close() !!}

	</div>

	<div class="container text-right">
		{!! link_to_route('users.index','Back', [] ,array('class' => 'btn btn-success')) !!}
	</div>
@stop