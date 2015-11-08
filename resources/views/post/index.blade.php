@extends('master')

@section('content')

    <div class="jumbotron">
        <h1>All Posts</h1>

        <p class="lead">Newcastle BBS is a forum for people sharing information, exchanging ideas, creating posts,
            making friends etc. It is a place for people having fun!</p>

        <p><a class="btn btn-lg btn-success" href="posts/create" role="button">Create Post</a></p>
    </div>


    <div class="row">
        <table class="table">
            <tr>
                <th>Post ID</th>
                <th>Title</th>
                <th>Content</th>
                <th>Type</th>
                <th>Author</th>
                <th>Action</th>
            </tr>

            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->body}}</td>
                    <td>{{($post->type != null) ? $post->type->name : '-'}}</td>
                    <td>{{$post->author->name}}</td>
                    <td>
                        @if($post->user_id == Auth::user()->id)
                            <a href="{{URL::to('post/'.$post->id)}}">
                                <button class="btn btn-info">View</button>
                            </a>
                            <a href="{{URL::to('posts/edit/'.$post->id)}}">
                                <button class="btn btn-primary">Edit</button>
                            </a>
                            <a href="{{URL::to('posts/delete/'.$post->id)}}">
                                <button class="btn btn-danger">Delete</button>
                            </a>
                        @else
                            <a href="{{URL::to('post/'.$post->id)}}">
                                <button class="btn btn-info">View</button>
                            </a>
                        @endif
                    </td>

                </tr>
            @endforeach
        </table>
    </div>

    <footer class="footer">
        <p>&copy; ABBYY Company 2015</p>
    </footer>

@stop