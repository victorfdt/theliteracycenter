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
     {!! Form::select('type', array($file::NEWSLETTER => 'Newsletter', 
                                    $file::VOLUNTEER => 'Volunteer'), 
     Input::old('type', $file->type), ['class' => 'form-control', 'name' => 'type', 'id' => 'type']); !!} 
     {!! $errors->first('type', '<span class="help-block">:message</span>') !!}
      
   </div>
  </div>

<!-- LINK -->
<div class="form-group {{ $errors->has('link') ? 'has-error' : ''}}">
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