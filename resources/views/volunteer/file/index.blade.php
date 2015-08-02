@extends('layouts.volunteer')

@section('content')

<h3>Files</h3>	

<div class="container">
	
	@foreach($files as $file)
		@include('admin.file._displayFile')
	@endforeach

</div>
@stop