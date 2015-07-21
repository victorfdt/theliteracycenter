@extends('layouts.volunteer')

@section('content')

	<h1>Hello, {{ Auth::user()->name }} </h1>
	<p>Welcome to your administrator page!</p>

@stop