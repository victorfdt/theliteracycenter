@extends(Auth::user()->isAdmin() ? 'layouts.admin' : 'layouts.volunteer')

@section('content')

</script>
	
	<h3>Monthly report - Update</h3>

	<div class="container">			
		{!! Form::model($report, array('route' => ['monthlyreport/update', $report->id], 'class' => 'form-horizontal', 'method' => 'patch')) !!}

			@include('volunteer.monthlyreport._form')

			<div class="form-group"> 
				{!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
			</div>

		{!! Form::close() !!}

	</div>

	<div class="container text-right actionsButton">
		{!! link_to_route('monthlyreport/index','Back', [] ,array('class' => 'btn btn-success')) !!}
	</div>
@stop