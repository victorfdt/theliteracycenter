@extends(Auth::user()->isAdmin() ? 'layouts.admin' : 'layouts.volunteer')
@section('content')

<h3>Monthly Report - View</h3>	

<br>

<div class="container">	
	<form class="form-horizontal">	
		@include('volunteer.monthlyreport._displayReport')
	</form>
</div>


<div class="container text-right actionsButton">
	{!! link_to_route('monthlyreport/index','Back', [], array('class' => 'btn btn-success')) !!}
</div>
@stop