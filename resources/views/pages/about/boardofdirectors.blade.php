@extends('layouts.master')
@section('content')

<div class="text-center">
	<h1>Board of directors</h1>
</div>

<br><br>

<p><strong>Board of Directors 2015-2016</strong></p>

<br>

@foreach($members as $member)
	@include('pages.about._displayMembers')
@endforeach

@stop



