<div class="container">    
	<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
		<div class="panel panel-info" >
			<div class="panel-heading">
				<div class="panel-title">Sign In</div>
				<div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="{{ url('/password/email') }}">Forgot password?</a></div>
			</div>     

			<!-- Error details -->
			<div style="padding-top:30px" class="panel-body" >
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

				<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<!-- Email -->
					<div style="margin-bottom: 25px" class="input-group {{ $errors->has('email') ? 'has-error' : ''}} ">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input id="login-email" type="text" class="form-control" name="email" value="" placeholder="email">						                              
					</div>				        

					<!-- Password -->
					<div style="margin-bottom: 25px" class="input-group {{ $errors->has('password') ? 'has-error' : ''}} ">
						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						<input id="login-password" type="password" class="form-control" name="password" placeholder="password">						
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