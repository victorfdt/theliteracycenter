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
    @if (isset($banner))
      {!! Form::select('type', array($banner::MAIN => 'Main Page', $banner::GENERAL => 'General'), Input::old('type', $banner->type), ['class' => 'form-control', 'name' => 'type', 'id' => 'type']); !!}
    
    @else
      {!! Form::select('type', array($banner::MAIN => 'Main Page', $banner::GENERAL => 'General'), '', ['class' => 'form-control', 'name' => 'type', 'id' => 'type']); !!}
    
    @endif
    {!! $errors->first('type', '<span class="help-block">:message</span>') !!}   
</div>
</div>

<!-- ORDER -->
<div class="form-group {{ $errors->has('order') ? 'has-error' : ''}} ">
  <label for="order" class="col-sm-2 control-label">Order</label>
  <div class="col-sm-5">   
    {!! Form::text('order', null, ['class' => 'form-control', 'type' => 'number']) !!}
    {!! $errors->first('order', '<span class="help-block">:message</span>') !!}
  </div>
</div>

<!-- PATH -->
<div class="form-group {{ $errors->has('path') ? 'has-error' : ''}} ">
  <label for="order" class="col-sm-2 control-label">Path</label>
  <div class="col-sm-5">   
    {!! Form::text('path', null, ['class' => 'form-control', 'id' => 'inputPath']) !!}
    {!! $errors->first('path', '<span class="help-block">:message</span>') !!}
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

  //Update page:load the preview image
  $('#imagePreview').attr('src', $( "#inputPath" ).val());
  
  //Create page: when change the field path, load the preview image
  $( "#inputPath" ).change(function() {
    $('#imagePreview').attr('src', $( "#inputPath" ).val());
  });


});

</script>