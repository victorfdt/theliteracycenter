@extends('layouts.master')
@section('content')

<div class="text-center">
	<h1>Staff</h1>
</div>

<br><br>

@foreach($members as $member)
	@include('pages.about._formDisplay')
@endforeach

@stop



