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

<!-- LINK -->
<div class="form-group {{ $errors->has('link') ? 'has-error' : ''}} ">
  <label for="link" class="col-sm-2 control-label">Link</label>
  <div class="col-sm-5">   
    {!! Form::text('link', null, ['class' => 'form-control']) !!}
    {!! $errors->first('link', '<span class="help-block">:message</span>') !!}
  </div>
</div>

<!-- DESCRIPTION -->
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}} ">
  <label for="description" class="col-sm-2 control-label">Description</label>
  <div class="col-sm-5">   
    {!! Form::textarea('description', null, ['class' => 'form-control', 'id' => 'input_phone']) !!}
    {!! $errors->first('description', '<span class="help-block">:message</span>') !!}
  </div>
</div>

<!-- DATE -->
<div class="form-group {{ $errors->has('date') ? 'has-error' : ''}} ">
  <label for="date" class="col-sm-2 control-label">Date</label>
  <div class="col-sm-5">   
    {!! Form::text('date', isset($formattedDate) ? $formattedDate : '', ['class' => 'form-control', 'id' => 'eventDate']) !!}
    {!! $errors->first('date', '<span class="help-block">:message</span>') !!}
  </div>
</div>

<!-- FILE -->
<div class="form-group {{ $errors->has('image') ? 'has-error' : ''}} ">
  <label for="order" class="col-sm-2 control-label">File</label>
  <div class="col-sm-5">
    <label>You can not upload images bigger than 2MB.</label>
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
  
    $("#eventDate").datepicker({
      autoclose: true,
      todayHighlight: true
    });

});

</script>