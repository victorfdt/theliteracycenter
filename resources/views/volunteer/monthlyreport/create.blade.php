@extends(Auth::user()->isAdmin() ? 'layouts.admin' : 'layouts.volunteer')

@section('content')

<h3>Monthly report - create</h3>	

<div class="container">
	{!! Form::open(array('route' => 'monthlyreport/store', 
						 'class' => 'form-horizontal', 
						 'method' => 'post', 
						 'id' => 'reportForm')) !!}

	@include('volunteer.monthlyreport._form')

	<div class="form-group"> 
		{!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
	</div>

	{!! Form::close() !!}

</div>

<div class="container text-right actionsButton">
	{!! link_to_route('monthlyreport/index','Back', [], array('class' => 'btn btn-success')) !!}
</div>
@stop