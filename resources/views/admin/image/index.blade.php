@extends('layouts.admin')

@section('content')
<div class="container">
	<h3>Images</h3>	

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
				<th class="col-md-1">Link</th>
				<th>Type</th>
				<th>Order</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			@foreach($images as $image)
			<tr>
				<!-- ID -->
				@if($image->type == $image::MAIN_BANNER || $image->type == $image::SIDE_BAR)
					<td>{!! Form::radio('imageId', $image->id) !!}</td>
				@else
					<td><input type="radio" disabled="disabled" /></td>
				@endif
							
				<td>{!! HTML::image($image->path, '', array('style' => 'width: 150px;')) !!}</td>
				<td>{{$image->name }}</td>
				<td>					
					<a href="{{ $image->link }}">Link</a>
				</td>
				
				<!-- Type -->
				<td>
					@if ($image->type == $image::MAIN_BANNER)
						{{'Main page'}}
					@elseif ($image->type == $image::GENERAL_BANNER)
						{{'General'}}
					@elseif ($image->type == $image::SIDE_BAR)
						{{'Side bar'}}
					@elseif ($image->type == $image::LOGO)
						{{'Logo'}}
					@elseif ($image->type == $image::FOOTER)
						{{'Footer'}}										
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
<div class="container text-right actionsButton">

	<button type="button" class	="btn btn-success" id="statusButton">Active/Deactivate</button>
	<button type="button" class="btn btn-success" id="deleteButton">Delete</button>	
	<button type="button" class="btn btn-success" id="updateButton">Update</button>	
	{!! link_to_route('image/create','Create', [] ,array('class' => 'btn btn-success')) !!}

</div>

<!-- Modal -->
@include('sections.modal')

<script>

/** Load the necessary information. 
	These information are used at admin.js
	*/
	var deletePath = "{{ url('image/destroy') }}";
	var editPath = "{{ url('image/edit') }}";
	var statusPath = "{{ url('image/status') }}";
	var element = "image";	

</script>

@stop