@extends('layouts.admin')

@section('content')
<div class="container">
	<h3>Banner's images</h3>		

	<table class="table table-striped" id="usersTable">
		<thead>
			<tr>
				<th></th>
				<th>Image</th>
				<th>Name</th>
				<th>Type</th>
				<th>Order</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			@foreach($banner as $image)
			<tr>
				<td>{!! Form::radio('bannerId', $image->id) !!}</td>				
				<td>{!! HTML::image($image->path, '', array('style' => 'width: 150px; height: 70px; ')) !!}</td>
				<td>{{ $image->name }}</td>
				
				<!-- Type -->
				<td>
					@if ($image->type == $image::MAIN)
					{{'Main page'}}
					@elseif ($image->type == $image::GENERAL)
					{{'General'}}					
					@endif
				</td>
				<td>{{ $image->order }}</td>
				
				<!-- Status -->
				<td>
					@if ($image->active)
					{{'Active'}}
					@else
					{{'Deactivate'}}
					@endif
				</td>								
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

<!-- Buttons -->
<div class="container text-right">

	<button type="button" class="btn btn-success" id="statusButton">Active/Deactivate</button>
	<button type="button" class="btn btn-success" id="deleteButton">Delete</button>	
	<button type="button" class="btn btn-success" id="updateButton">Update</button>	
	{!! link_to_route('banners.create','Create', [] ,array('class' => 'btn btn-success')) !!}

</div>

<!-- Modal -->
@include('sections.modal')

<script>

	/** Load the necessary information. 
		These information are used at admin.js
		*/
		var deletePath = "{{ url('banners/destroy') }}";
		var editPath = "{{ url('banners/edit') }}";
		var statusPath = "{{ url('banners/status') }}";
		var element = "image";
		

</script>

@stop