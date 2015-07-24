@extends('layouts.volunteer')
@inject('monthlyReport', 'App\MonthlyReport')
@inject('auth', 'Auth')

@section('content')
<div class="container">
	<h3>Monthly Reports</h3>	

	<!-- Error message -->
	@if(Session::has('message'))
		<div class="alert {{ Session::get('alert-class', 'alert-info') }}">
			<label for="name">{{ Session::get('message') }}</label>

		</div>
	@endif

	<table class="table table-striped" id="usersTable">
		<thead>
			<tr>
				<th></th>
				<th>Month</th>
				<th>Learner name</th>		
				<th>Status</th>		
			</tr>
		</thead>
		<tbody>
			@foreach($reports as $report)
			@if($auth::user()->isAdmin())
			<tr class="{{ $report->status == $report::FRESH ? 'info' : '' }}">					
				<td>{!! Form::radio('reportId', $report->id) !!}</td>
			@else
			<tr>			
				<!-- ID -->
				@if($report->status == $report::FRESH)
					<td>{!! Form::radio('reportId', $report->id) !!}</td>
				@else
					<td><input type="radio" disabled="disabled" /></td>
				@endif
			@endif
			
				<!-- MONTH with link to show -->
					<?php $monthName = $monthlyReport->getMonthName($report->month) ?>
				<td>{!! HTML::linkRoute('monthlyreport/show', $monthName, [$report->id]) !!}</td>

				<!-- LEARNER NAME -->
				<td>{{ $report->learner_name }}</td>
				<!-- ID -->
				<td>
					@if($report->status == $report::FRESH)
						{{ 'New' }}
					@else
						{{ 'Already read by admin' }}
					@endif
				</td>		
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

<!-- Buttons -->
<div class="container text-right actionsButton">
	
	@if($auth::user()->isAdmin())
		<button type="button" class="btn btn-success" id="statusButton">Change status</button>
		<button type="button" class="btn btn-success" id="deleteButton">Delete</button>		
	@endif
	<button type="button" class="btn btn-success" id="updateButton">Update</button>	
	{!! link_to_route('monthlyreport/create','Create', [] ,array('class' => 'btn btn-success')) !!}

</div>

<!-- Modal -->
@include('sections.modal')

<script>

/** Load the necessary information. 
	These information are used at admin.js
	*/
	var deletePath = "{{ url('monthlyreport/destroy') }}";
	var editPath = "{{ url('monthlyreport/edit') }}";
	var statusPath = "{{ url('monthlyreport/status') }}";
	var element = "report";	

</script>

@stop