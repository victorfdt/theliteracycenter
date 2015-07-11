@extends('layouts.admin')

@section('content')
<div class="container">
	<h3>Accounts</h3>		

	<table class="table table-striped" id="usersTable">
		<thead>
			<tr>
				<th></th>
				<th>Name</th>
				<th>Surname</th>
				<th>E-mail</th>
				<th>Role</th>
				<th>Gender</th>
			</tr>
		</thead>
		<tbody>
			@foreach($users as $user)
			<tr>
				<td>{!! Form::radio('userId', $user->id) !!}</td>
				<td>{{ $user->name }}</td>
				<td>{{ $user->surname }}</td>
				<td>{{ $user->email }}</td>					

				<!-- Role -->
				<td>
					@if ($user->role->privilege == $role::ADMIN)
						{{'Administrator'}}
					@elseif ($user->role->privilege == $role::VOLUNTEER)
						{{'Volunteer'}}
					@elseif ($user->role->privilege == $role::USER)
						{{'User'}}
					@endif
				</td>		

				<!-- Gender -->
				<td>
					@if ($user->gender == 'm')
						{{'Male'}}
					@else
						{{'Female'}}
					@endif

				</td>							
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

<!-- Buttons -->
<div class="container text-right actionsButton">
	
	<button type="button" class="btn btn-success" id="deleteButton">Delete</button>	
	<button type="button" class="btn btn-success" id="updateButton">Update</button>	
	{!! link_to_route('users.create','Create', [] ,array('class' => 'btn btn-success')) !!}

</div>

<!-- Modal -->
	@include('sections.modal')

<script>
	/** Load the necessary information. 
		These information are used at admin.js
	 */
	var deletePath = "{{ url('users/destroy') }}";
	var editPath = "{{ url('users/edit') }}";	
	var element = "user";
</script>

@stop