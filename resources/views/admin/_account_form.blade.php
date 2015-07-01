

<!-- NAME -->
<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}} ">
  <label for="name" class="col-sm-2 control-label">Name</label>
  <div class="col-sm-5">   
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
  </div>
</div>

<!-- SURNAME -->
<div class="form-group {{ $errors->has('surname') ? 'has-error' : ''}} ">
  <label for="surname" class="col-sm-2 control-label">Surname</label>
  <div class="col-sm-5">   
    {!! Form::text('surname', null, ['class' => 'form-control']) !!}
    {!! $errors->first('surname', '<span class="help-block">:message</span>') !!}
  </div>
</div>

<!-- EMAIL -->
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}} ">
  <label for="email" class="col-sm-2 control-label">E-mail</label>
  <div class="col-sm-5">   
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
    {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
  </div>
</div>

<!-- GENDER -->
<div class="form-group {{ $errors->has('gender') ? 'has-error' : ''}} ">
  <label class="col-sm-2 control-label">Gender</label>
  <div class="col-sm-5">
    <div class="radio">
      <label>
        {!! Form::radio('gender', 'm', true); !!}
        Male
      </label>
    </div>
    <div class="radio">
      <label>
        {!! Form::radio('gender', 'f'); !!}
        Female
      </label>
    </div>
  </div>
</div>

<!-- ROLE -->
<div class="form-group {{ $errors->has('role') ? 'has-error' : ''}} ">
  <label for="role" class="col-sm-2 control-label">Role</label>
  <div class="col-sm-5">
    <!-- In the way that this form is used on the create and on the update page,
         It is necessary check is the $user variable is setted.
         The input Input::old load the selected value on the update page
     -->
    @if (isset($user))
      {!! Form::select('role', array('1' => 'Administrator', '2' => 'Volunteer', '3' => 'User'), Input::old('role', $user->role->privilege), ['class' => 'form-control', 'name' => 'role', 'id' => 'role']); !!}
    
    @else
      {!! Form::select('role', array('1' => 'Administrator', '2' => 'Volunteer', '3' => 'User'), '', ['class' => 'form-control', 'name' => 'role', 'id' => 'role']); !!}
    
    @endif
    {!! $errors->first('role', '<span class="help-block">:message</span>') !!}   
</div>
</div>
