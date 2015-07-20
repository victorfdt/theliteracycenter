<!-- NAME -->
<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}} ">
  <label for="name" class="col-sm-2 control-label">Name</label>
  <div class="col-sm-5">   
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
  </div>
</div>

<!-- PAYED -->
<div class="form-group {{ $errors->has('payed') ? 'has-error' : ''}} ">
  <label for="payed" class="col-sm-2 control-label">Payed</label>
  <div class="col-sm-5">   
    {!! Form::select('payed', array(true => 'Yes', 
                                   false => 'No'), 
     Input::old('payed', $job->payed), ['class' => 'form-control']); !!}
    {!! $errors->first('payed', '<span class="help-block">:message</span>') !!}
  </div>
</div>

<!-- FUNCTION -->
<div class="form-group {{ $errors->has('function') ? 'has-error' : ''}} ">
  <label for="function" class="col-sm-2 control-label">Function job</label>
  <div class="col-sm-5">   
    {!! Form::text('function', null, ['class' => 'form-control']) !!}
    {!! $errors->first('function', '<span class="help-block">:message</span>') !!}
  </div>
</div>

<!-- CONTRACT -->
<div class="form-group {{ $errors->has('contract') ? 'has-error' : ''}} ">
  <label for="contract" class="col-sm-2 control-label">Contract</label>
  <div class="col-sm-5">   
    {!! Form::select('contract', array($job::PART_TIME => 'Part time', 
                                       $job::FULL_TIME => 'Full time'), 
     Input::old('contract', $job->contract), ['class' => 'form-control']); !!}
    {!! $errors->first('contract', '<span class="help-block">:message</span>') !!}
  </div>
</div>

<!-- DESCRIPTION -->
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}} ">
  <label for="description" class="col-sm-2 control-label">Description</label>
  <div class="col-sm-5">  
    <p>Create space between text fragments to improve the visualization.</p> 
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
    {!! $errors->first('description', '<span class="help-block">:message</span>') !!}
  </div>
</div>

<!-- RESPONSABILITIES -->
<div class="form-group {{ $errors->has('responsabilities') ? 'has-error' : ''}} ">
  <label for="responsabilities" class="col-sm-2 control-label">Responsabilities</label>
  <div class="col-sm-5">   
    {!! Form::textarea('responsabilities', null, ['class' => 'form-control']) !!}
    {!! $errors->first('responsabilities', '<span class="help-block">:message</span>') !!}
  </div>
</div>

<!-- REQUIREMENTS -->
<div class="form-group {{ $errors->has('requirements') ? 'has-error' : ''}} ">
  <label for="requirements" class="col-sm-2 control-label">Requirements</label>
  <div class="col-sm-5">   
    {!! Form::textarea('requirements', null, ['class' => 'form-control']) !!}
    {!! $errors->first('requirements', '<span class="help-block">:message</span>') !!}
  </div>
</div>

<!-- SKILLS -->
<div class="form-group {{ $errors->has('skills') ? 'has-error' : ''}} ">
  <label for="skills" class="col-sm-2 control-label">Skills</label>
  <div class="col-sm-5">   
    {!! Form::textarea('skills', null, ['class' => 'form-control']) !!}
    {!! $errors->first('skills', '<span class="help-block">:message</span>') !!}
  </div>
</div>