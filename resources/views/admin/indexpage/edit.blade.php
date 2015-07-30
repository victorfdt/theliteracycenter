@extends('layouts.admin')

@section('content')

</script>
	
	<h3>Post - Update</h3>

	<div class="container">			
		{!! Form::model($post, array('route' => ['indexpage/update', $post->id], 'class' => 'form-horizontal', 'method' => 'PATCH', 'files' => 'true')) !!}

			@include('admin.indexpage._form')

			<div class="form-group"> 
				{!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
			</div>

		{!! Form::close() !!}

	</div>

	<div class="container text-right actionsButton">
		{!! link_to_route('indexpage/index','Back', [] ,array('class' => 'btn btn-success')) !!}
	</div>
@stop