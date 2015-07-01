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
<div class="container text-right">
	
	<button type="button" class="btn btn-success" id="deleteButton">Delete</button>	
	<button type="button" class="btn btn-success" id="updateButton">Update</button>	
	{!! link_to_route('admin/account/create','Create', [] ,array('class' => 'btn btn-success')) !!}

</div>

<!-- Modal -->
	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog">
			
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title" id="modalHeader"></h4>
				</div>
				<div class="modal-body">
					<p id="modalContent"></p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<a class="btn btn-success" id="confirmDeleteButton" href="{{ url('admin/account/delete') }}">Confirm</a>
					<a class="btn btn-success" id="confirmUpdateButton" href="{{ url('admin/account/edit') }}">Confirm</a>				
				</div>
			</div>
			
		</div>
	</div>

<script>
$(document).ready(function(){

	var deletePath = $("#confirmDeleteButton").attr('href');
	var updatePath = $("#confirmUpdateButton").attr('href');

	function isSelectedUser(){

		var selected = false;
		//Checking if there is a user selected
		if($('table input[type=radio]:checked').length <= 0){
			alert('1');
			//Changing the information on modal
			$("#modalHeader").text("Select an user");
			$("#modalContent").text("You have to select an user!");
			$("#confirmDeleteButton").hide();
			$("#confirmUpdateButton").hide();

			//Show the modal div
			$("#myModal").modal();
		} else {
			selected = true;
		}

		return selected;
	}

	$("#deleteButton").click(function(){

		if(isSelectedUser()){
			//Changing the information on modal
			$("#modalHeader").text("Delete user");
			$("#modalContent").text("Delete user operation.");

			//Setting the delete button with the selected user id		
			var confirmButtonLink = deletePath + '/' + $('table input[type=radio]:checked').val();
			$("#confirmDeleteButton").attr('href', confirmButtonLink);		
			$("#confirmDeleteButton").show();
			$("#confirmUpdateButton").hide();

			//Show the modal div
			$("#myModal").modal();
		}
	});

	$("#updateButton").click(function(){

		if(isSelectedUser()){			
			//Changing the information on modal
			$("#modalHeader").text("Update user");
			$("#modalContent").text("Update user operation.");

			//Setting the delete button with the selected user id		
			var confirmButtonLink = updatePath + '/' + $('table input[type=radio]:checked').val();
			$("#confirmUpdateButton").attr('href', confirmButtonLink);		
			$("#confirmUpdateButton").show();
			$("#confirmDeleteButton").hide();

			//Show the modal div
			$("#myModal").modal();
		}
	});

});
</script>

@stop