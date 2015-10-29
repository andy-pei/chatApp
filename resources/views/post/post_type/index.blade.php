@extends('master')

@section('content')

    <div class="jumbotron">
        <h1>All Posts</h1>

        <p class="lead">Newcastle BBS is a forum for people sharing information, exchanging ideas, creating posts,
            making friends etc. It is a place for people having fun!</p>

        <p><a class="btn btn-lg btn-success" href="post-types/create" role="button">Create Type</a></p>
    </div>

    <div class="row">
        <table class="table">
            <tr>
                <th>Type ID</th>
                <th>Type Name</th>
                <th>Action</th>
            </tr>

            @foreach($post_types as $type)
                <tr>
                    <td>{{$type->id}}</td>
                    <td>{{$type->name}}</td>
                    <td><a href="{{URL::to('post-types/edit')}}"><button class="btn btn-primary">Edit</button></a></td>
                    <td><a href="{{URL::to('post-types/delete')}}"><button class="btn btn-primary">Delete</button></a></td>
                </tr>
                @endforeach
        </table>
    </div>

    <footer class="footer">
        <p>&copy; ABBYY Company 2015</p>
    </footer>

@stop