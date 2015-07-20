<!-- PAYED -->
<div class="form-group">
	<label class="col-sm-2 text-right">Payed</label>
	<div class="col-sm-5 "> 

		@if($job->payed == true)
		{{'Yes'}}  
		@else
		{{'No'}}
		@endif		    
	</div>
</div>

<!-- FUNCTION -->
@if(!empty($job->function))				
<div class="form-group">
	<label class="col-sm-2 text-right">Function</label>
	<div class="col-sm-5 ">   
		{{ $job->function }}		    
	</div>
</div>
@endif

<!-- CONTRACT -->
<div class="form-group">
	<label class="col-sm-2 text-right">Contract</label>
	<div class="col-sm-5 ">   
		@if($job->contract == $job::PART_TIME)
		{{'Part time'}}  
		@elseif($job->contract == $job::FULL_TIME)
		{{'Full time'}}
		@endif		    
	</div>
</div>

<!-- DESCRIPTION -->
<div class="form-group">
	<label class="col-sm-2 text-right">Description</label>
	<div class="col-sm-10 ">

		{!! nl2br(e($job->description)) !!} 		

	</div>
</div>

<!-- RESPONSABILITIES -->
<div class="form-group">
	<label class="col-sm-2 text-right">Responsabilities</label>
	<div class="col-sm-10 ">  

		<?php $lines = explode(PHP_EOL, $job->responsabilities); ?>
		
		<ul style="list-style-type:disc">
			@foreach ($lines as $line)
			<li>{{ $line }}</li>
			@endforeach		
		</ul>

	</div>
</div>

<!-- REQUIREMENTS -->
<div class="form-group">
	<label class="col-sm-2 text-right">Requirements</label>
	<div class="col-sm-10 ">

		<?php $lines = explode(PHP_EOL, $job->requirements); ?>
		
		<ul style="list-style-type:disc">
			@foreach ($lines as $line)
			<li>{{ $line }}</li>
			@endforeach		
		</ul>

	</div>
</div>		

<!-- SKILLS -->
<div class="form-group">
	<label class="col-sm-2 text-right">Skills</label>
	<div class="col-sm-10 ">   

		<?php $lines = explode(PHP_EOL, $job->skills); ?>
		
		<ul style="list-style-type:disc">
			@foreach ($lines as $line)
			<li>{{ $line }}</li>
			@endforeach		
		</ul>		    
	</div>
</div>
