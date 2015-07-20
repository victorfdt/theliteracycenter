@extends('layouts.admin')

@section('content')
<div class="container">
	<h3>Members</h3>	

	<!-- Error message -->
	@if(Session::has('message'))
		<div class="alert {{ Session::get('alert-class', 'alert-info') }}">
			<label for="name">{{ Session::get('message') }}</label>

		</div>
	@endif

	<table class="table table-striped">
		<thead>
			<tr>
				<th></th>				
				<th>Name</th>
				<th>Payed</th>
				<th>Function</th>
				<th>Contract</th>				
				<th>Status</th>			
			</tr>
		</thead>
		<tbody>
			@foreach($jobs as $job)
			<tr>
				<td>{!! Form::radio('jobId', $job->id) !!}</td>
				<td>{!! HTML::linkRoute('job/show', $job->name, [$job->id]) !!}</td>
				<td>
					@if ($job->payed == true)
						{{'Yes'}}
					@else
						{{'No'}}					
					@endif
				</td>
				<td>{{ $job->function }}</td>
				<td>
					@if ($job->contract == $job::PART_TIME)
						{{'Part time'}}
					@elseif ($job->contract == $job::FULL_TIME)
						{{'Full time'}}					
					@endif
				</td>				
				<!-- Status -->
				<td>
					@if ($job->active == true)
						{{'Active'}}
					@else
						{{'Deactive'}}					
					@endif
				</td>						
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

<!-- Buttons -->
<div class="container text-right actionsButton">

	<button type="button" class	="btn btn-success" id="statusButton">Active/Deactivate</button>
	<button type="button" class="btn btn-success" id="deleteButton">Delete</button>	
	<button type="button" class="btn btn-success" id="updateButton">Update</button>	
	{!! link_to_route('job/create','Create', [] ,array('class' => 'btn btn-success')) !!}

</div>

<!-- Modal -->
@include('sections.modal')

<script>

/** Load the necessary information. 
	These information are used at admin.js
	*/
	var deletePath = "{{ url('job/destroy') }}";
	var editPath = "{{ url('job/edit') }}";
	var statusPath = "{{ url('job/status') }}";
	var element = "job opportunity";	

</script>

@stop