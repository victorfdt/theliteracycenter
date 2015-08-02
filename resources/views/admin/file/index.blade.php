@extends('layouts.admin')

@section('content')
<div class="container">
	<h3>Files</h3>	

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
				<th>Name</th>
				<th>Link</th>				
				<th class="col-sm-3">Description</th>
				<th>Type</th>
			</tr>
		</thead>
		<tbody>
			@foreach($files as $file)
			<tr>
				<td>{!! Form::radio('fileId', $file->id) !!}</td>	
				<td>{{$file->name }}</td>
				<td>{!! HTML::link($file->link, 'Open the link') !!}</td>
				<td>{{$file->description }}</td>

				<!-- Type -->
				<td>
					@if ($file->type == $file::NEWSLETTER)
						{{'Newsletter'}}
					@elseif ($file->type == $file::VOLUNTEER)
						{{'Volunteer'}}					
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
	{!! link_to_route('file/create','Create', [] ,array('class' => 'btn btn-success')) !!}

</div>

<!-- Modal -->
@include('sections.modal')

<script>

/** Load the necessary information. 
	These information are used at admin.js
	*/
	var deletePath = "{{ url('file/destroy') }}";
	var editPath = "{{ url('file/edit') }}";
	var element = "file";	

</script>

@stop