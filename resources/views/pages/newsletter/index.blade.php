@extends('layouts.master')
@section('content')

<div class="text-center">
	<h1>Newsletter</h1>
</div>

<br><br>

@foreach($files as $file)
	@include('admin.file._displayFile')
@endforeach

@stop



