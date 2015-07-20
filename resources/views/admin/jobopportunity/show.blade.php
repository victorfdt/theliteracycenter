@extends('layouts.admin')

@section('content')

<h3>Job Opportunity - View</h3>	

<br>

<div class="container">	
	<form class="form-horizontal">
		<!-- NAME -->
		<div class="form-group">
			<label class="col-sm-2 text-right">Name</label>
			<div class="col-sm-5 ">   
				{{ $job->name }}		    
			</div>
		</div>
		
		@include('pages.about._displayJobs')
	</form>
</div>


<div class="container text-right actionsButton">
	{!! link_to_route('job/index','Back', [], array('class' => 'btn btn-success')) !!}
</div>
@stop