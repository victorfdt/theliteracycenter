@extends('layouts.master')
@section('content')

<div class="text-center">
	<h1>Board of directors</h1>
</div>

<br><br>

<p><strong>Board of Directors 2015-2016</strong></p>

<br>

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
		</form>
		
		
		
		
	</div>
</div>
<br>

@endforeach

@stop



