@extends('layouts.admin')

@section('content')
<div class="container">

	<h1>Accounts</h1>

	<table class="table table-striped">
		<thead>
			<tr>
				<th></th>
				<th>Name</th>
				<th>E-mail</th>
				<th>Role</th>
				<th>Gender</th>
			</tr>
		</thead>
		<tbody>
			@foreach($users as $user)
				<tr>
					<td>{!! Form::radio('$user->id') !!}</td>
					<td>{{ $user->name }}</td>
					<td>{{ $user->email }}</td>					
					<td>{{ $user->role->name }}</td>		
					<td>{{ $user->gender }}</td>							
				</tr>
			@endforeach
		</tbody>
	</table>


</div>

@stop