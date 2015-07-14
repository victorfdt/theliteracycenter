@extends('layouts.master')
@section('content')

<div class="text-center">
	<h1>Staff</h1>
</div>

<br><br>

@foreach($members as $member)
<h3>{{$member->name}}</h3>
<div class="row">
	<div class="col-lg-4">
		{!! HTML::image($member->path, '', array('class' => 'img-rounded', 'style' => 'width: 250px;')) !!}
	</div>
	<div class="col-lg-6">
		<form class="form-horizontal">
			<div class="form-group">
				<label class="col-sm-2"><strong>Position</strong></label>
				<div class="col-sm-6">
					{{$member->position}}
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2"><strong>E-mail</strong></label>
				<div class="col-sm-6">
					{{$member->email}}
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2"><strong>Phone:</strong></label>
				<div class="col-sm-6">
					{{$member->phone}}
				</div>
			</div>

			<br>

			<div class="form-group">
				<label class="col-sm-2"><strong>Summary</strong></label>
				<div class="col-sm-6">
					{{$member->Description}}
				</div>
			</div>
		</form>
		
		
		
		
	</div>
</div>
<br>

@endforeach

@stop



