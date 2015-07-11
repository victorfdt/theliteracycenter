@extends('layouts.admin')

@section('content')

</script>
	
	<h3>Images - Update</h3>

	<div class="container">			
		{!! Form::model($image, array('route' => ['image/update', $image->id], 'class' => 'form-horizontal', 'method' => 'PATCH', 'files' => 'true')) !!}

			@include('admin.image._form')

			<div class="form-group"> 
				{!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
			</div>

		{!! Form::close() !!}

	</div>

	<div class="container text-right actionsButton">
		{!! link_to_route('image/index','Back', [] ,array('class' => 'btn btn-success')) !!}
	</div>
@stop