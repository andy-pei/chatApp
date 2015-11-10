@extends('master')

@section('content')

    <h2 class="header-image">{{$post->title}}</h2>
    <div class="row">
        <p>

        <h2 class="text-center">{{$post->title}}</h2></p>
        <div class="jumbotron">
            <p>{!! $post->body !!}</p>
        </div>
    </div>

    @foreach($comments as $comment)
        <div class="row">
            <div class="col-sm-1">
                <div class="thumbnail">
                    <img class="img-responsive user-photo" src="{{$comment->auther->icon_url}}">
                </div>
            </div>

            <div class="col-sm-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong>{{$comment->auther->name}}</strong> <span class="text-muted">commented {{$comment->created_at->diffForHumans()}}</span>
                    </div>
                    <div class="panel-body">
                        {{$comment->comment}}
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <div class="row">
        <button id="comment-trigger" class="btn btn-primary">Comment</button>

        <div id="comment-form" class="hidden">

            {!! Form::open(['url' => 'post/'.$post->id.'/comment/create']) !!}
            <div class="form-group">
                {!! Form::textarea('comment', '', array('class' => 'form-control')) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Submit', array('class' => 'form-control btn btn-primary')) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>

    <footer class="footer footer-position">
        <p>&copy; ABBYY Company 2015</p>
    </footer>

@stop