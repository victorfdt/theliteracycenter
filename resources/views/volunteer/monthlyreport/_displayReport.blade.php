<!-- STUDENT PRESENT -->
<div class="form-group">
	<label class="col-sm-2 text-right">Student present</label>
	<div class="col-sm-5 "> 
		@if($report->student_present)
			{{ 'Yes' }}
		@else
			{{ 'No' }}
		@endif
	</div>
</div>

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

<!-- YEAR -->
<div class="form-group">
	<label class="col-sm-2 text-right">Year</label>
	<div class="col-sm-5 "> 
		{{ $report->year }}			    
	</div>
</div>

<!-- MONTH -->
<div class="form-group">
	<label class="col-sm-2 text-right">Month</label>
	<div class="col-sm-5 "> 
		{{ $report->month }}			    
	</div>
</div>

@if(!empty($report->site))	
<!-- SITE LOCATION -->
<div class="form-group">
	<label class="col-sm-2 text-right">Site location</label>
	<div class="col-sm-5 "> 
		{{ $report->site }}			    
	</div>
</div>
@endif

@if(!empty($report->total_prep_time) && $report->total_prep_time > 0)	
<!-- TOTAL PREPARATION TIME -->
<div class="form-group">
	<label class="col-sm-2 text-right">Total preparation time</label>
	<div class="col-sm-5 "> 
		{{ $report->total_prep_time }}			    
	</div>
</div>
@endif

@if(!empty($report->total_travel_time) && $report->total_travel_time > 0)	
<!-- TOTAL TRAVEL TIME -->
<div class="form-group">
	<label class="col-sm-2 text-right">Total travel time</label>
	<div class="col-sm-5 "> 
		{{ $report->total_travel_time }}			    
	</div>
</div>
@endif

@if(!empty($report->total_mileage) &&  $report->total_mileage > 0)	
<!-- TOTAL MILEAGE -->
<div class="form-group">
	<label class="col-sm-2 text-right">Total mileage</label>
	<div class="col-sm-5 "> 
		{{ $report->total_mileage }}			    
	</div>
</div>
@endif

@if($report->sessions()->get()->count() > 0)	
<!-- SESSIONS -->
<div class="form-group">
	<label  class="col-sm-2 text-right">Sessions</label>  
	<div class="col-sm-3">

		<table class="table table-striped" >
			<thead>
				<tr>					
					<th>Day</th>
					<th>Hours</th>
					<th>Present?</th>
				</tr>
			</thead>
			<tbody>				
				@foreach($report->sessions()->orderBy('day', 'asc')->get() as $session)				
					<tr>						
						<td>{{ $session->day }}</td>
						<td>{{ $session->hours }}</td>
						<td>
							@if($report->student_present)
								{{ 'Yes' }}
							@else
								{{ 'No' }}
							 @endif
						</td>
					</tr>
				@endforeach
			</tbody>
		</table> 

	</div>  
</div>
@endif

@if($report->student_present)
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
@endif

@if(!empty($report->material_used))	
<!-- GOALS AND PROGRESS -->
<div class="form-group">
	<label class="col-sm-2 text-right">Goals and progress made</label>
	<div class="col-sm-5 "> 
		{{ $report->goals_progress }}			    
	</div>
</div>
@endif

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