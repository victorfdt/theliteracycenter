<!-- NAME -->
<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}} ">
  <label for="name" class="col-sm-2 control-label">Name</label>
  <div class="col-sm-5">   
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
  </div>
</div>

<!-- TYPE -->
<div class="form-group {{ $errors->has('type') ? 'has-error' : ''}} ">
  <label for="role" class="col-sm-2 control-label">Type</label>
  <div class="col-sm-5">
    <!-- In the way that this form is used on the create and on the update page,
     It is necessary check is the $user variable is setted.
     The input Input::old load the selected value on the update page
   -->       
   {!! Form::select('type', array($member::STAFF => 'Staff', 
   $member::BOARD_DIRECTOR => 'Board of Director'), 
   Input::old('type', $member->type), ['class' => 'form-control', 'name' => 'type', 'id' => 'type']); !!}       

   {!! $errors->first('type', '<span class="help-block">:message</span>') !!}   
 </div>
</div>

<!-- EMAIL -->
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}} " id ="email">
  <label for="email" class="col-sm-2 control-label">E-mail</label>
  <div class="col-sm-5">   
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
    {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
  </div>
</div>

<!-- PHONE -->
<div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}} " id ="phone">
  <label for="phone" class="col-sm-2 control-label">Phone</label>
  <div class="col-sm-5">   
    {!! Form::text('phone', null, ['class' => 'form-control', 'id' => 'input_phone']) !!}
    {!! $errors->first('phone', '<span class="help-block">:message</span>') !!}
  </div>
</div>

<!-- POSITION -->
<div class="form-group {{ $errors->has('link') ? 'has-error' : ''}} ">
  <label for="position" class="col-sm-2 control-label">Position</label>
  <div class="col-sm-5">   
    {!! Form::text('position', null, ['class' => 'form-control']) !!}
    {!! $errors->first('position', '<span class="help-block">:message</span>') !!}
  </div>
</div>

<!-- DESCRIPTION -->
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}} ">
  <label for="description" class="col-sm-2 control-label">Description</label>
  <div class="col-sm-5">   
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
    {!! $errors->first('description', '<span class="help-block">:message</span>') !!}
  </div>
</div>

<!-- EXHIBITION ORDER -->
<div class="form-group {{ $errors->has('order') ? 'has-error' : ''}} ">
  <label for="order" class="col-sm-2 control-label">Exhibition order</label>
  <div class="col-sm-5">   
    {!! Form::text('order', null, ['class' => 'form-control']) !!}
    {!! $errors->first('order', '<span class="help-block">:message</span>') !!}
  </div>
</div>

<!-- FILE -->
<div class="form-group {{ $errors->has('image') ? 'has-error' : ''}} ">
  <label for="order" class="col-sm-2 control-label">File</label>
  <div class="col-sm-5">   
    {!! Form::file('image', ['id' => 'inputFile']) !!}
    {!! $errors->first('image', '<span class="help-block">:message</span>') !!}
  </div>
</div>

<!-- PREVIEW -->
<div class="form-group">
  <label for="order" class="col-sm-2 control-label">Preview</label>
  <div class="col-sm-5">   
    {!! HTML::image('', '', array('id' => 'imagePreview', 'style' => 'width: 430px;')) !!}
  </div>
</div>

<script>
$(document).ready(function(){    

  /* Only these main page and side bar type can add order */
  if($("#type").val() == 1 || $("#type").val() == 3){
    $("#order").show();
  } else {
    $("#order").hide();
  }

  $("#type").change(function(){
    if($("#type").val() == 1 || $("#type").val() == 3){
      $("#order").show();
    } else {
      $("#order").hide();
    }
  });

  /*Phone formatter*/
  $('#input_phone').mask('(000) 000-0000');

});

</script>