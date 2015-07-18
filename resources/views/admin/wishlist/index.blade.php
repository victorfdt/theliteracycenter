@extends('layouts.admin')

@section('content')
<div class="container">
	<h3>Wish List</h3>	

	<!-- Error message -->
	@if(Session::has('message'))
		<div class="alert {{ Session::get('alert-class', 'alert-info') }}">
			<label for="name">{{ Session::get('message') }}</label>

		</div>
	@endif

	<table class="table table-striped">
		<thead>
			<tr>
				<th></th>
				<th>Item</th>
				<th>Link</th>
				<th>Description</th>				
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			@foreach($wishlist as $item)
			<tr>
				<td>{!! Form::radio('itemId', $item->id) !!}</td>	
				<td>{{ $item->item }}</td>
				<td>{!! HTML::link($item->link) !!}</td>
				<td>{{ $item->description }}</td>		
				
				<!-- Status -->
				<td>
					@if ($item->active == true)
						{{'Active'}}
					@else
						{{'Deactive'}}					
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
	{!! link_to_route('wishlist/create','Create', [] ,array('class' => 'btn btn-success')) !!}

</div>

<!-- Modal -->
@include('sections.modal')

<script>

/** Load the necessary information. 
	These information are used at admin.js
	*/
	var deletePath = "{{ url('wishlist/destroy') }}";
	var editPath = "{{ url('wishlist/edit') }}";
	var statusPath = "{{ url('wishlist/status') }}";
	var element = "item";

</script>

@stop