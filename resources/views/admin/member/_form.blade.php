<!-- Error message -->
  @if(Session::has('message'))
    <div class="alert {{ Session::get('alert-class', 'alert-info') }}">
      <label for="name">{{ Session::get('message') }}</label>

    </div>
  @endif

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


      <!-- If there is a update page, I must put a hidden field of type.
           Because the jquery will disable the input select, and the only
           way to keep the information on the request, is create this hidden input. 
      -->
      @if($action == 'update')
        {!! Form::hidden('type') !!}
      @endif
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
<div class="form-group {{ $errors->has('position') ? 'has-error' : ''}} ">
  <label for="position" class="col-sm-2 control-label">Position</label>
  <div class="col-sm-5">   
    {!! Form::text('position', null, ['class' => 'form-control']) !!}
    {!! $errors->first('position', '<span class="help-block">:message</span>') !!}
  </div>
</div>

<!-- LINK -->
<div class="form-group {{ $errors->has('link_label') ? 'has-error' : ''}} ">
  <label for="link_label" class="col-sm-2 control-label">Link</label>
  <div class="col-sm-5">
    <div>    
      {!! Form::text('link_label', null, ['class' => 'form-control', 'placeholder' => 'Label']) !!}
      {!! $errors->first('link_label', '<span class="help-block">:message</span>') !!}
    </div>
    
    <br>

    <div >      
      {!! Form::text('link', null, ['class' => 'form-control', 'placeholder' => 'Address']) !!}
      {!! $errors->first('link', '<span class="help-block">:message</span>') !!}
    </div>    
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

{!! Form::hidden('action', $action, array('id' => 'action')) !!}
<script>
$(document).ready(function(){    

   /*Phone formatter*/
  $('#input_phone').mask('(000) 000-0000');

  //Checking if is update page to disable the type
  if($('#action').val() == 'update'){
    $("#type").prop( "disabled", true );
  }

});

</script>