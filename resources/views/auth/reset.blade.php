@extends('master')

@section('content')
    <div class="col-md-6 col-md-offset-3">
        <h2 class="form-signin-heading text-center header-image">Reset Password</h2>

        {!! Form::open(['url' => '/password/reset', 'method' => 'POST']) !!}

        <div class="form-group">
            {!! Form::input('hidden', 'token', $token) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email', 'Email') !!}
            {!! Form::input('email', 'email', old('email'), array('class' => 'form-control')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('password', 'Password') !!}
            {!! Form::input('password', 'password', '', array('class' => 'form-control')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('password', 'Confirm Password') !!}
            {!! Form::input('password', 'password_confirmation', '', array('class' => 'form-control')) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Reset Password', array('class' => 'btn btn-primary form-control')) !!}
        </div>

        {!! Form::close() !!}
    </div>

    @if (count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
@endsection