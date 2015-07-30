<!-- Error message -->
@if(Session::has('message'))
<div class="alert {{ Session::get('alert-class', 'alert-info') }}">
  <label for="name">{{ Session::get('message') }}</label>

</div>
@endif

<!-- TITLE -->
<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}} ">
  <label for="title" class="col-sm-2 control-label">Title</label>
  <div class="col-sm-5">   
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
    {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
  </div>
</div>

<!-- SUB-TITLE -->
<div class="form-group {{ $errors->has('sub_title') ? 'has-error' : ''}} ">
  <label for="sub_title" class="col-sm-2 control-label">Sub-title</label>
  <div class="col-sm-5">   
    {!! Form::text('sub_title', null, ['class' => 'form-control']) !!}
    {!! $errors->first('sub_title', '<span class="help-block">:message</span>') !!}
  </div>
</div>

<!-- CONTENT -->
<div class="form-group {{ $errors->has('content') ? 'has-error' : ''}} ">
  <label for="content" class="col-sm-2 control-label">Content</label>
  <div class="col-sm-9">
    <label>You can use HTML tags to decorate your text.</label>
    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
    {!! $errors->first('content', '<span class="help-block">:message</span>') !!}
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

<!-- IMAGE_ALIGN -->
<div class="form-group {{ $errors->has('image_align') ? 'has-error' : ''}}">
  <label for="image_align" class="col-sm-2 control-label">Type</label>
  <div class="col-sm-5">
   
   {!! Form::select('image_align', array($post::IMAGE_LEFT => 'Left', 
   $post::IMAGE_CENTER => 'Center',
   $post::IMAGE_RIGHT => 'Right',), 
   Input::old('image_align', $post->image_align), ['class' => 'form-control']); !!} 
   {!! $errors->first('image_align', '<span class="help-block">:message</span>') !!}     
 </div>
</div>

<!-- PREVIEW -->
<div class="form-group">
  <label for="order" class="col-sm-2 control-label">Preview</label>
  <div class="col-sm-5">   
    {!! HTML::image('', '', array('id' => 'imagePreview', 'style' => 'width: 430px;')) !!}
  </div>
</div>