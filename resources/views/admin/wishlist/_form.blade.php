<!-- ITEM -->
<div class="form-group {{ $errors->has('item') ? 'has-error' : ''}} ">
  <label for="item" class="col-sm-2 control-label">Item</label>
  <div class="col-sm-5">   
    {!! Form::text('item', null, ['class' => 'form-control']) !!}
    {!! $errors->first('item', '<span class="help-block">:message</span>') !!}
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
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
    {!! $errors->first('description', '<span class="help-block">:message</span>') !!}
  </div>
</div>