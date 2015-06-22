@extends('layouts.admin')

@section('content')

<div class="container">    
	<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
		<div class="panel panel-info" >
			<div class="panel-heading">
				<div class="panel-title">Sign In</div>
				<div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>
			</div>     

			<div style="padding-top:30px" class="panel-body" >
				<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

				
				

					<div style="margin-bottom: 25px" class="input-group {{ $errors->has('name') ? 'has-error' : ''}} ">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input id="login-email" type="text" class="form-control" name="email" value="" placeholder="email"> 
						{!! $errors->first('email', '<span class="help-block">:message</span>') !!}                                       
					</div>


					<div style="margin-bottom: 25px" class="input-group {{ $errors->has('name') ? 'has-error' : ''}} ">
						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						<input id="login-password" type="password" class="form-control" name="password" placeholder="password">
						{!! $errors->first('password', '<span class="help-block">:message</span>') !!}
					</div>

					<div style="margin-top:10px" class="form-group">
						<!-- Button -->

						<div class="col-sm-12 controls">							
							{!! Form::submit('Login', ['class' => 'btn btn-success']) !!}                                      
						</div>
					</div>                                
				
			</div>                     
		</div>  
	</div>
	
</div>


@stop