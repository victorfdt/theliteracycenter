@extends('layouts.master')

@section('content')

<div class="container">    
	<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 ">                    
		<div class="panel panel-info" >
			<div class="panel-heading">
				<div class="panel-title">Reset Password</div>
			</div>     

			<!-- Error details -->
			<div style="padding-top:30px" class="panel-body" >
				@if (session('status'))
						<div class="alert alert-success">
							{{ session('status') }}
						</div>
				@endif

				@if (count($errors) > 0)
				<div class="alert alert-danger">
					<strong>Whoops!</strong> There were some problems with your input.<br><br>
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif

				<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>			

				<form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<!-- Email -->
					<div style="margin-bottom: 25px" class="input-group {{ $errors->has('email') ? 'has-error' : ''}} ">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="email">

					</div>	
					<!-- Password -->
					<div style="margin-top:10px" class="form-group">
						<!-- Button -->

						<div class="col-sm-12 controls">							
							{!! Form::submit('Send Password Reset Link', ['class' => 'btn btn-success']) !!}                                      
						</div>
					</div>                                

				</div>                     
			</div>  
		</div>

	</div>




@endsection
