@extends('master')

@section('content')
    {!! Form::open(['url' => '/auth/login', 'method' => 'POST']) !!}
    <h2 class="form-signin-heading text-center">Please Login</h2>


    <div class="form-group">
        {!! Form::label('email', 'Email') !!}
        {!! Form::input('email', 'email', old('name'), array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('password', 'Password') !!}
        {!! Form::input('password', 'password', old('name'), array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('remember', 'Remember Me') !!}
        {!! Form::input('checkbox', 'remember', old('name')) !!}
    </div>


    <div class="form-group">
        {!! Form::submit('Login', array('class' => 'btn btn-primary form-control')) !!}
    </div>

    {!! Form::close() !!}
@endsection