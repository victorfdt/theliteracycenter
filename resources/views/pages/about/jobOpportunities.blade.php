@extends('layouts.master')
@section('content')

<h1 class="text-center">Job Opportunities</h1>
<br><br>

<p>
	To apply for any of the following opportunities, send us an e-mail specifying the 
	job which you are intested.
</p>
<p>
	{!! HTML::mailto('assistance@litcenter.org', 'Click here to send the e-mail.') !!}
</p>

<br><br>
<form class="form-horizontal">
	@foreach($jobs as $job)
		<h3>{{ $job->name }}</h3>
		@include('pages.about._displayJobs')

		<br><br>	
	@endforeach
</form> 

@stop