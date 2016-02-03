@extends('master')

@section('content')
    <div class="col-md-6 col-md-offset-3">
        <h2 class="form-signin-heading text-center header-image">Please Login</h2>

        {!! Form::open(['url' => '/auth/login', 'method' => 'POST']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name') !!}
            {!! Form::input('text', 'name', old('name'), array('class' => 'form-control')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('password', 'Password') !!}
            {!! Form::input('password', 'password', old('name'), array('class' => 'form-control')) !!}
        </div>

        <div>
            <div class="form-group col-lg-6">
                {!! Form::label('remember', 'Remember Me') !!}
                {!! Form::input('checkbox', 'remember', old('name')) !!}
            </div>

            <div class="form-group col-lg-6">
                <a href="{{URL('password/email')}}"><b class="">Forget Password?</b></a>
            </div>
        </div>




        <div class="form-group">
            {!! Form::submit('Login', array('class' => 'btn btn-primary form-control')) !!}
        </div>

        {!! Form::close() !!}
    </div>
@endsection