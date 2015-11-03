@extends('master')

@section('content')

    <h2 class="form-signin-heading text-center header-image">Edit Profile</h2>
    {{--Validation Error Message--}}
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div>
        {!! Form::open(['url' => 'users/update', 'files' => true]) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name') !!}
            {!! Form::input('text', 'name', $user->name, array('class' => 'form-control')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email', 'Email') !!}
            {!! Form::input('email', 'email', $user->email, array('class' => 'form-control')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('file_url', 'Images') !!}
            {!! Form::file('file_url', '', array('class' => 'form-control')) !!}
        </div>

        <div class="form-group">
            <div class="col-md-6">
                <a href="{{URL::to('posts')}}" class="form-control btn btn-danger"><p>Cancel</p></a>
            </div>

            <div class="col-md-6">
                {!! Form::submit('Update', array('class' => 'form-control btn btn-primary')) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    <footer class="footer">
        <p>&copy; ABBYY Company 2015</p>
    </footer>

@stop