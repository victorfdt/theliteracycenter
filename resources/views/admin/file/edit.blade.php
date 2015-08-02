@extends('layouts.admin')

@section('content')

</script>
	
	<h3>Files - Update</h3>

	<div class="container">			
		{!! Form::model($file, array('route' => ['file/update', $file->id], 'class' => 'form-horizontal', 'method' => 'PATCH')) !!}

			@include('admin.file._form')

			<div class="form-group"> 
				{!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
			</div>

		{!! Form::close() !!}

	</div>

	<div class="container text-right actionsButton">
		{!! link_to_route('file/index','Back', [] ,array('class' => 'btn btn-success')) !!}
	</div>
@stop