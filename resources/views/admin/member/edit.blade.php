@extends('layouts.admin')

@section('content')

</script>
	
	<h3>Members - Update</h3>

	<div class="container">			
		{!! Form::model($member, array('route' => ['member/update', $member->id], 'class' => 'form-horizontal', 'method' => 'PATCH', 'files' => 'true')) !!}

			@include('admin.member._form')

			<div class="form-group"> 
				{!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
			</div>

		{!! Form::close() !!}

	</div>

	<div class="container text-right actionsButton">
		{!! link_to_route('member/index','Back', [] ,array('class' => 'btn btn-success')) !!}
	</div>
@stop