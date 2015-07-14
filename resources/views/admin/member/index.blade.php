@extends('layouts.admin')

@section('content')
<div class="container">
	<h3>Members</h3>	

	<!-- Error message -->
	@if(Session::has('message'))
		<div class="alert {{ Session::get('alert-class', 'alert-info') }}">
			<label for="name">{{ Session::get('message') }}</label>

		</div>
	@endif

	<table class="table table-striped" id="usersTable">
		<thead>
			<tr>
				<th></th>
				<th>Image</th>
				<th>Name</th>
				<th>Email</th>				
				<th>Phone</th>
				<th>Description</th>
				<th>Order</th>
				<th>Position</th>
				<th>Type</th>
			</tr>
		</thead>
		<tbody>
			@foreach($members as $member)
			<tr>
				<td>{!! Form::radio('memberId', $member->id) !!}</td>				
				<td>{!! HTML::image($member->path, '', array('style' => 'width: 150px; ')) !!}</td>
				<td>{{$member->name }}</td>
				<td>{{$member->email }}</td>
				<td>{{$member->phone }}</td>
				<td>{{$member->description }}</td>
				<td>{{$member->order }}</td>
				<td>{{$member->position }}</td>
				<!-- Type -->
				<td>
					@if ($member->type == $member::STAFF)
						{{'Staff'}}
					@elseif ($member->type == $member::BOARD_DIRECTOR)
						{{'Board Director'}}					
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
	{!! link_to_route('member/create','Create', [] ,array('class' => 'btn btn-success')) !!}

</div>

<!-- Modal -->
@include('sections.modal')

<script>

/** Load the necessary information. 
	These information are used at admin.js
	*/
	var deletePath = "{{ url('member/destroy') }}";
	var editPath = "{{ url('member/edit') }}";
	var element = "member";	

</script>

@stop