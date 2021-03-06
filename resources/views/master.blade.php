<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/app.css">
    <style>
        input, select, textarea {
            font-size: 16px;
        }
    </style>
    <title>chat</title>

</head>
<body>
<nav class="navbar navbar-default  navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">ABBYY</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Friends <span class="sr-only">(current)</span></a></li>
                <li><a href="{{URL::to('chat')}}">Chat Room</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">posts <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{URL::to('posts')}}">My Posts</a></li>
                        <li><a href="{{URL::to('all-posts')}}">All Posts</a></li>
                    </ul>
                </li>
                <li><a href="{{URL::to('post-types')}}">Manage Types</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Post Types <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @foreach($post_types as $type)
                            <li><a href="{{URL::to('post-type/'.$type->id.'/posts')}}">{{$type->name}}</a></li>
                        @endforeach
                    </ul>
                </li>
            </ul>
            {{--<form class="navbar-form navbar-left" role="search" action="{{URL::to('posts/search')}}" method="post">--}}
                {{--<div class="form-group">--}}
                    {{--<input type="text" name="title" class="form-control" placeholder="Search">--}}
                {{--</div>--}}

                {{--<button type="submit" class="btn btn-default">Submit</button>--}}
            {{--</form>--}}

            {!! Form::open(['url' => 'posts/search', 'class' => 'navbar-form navbar-left']) !!}
            {!! Form::input('text', 'title', '', array('class' => 'form-control', 'placeholder' => 'Search')) !!}
            {!! Form::submit('Submit', array('class' => 'btn btn-default')) !!}
            {!! Form::close() !!}
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
                    <li><img src="{{Auth::user()->icon_url}}" style="max-height: 40px; max-width: 40px; margin-top: 15px;" class="img-circle"></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">{{Auth::user()->name}} <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{URL::to('users/edit')}}">Edit Profile</a></li>
                            <li><a href="auth/logout">Logout</a></li>
                        </ul>
                    </li>
                    @else
                    <li><a href="auth/login">Login</a></li>
                @endif
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<div class="container">
    @yield('content')
</div>
</body>

<script src="//js.pusher.com/3.0/pusher.min.js"></script>
<script src="/js/jquery-2.1.4.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/app.js"></script>
