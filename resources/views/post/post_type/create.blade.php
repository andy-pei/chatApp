@extends('master')

@section('content')

    <div>
        {!! Form::open(['url' => 'post-types/store']) !!}
        {!! Form::label('type', 'Type Name') !!}
        {!! Form::input('text', 'name', '', array('class' => 'form-control')) !!}
        {!! Form::submit('Create', array('class' => 'form-control btn btn-primary')) !!}
        {!! Form::close() !!}
    </div>
    <footer class="footer">
        <p>&copy; ABBYY Company 2015</p>
    </footer>

@stop