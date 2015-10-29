@extends('master')

@section('content')

    <div>
        {!! Form::open(['url' => 'posts/store']) !!}
        {!! Form::label('title', 'Title') !!}
        {!! Form::input('text', 'title', '', array('class' => 'form-control')) !!}
        {!! Form::label('body', 'Body') !!}
        {!! Form::textarea('body', '', array('class' => 'form-control')) !!}
        {!! Form::label('type_id', 'Type') !!}
        {!! Form::select('type_id', $post_types, '', array('class' => 'form-control')) !!}
        {!! Form::submit('Create', array('class' => 'form-control btn btn-primary')) !!}
        {!! Form::close() !!}
    </div>
    <footer class="footer">
        <p>&copy; ABBYY Company 2015</p>
    </footer>

@stop