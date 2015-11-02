@extends('master')

@section('content')

    <h2 class="form-signin-heading text-center header-image">Create Post</h2>
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
        {!! Form::open(['url' => 'posts/store']) !!}
        <div class="form-group">
            {!! Form::label('title', 'Title') !!}
            {!! Form::input('text', 'title', '', array('class' => 'form-control')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('body', 'Body') !!}
            {!! Form::textarea('body', '', array('class' => 'form-control')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('type_id', 'Type') !!}
            {!! Form::select('type_id', $post_types, '', array('class' => 'form-control')) !!}
        </div>

        <div class="form-group">
            <div class="col-md-6">
                <a href="{{URL::to('posts')}}" class="form-control btn btn-danger"><p>Cancel</p></a>
            </div>

            <div class="col-md-6">
                {!! Form::submit('Create', array('class' => 'form-control btn btn-primary')) !!}
            </div>
        </div>
        {!! Form::close() !!}

    </div>
    <footer class="footer">
        <p>&copy; ABBYY Company 2015</p>
    </footer>

@stop