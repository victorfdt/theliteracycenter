@extends('layouts.admin')

@section('content')
<div class="container">

	<h1>Accounts</h1>

	<div class="panel panel-primary">
      <div class="panel-heading">Account description</div>
      <div class="panel-body">
      	

      </div>
    </div>

	
	{{$user->name}}


	<div class="container text-right">
	
	{!! link_to_route('admin/account', 'Back') !!}
	
</div>
</div>
@stop