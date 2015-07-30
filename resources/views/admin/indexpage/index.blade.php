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
				<th>Title</th>
				<th>Date</th>				
				<th>Status</th>				
			</tr>
		</thead>
		<tbody>
			@foreach($posts as $post)
			<tr>
				<td>{!! Form::radio('postId', $post->id) !!}</td>
				<td>{!! HTML::linkRoute('indexpage/show', $post->title, [$post->id]) !!}</td>				
				<td>{{$post->date }}</td>

				<!-- Status -->
				<td>
					@if ($post->status == $post::ONLINE)
						{{'Online'}}
					@elseif ($post->status == $post::OFFLINE)
						{{'Offline'}}					
					@endif
				</td>				
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

<!-- Buttons -->
<div class="container text-right actionsButton">

	<button type="button" class="btn btn-success" id="statusButton">Change status</button>	
	<button type="button" class="btn btn-success" id="deleteButton">Delete</button>	
	<button type="button" class="btn btn-success" id="updateButton">Update</button>	
	{!! link_to_route('indexpage/create','Create', [] ,array('class' => 'btn btn-success')) !!}

</div>

<!-- Modal -->
@include('sections.modal')

<script>

	/** Load the necessary information. 
	These information are used at admin.js
	*/
	var deletePath = "{{ url('indexpage/destroy') }}";
	var editPath = "{{ url('indexpage/edit') }}";
	var statusPath = "{{ url('indexpage/status') }}";
	var element = "post";	

</script>

@stop