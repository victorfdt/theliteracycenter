@extends('layouts.admin')

@section('content')

</script>
	
	<h3>Update image</h3>

	<div class="container">			
		{!! Form::model($banner, array('route' => ['banners/update', $banner->id], 'class' => 'form-horizontal', 'method' => 'PATCH')) !!}

			@include('admin.banner._form')

			<div class="form-group"> 
				{!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
			</div>

		{!! Form::close() !!}

	</div>

	<div class="container text-right">
		{!! link_to_route('banners.index','Back', [] ,array('class' => 'btn btn-success')) !!}
	</div>
@stop