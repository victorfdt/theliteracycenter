<!-- TUTOR NAME -->
<div class="form-group">
	<label class="col-sm-2 text-right">Tutor name</label>
	<div class="col-sm-5 ">		
		{{ $report->user()->name . ' ' . $report->user()->surname }}			    
	</div>
</div>

<!-- LEARNER NAME -->
<div class="form-group">
	<label class="col-sm-2 text-right">Learner name</label>
	<div class="col-sm-5 "> 
		{{ $report->learner_name }}			    
	</div>
</div>

<!-- MONTH -->
<div class="form-group">
	<label class="col-sm-2 text-right">Month</label>
	<div class="col-sm-5 "> 
		{{ $report->month }}			    
	</div>
</div>

<!-- SITE LOCATION -->
<div class="form-group">
	<label class="col-sm-2 text-right">Site location</label>
	<div class="col-sm-5 "> 
		{{ $report->site }}			    
	</div>
</div>

<!-- TOTAL PREPARATION TIME -->
<div class="form-group">
	<label class="col-sm-2 text-right">Total preparation time</label>
	<div class="col-sm-5 "> 
		{{ $report->total_prep_time }}			    
	</div>
</div>

<!-- TOTAL TRAVEL TIME -->
<div class="form-group">
	<label class="col-sm-2 text-right">Total travel time</label>
	<div class="col-sm-5 "> 
		{{ $report->total_travel_time }}			    
	</div>
</div>

<!-- TOTAL MILEAGE -->
<div class="form-group">
	<label class="col-sm-2 text-right">Total mileage</label>
	<div class="col-sm-5 "> 
		{{ $report->total_mileage }}			    
	</div>
</div>

<!-- SESSIONS -->
<div class="form-group">
	<label  class="col-sm-2 text-right">Sessions</label>  
	<div class="col-sm-3">

		<table class="table table-striped" >
			<thead>
				<tr>					
					<th>Day</th>
					<th>Hours</th>
				</tr>
			</thead>
			<tbody>				
				@foreach($report->sessions() as $session)				
					<tr>						
						<td>{{ $session->day }}</td>
						<td>{{ $session->hours }}</td>
					</tr>
				@endforeach
			</tbody>
		</table> 

	</div>  
</div>

<!-- GOALS ARCHIEVED? -->
<div class="form-group">
	<label class="col-sm-2 text-right">Goals archieved?</label>
	<div class="col-sm-5 ">   
		@if($report->goals_archieved == true)
			{{'Yes'}}  
		@else
			{{'No'}}
		@endif		    
	</div>
</div>

<!-- GOALS AND PROGRESS -->
<div class="form-group">
	<label class="col-sm-2 text-right">Goals and progress made</label>
	<div class="col-sm-5 "> 
		{{ $report->goals_progress }}			    
	</div>
</div>

<!-- MATERIAL USED -->
@if(!empty($report->material_used))	
<div class="form-group">
	<label class="col-sm-2 text-right">Material used</label>
	<div class="col-sm-5 "> 
		{{ $report->material_used }}			    
	</div>
</div>
@endif

<!-- TOTAL COMMENTS -->
@if(!empty($report->comments))	
<div class="form-group">
	<label class="col-sm-2 text-right">Comments</label>
	<div class="col-sm-5 "> 
		{{ $report->comments }}			    
	</div>
</div>
@endif