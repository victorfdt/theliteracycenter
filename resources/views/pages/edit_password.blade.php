@extends($auth::user()->isAdmin() ? 'layouts.admin' : 'layouts.volunteer');
@inject('auth', 'Auth')

@section('content')
<h3>Change password</h3>	

<div class="container">

{!! Form::open(array('route' => 'passwordupdate', 'class' => 'form-horizontal', 'method' => 'patch')) !!}

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
	<a class="btn btn-success" href="function(){ history.back(); }">Back</a>
</div>
@endsection