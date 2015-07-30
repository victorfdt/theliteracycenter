@extends('layouts.admin')

@section('content')

<h3>Show - View</h3>	

<br>

<div class="container">
		@include('pages._displayIndexPagePosts')	
</div>


<div class="container text-right actionsButton">
	{!! link_to_route('indexpage/index','Back', [], array('class' => 'btn btn-success')) !!}
</div>
@stop