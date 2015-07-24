<!-- TUTOR/USER ID -->
{!! Form::hidden('user_id', $userId) !!}

<!-- LEARNER NAME -->
<div class="form-group {{ $errors->has('learner_name') ? 'has-error' : ''}} ">
  <label for="learner_name" class="col-sm-2 control-label">Learner name</label>
  <div class="col-sm-5">   
    {!! Form::text('learner_name', null, ['class' => 'form-control']) !!}
    {!! $errors->first('learner_name', '<span class="help-block">:message</span>') !!}
  </div>
</div>

<!-- MONTH -->
<div class="form-group {{ $errors->has('month') ? 'has-error' : ''}} ">
  <label for="role" class="col-sm-2 control-label">Type</label>
  <div class="col-sm-5">

   <!-- This input will be filled up by javascritp -->
   {!! Form::select('month', array(), 
   Input::old('month', $report->month), ['class' => 'form-control', 'name' => 'month', 'id' => 'monthInput']); !!} 
   {!! $errors->first('month', '<span class="help-block">:message</span>') !!}
 </div>
</div>

<!-- SITE LOCATION -->
<div class="form-group {{ $errors->has('site') ? 'has-error' : ''}} ">
  <label for="site" class="col-sm-2 control-label">Site</label>
  <div class="col-sm-5">   
    {!! Form::text('site', null, ['class' => 'form-control']) !!}
    {!! $errors->first('site', '<span class="help-block">:message</span>') !!}
  </div>
</div>

<!-- TOTAL PREPARATION TIME -->
<div class="form-group {{ $errors->has('total_prep_time') ? 'has-error' : ''}} ">
  <label for="total_prep_time" class="col-sm-2 control-label">Total preparation time</label>
  <div class="col-sm-5">   
    {!! Form::text('total_prep_time', null, ['class' => 'form-control']) !!}
    {!! $errors->first('total_prep_time', '<span class="help-block">:message</span>') !!}
  </div>
</div>

<!-- TOTAL TRAVEL TIME -->
<div class="form-group {{ $errors->has('total_travel_time') ? 'has-error' : ''}} ">
  <label for="total_travel_time" class="col-sm-2 control-label">Total travel time</label>
  <div class="col-sm-5">   
    {!! Form::text('total_travel_time', null, ['class' => 'form-control']) !!}
    {!! $errors->first('total_travel_time', '<span class="help-block">:message</span>') !!}
  </div>
</div>

<!-- TOTAL MILEAGE -->
<div class="form-group {{ $errors->has('total_mileage') ? 'has-error' : ''}} ">
  <label for="total_mileage" class="col-sm-2 control-label">Total mileage</label>
  <div class="col-sm-5">   
    {!! Form::text('total_mileage', null, ['class' => 'form-control']) !!}
    {!! $errors->first('total_mileage', '<span class="help-block">:message</span>') !!}
  </div>
</div>

<!-- SESSIONS -->
<div class="form-group">
  <label for="total_mileage" class="col-sm-2 control-label">Sessions</label>  
  <div class="col-sm-3" id="sessionDays">

    <!-- If is greater than 0, it means that its a update page and it is necessary how de sessions
    of the selected report. -->
    @if(sizeof($report->sessions()) > 0)
    @foreach($report->sessions() as $session)
    <div class="col-sm-5 session-input">
      {!! Form::text('old['.$session->id.'][day]', $session->day, 
      ['placeholder' => 'Day', 'class' => 'form-control']) !!}
    </div>

    <div class="col-sm-5 session-input">
      {!! Form::text('old['.$session->id.'][hours]', $session->hours, 
      ['placeholder' => 'Hours', 'class' => 'form-control']) !!}
    </div>
    @endforeach
    @else

    <div class="col-sm-5">
      {!! Form::text('new[0][day]',null,['placeholder' => 'Day', 'class' => 'form-control']) !!}      
    </div>

    <div class="col-sm-5">      
      {!! Form::text('new[0][hours]', null ,['placeholder' => 'Hours', 'class' => 'form-control']) !!}
    </div>
    @endif  
    
  </div>

  <div class="col-sm-2">
    <button type="button" class="btn btn-default btn-sm" id="addSession">
      <span class="glyphicon glyphicon-plus"></span> Add
    </button>

    <button type="button" class="btn btn-default btn-sm" id="removeSession">
      <span class="glyphicon glyphicon-minus"></span> Remove
    </button>    
  </div>
</div>


<!-- GOALS ARCHIEVED? -->
<div class="form-group {{ $errors->has('goals_archieved') ? 'has-error' : ''}} ">
  <label for="role" class="col-sm-2 control-label">Goals archieved?</label>
  <div class="col-sm-5">

   <!-- This input will be filled up by javascritp -->
   {!! Form::select('goals_archieved', array(true => 'Yes' , false => 'No'), 
   Input::old('goals_archieved', $report->goals_archieved), ['class' => 'form-control']); !!} 
   {!! $errors->first('goals_archieved', '<span class="help-block">:message</span>') !!}
 </div>
</div>

<!-- GOALS AND PROGRESS -->
<div class="form-group {{ $errors->has('goals_progress') ? 'has-error' : ''}} ">
  <label for="goals_progress" class="col-sm-2 control-label">Goals and progress made</label>
  <div class="col-sm-5">   
    {!! Form::textarea('goals_progress', null, ['class' => 'form-control']) !!}
    {!! $errors->first('goals_progress', '<span class="help-block">:message</span>') !!}
  </div>
</div>

<!-- MATERIAL USED -->
<div class="form-group {{ $errors->has('material_used') ? 'has-error' : ''}} ">
  <label for="material_used" class="col-sm-2 control-label">Material used</label>
  <div class="col-sm-5">   
    {!! Form::textarea('material_used', null, ['class' => 'form-control']) !!}
    {!! $errors->first('material_used', '<span class="help-block">:message</span>') !!}
  </div>
</div>

<!-- COMMENTS -->
<div class="form-group {{ $errors->has('comments') ? 'has-error' : ''}} ">
  <label for="comments" class="col-sm-2 control-label">Comments</label>
  <div class="col-sm-5">   
    {!! Form::textarea('comments', null, ['class' => 'form-control']) !!}
    {!! $errors->first('comments', '<span class="help-block">:message</span>') !!}
  </div>
</div>

<script>
  $(document).ready(function(){ 

    //Represent the quantity of 
    indexNewSession = 1;   

    /* Populating the monht select input */
    var months = ['January','February','March','April','May','June',
    'July','August','September','October','November','December'];

    for(i = 0; i < 12; i++){
      $("#monthInput").append($("<option />").val(i + 1).text(months[i]));
    }

    /* Add session*/    
    $('#addSession').click(function() {      
      $("#sessionDays").append('<div class="col-sm-5 session-input"><input type="text" value="" name="new[' + indexNewSession + '][day]" class="form-control" placeholder="Day"></div>');
      $("#sessionDays").append('<div class="col-sm-5 session-input"><input type="text" value="" name="new[' + indexNewSession + '][hours]" class="form-control" placeholder="Hours"></div>');

      indexNewSession++;
    });

    /* Remove session*/ 
    $('#removeSession').click(function() {
      if($("#sessionDays div").toArray().length > 2){
        $("#sessionDays div").last().remove();
        $("#sessionDays div").last().remove();
        indexNewSession--;
      }

    });

    $("#sessionDays input[name*='day']").keypress(function( $this ){
        $(this).val($(this).val());
    });


    /* Submit button.
    Making validation on the session fields
    */
    $('#reportForm').submit(function(e) {      

      //Checking the quantity of days that were filled up
      var qtdDays = 0;
      var qtdDaysFilledUp = 0;

      $("#sessionDays input[name*='day']").each(function( index ) {         
        qtdDays++;      
        if($( this ).val() != ''){
          qtdDaysFilledUp++
        }      
      });

      var qtdHours = 0;
      var qtdHoursFilledUp = 0;

      $("#sessionDays input[name*='hours']").each(function( index ) {
        qtdHours++;        
        if($( this ).val() != ''){
          qtdHoursFilledUp++
        }      
      });
      
      if(qtdDaysFilledUp == 0 || qtdHoursFilledUp == 0){
        alert('You must filled up completly at least one session day.');

        e.preventDefault(); //prevent default form submit
      } else{
        
        if(qtdDays != qtdDaysFilledUp || qtdHours != qtdHoursFilledUp){
        alert('On the session section, there are empty fields! ');
        e.preventDefault(); //prevent default form submit

      } else {      

          //Submit the form
          $('#reportForm').submit();
        }
      }      

    }); 

  });
</script>