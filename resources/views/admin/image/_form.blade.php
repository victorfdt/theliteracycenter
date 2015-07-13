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
       
       {!! Form::select('type', array($image::MAIN_BANNER => 'Main page banner', 
       $image::GENERAL_BANNER => 'General banner',
       $image::SIDE_BAR => 'Side bar',
       $image::LOGO => 'Logo',
       $image::FOOTER => 'Footer'), 
       Input::old('type', $image->type), ['class' => 'form-control', 'name' => 'type', 'id' => 'type']); !!}       
       

       {!! $errors->first('type', '<span class="help-block">:message</span>') !!}   
     </div>
   </div>

   <!-- ORDER -->
   <div class="form-group {{ $errors->has('order') ? 'has-error' : ''}} " id ="order">
    <label for="order" class="col-sm-2 control-label">Order</label>
    <div class="col-sm-5">   
      {!! Form::text('order', null, ['class' => 'form-control', 'type' => 'number']) !!}
      {!! $errors->first('order', '<span class="help-block">:message</span>') !!}
    </div>
  </div>

  <!-- LINK -->
  <div class="form-group {{ $errors->has('link') ? 'has-error' : ''}} ">
    <label for="link" class="col-sm-2 control-label">Link</label>
    <div class="col-sm-5">   
      {!! Form::text('link', null, ['class' => 'form-control']) !!}
      {!! $errors->first('link', '<span class="help-block">:message</span>') !!}
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


  });

  </script>