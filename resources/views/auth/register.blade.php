@extends('master')

@section('content')
    <div class="col-md-6 col-md-offset-3">
        <h2 class="form-signin-heading text-center header-image">Please sign in</h2>

        {!! Form::open(['url' => '/auth/register', 'method' => 'POST', 'class' => 'form-signin']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name') !!}
            {!! Form::input('text', 'name', old('name'), array('class' => 'form-control')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email', 'Email') !!}
            {!! Form::input('email', 'email', old('name'), array('class' => 'form-control')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('password', 'Password') !!}
            {!! Form::input('password', 'password', old('name'), array('class' => 'form-control')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('password_confirmation', 'Confirm Password') !!}
            {!! Form::input('password', 'password_confirmation', old('name'), array('class' => 'form-control')) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Register', array('class' => 'btn btn-primary form-control')) !!}
        </div>

        {!! Form::close() !!}
    </div>
@endsection