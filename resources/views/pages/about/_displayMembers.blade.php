<h3>{{$member->name}}</h3>
<div class="row">
	<div class="col-lg-4">
		{!! HTML::image($member->path, '', array('class' => 'img-rounded', 'style' => 'width: 250px;')) !!}
	</div>
	<div class="col-lg-8">
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

			@if(!empty($member->link))
				<div class="form-group">
					<label class="col-sm-2"><strong>Link:</strong></label>
					<div class="col-sm-6">
						{!! HTML::link($member->link, $member->label_link) !!}
					</div>
				</div>
			@endif

			@if(!empty($member->phone))
				<div class="form-group">
					<label class="col-sm-2"><strong>Phone:</strong></label>
					<div class="col-sm-6">
						{{$member->phone}}
					</div>
				</div>
			@endif			

			<br>

			@if(!empty($member->description))
				<div class="form-group">
					<label class="col-sm-2"><strong>Summary</strong></label>
					<div class="col-md-10">
						{{$member->description}}
					</div>
				</div>
			@endif
		</form>		
	</div>
</div>
<br>