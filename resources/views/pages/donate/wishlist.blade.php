@extends('layouts.master')
@section('content')


<h1 class="text-center">Wish list</h1>

<br><br>

<p>Help us donating one of the following items.</p>

@foreach($wishlist as $item)
	
	<h3>{{$item->item}}</h3>
	<form class="form-horizontal">

			@if(!empty($member->position))
				<div class="form-group">
					<label class="col-sm-2"><strong>Position</strong></label>
					<div class="col-sm-6">
						{{$member->position}}
					</div>
				</div>
			@endif

			@if(!empty($member->email))
				<div class="form-group">
					<label class="col-sm-2"><strong>E-mail</strong></label>
					<div class="col-sm-6">
						{!! HTML::mailto($member->email) !!}										
					</div>
				</div>
			@endif			
		</form>	

@endforeach



@stop