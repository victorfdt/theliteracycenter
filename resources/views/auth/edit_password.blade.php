@inject('auth','Auth')

@if($auth::user()->isAdmin())
	@extends('layouts.admin')
@if($auth::user()->isVolunteer())
	@extends('layouts.volunteer')
@endif

@section('content')
<h3>Change password</h3>	

<div class="container">

{!! Form::open(array('route' => 'password/update', 'class' => 'form-horizontal', 'method' => 'patch')) !!}

	<!-- PASSWORD -->
	<div class="form-group {{ $errors->has('password') ? 'has-error' : ''}} ">
		<label for="password" class="col-sm-2 control-label">New password</label>
		<div class="col-sm-5">   
			{!! Form::password('password', ['class' => 'form-control']) !!}
			{!! $errors->first('password', '<span class="help-block">:message</span>') !!}
		</div>
	</div>

	<!-- PASSWORD CONFIRMATION -->
	<div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : ''}} ">
		<label for="password_confirmation" class="col-sm-2 control-label">Confirm password</label>
		<div class="col-sm-5">   	
			{!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
			{!! $errors->first('password_confirmation', '<span class="help-block">:message</span>') !!}
		</div>
	</div>

	<!-- SUBMIT BUTTON -->
	{!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}

</div>

{!! Form::close() !!}

</div>

<!-- BACK BUTTON -->
<div class="container text-right">
	<button class="btn btn-success" onClick="function(){ window.history.back(); }">
</div>
@endsection