<h1 class="page-header">Register</h1>

{{ Form::open(['class' => 'form-horizontal', 'novalidate']) }}

<div class="form-group @if($errors->has('first_name')) has-error @endif">
    {{ Form::label('first_name', 'First Name*', [
        'class' => 'col-sm-2 control-label'
    ]) }}
    <div class="col-sm-10">
        {{ Form::text('first_name', null, [
            'class' => 'form-control'
        ])  }}

        @if ($errors->has('first_name'))
            <p class="help-block">{{ $errors->first('first_name') }}</p>
        @endif
    </div>
</div>

<div class="form-group @if($errors->has('last_name')) has-error @endif">
    {{ Form::label('last_name', 'Last Name*', [
        'class' => 'col-sm-2 control-label'
    ]) }}
    <div class="col-sm-10">
        {{ Form::text('last_name', null, [
            'class' => 'form-control'
        ])  }}

        @if ($errors->has('last_name'))
            <p class="help-block">{{ $errors->first('last_name') }}</p>
        @endif
    </div>
</div>

<div class="form-group @if($errors->has('email')) has-error @endif">
    {{ Form::label('email', 'Email*', [
        'class' => 'col-sm-2 control-label'
    ]) }}
    <div class="col-sm-10">
        {{ Form::email('email', null, [
            'class' => 'form-control'
        ])  }}

        @if ($errors->has('email'))
            <p class="help-block">{{ $errors->first('email') }}</p>
        @endif
    </div>
</div>

<div class="form-group @if($errors->has('password')) has-error @endif">
    {{ Form::label('password', 'Password*', [
        'class' => 'col-sm-2 control-label'
    ]) }}
    <div class="col-sm-10">
        {{ Form::password('password', [
            'class' => 'form-control'
        ])  }}

        @if ($errors->has('password'))
            <p class="help-block">{{ $errors->first('password') }}</p>
        @endif
    </div>
</div>

<div class="col-sm-offset-2">
    <button type="submit" class="btn btn-primary">Register</button>
</div>

{{ Form::close() }}