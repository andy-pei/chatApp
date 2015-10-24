@extends('master')

@section('content')
    <div class="row" style="height: 400px; overflow: scroll">
        <div class="col-xs-12">
            <ul id="messages" class="list-group">

            </ul>
        </div>
    </div>
    <div class="row" style="margin-top: 20px; height: 100px;">
        <div class="col-xs-6">
            {!! Form::open() !!}
            {!! csrf_field() !!}
            {!! Form::input('text', 'msg', '', array('id'=>'msg', 'class' => 'form-control input-lg"', 'style' => 'font-size: 20px;')) !!}
            <p id="typing"></p>
            {!! Form::button('Send', array('id' => 'send', 'class' => 'btn btn-primary form-control')) !!}
            {!! Form::input('hidden', 'user_id', $user->id, array('id' => 'user_id')) !!}
            {!! Form::input('hidden', 'user_name', $user->name, array('id' => 'user_name')) !!}


            {!! Form::close() !!}
        </div>
    </div>


    <script src="//js.pusher.com/3.0/pusher.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {

            var pusher = new Pusher('cd354db57a697fb3d7b4');
            var channel = pusher.subscribe('my-channel');
            channel.bind('my-event', function (data) {
                if (data.user_id == $('#user_id').val()) {
                    $('#messages').append('<li class="row list-group-item" style="background-color: #BCA9F5;"><p class="pull-right" style="margin-right: 20px;">' + data.message + '</p></li>');
                    $('#msg').val('');
                } else {
                    $('#messages').append('<li class="row list-group-item" style="background-color: #F781D8;"><p>' + data.message + '</p></liv>');
                    $('#msg').val();
                }
            });

            //listen if a user is typing
            channel.bind('isTyping', function (data) {
                if($('#user_id').val() != data.user_id) {
                    $('#typing').text(data.message);
                }
            });

            $('#send').click(function () {
                $.ajax({
                    headers: {
                        'X-CSRF-Token': $('input[name="_token"]').val()
                    },
                    method: "POST",
                    url: "/chat",
                    data: {msg: $('#msg').val()}

                }).done(function (data) {
                    console.log($('input[name="_token"]').val());
                });
            });

            $('#msg').focus(function () {
                $.ajax({
                    headers: {
                        'X-CSRF-Token': $('input[name="_token"]').val()
                    },
                    method: "POST",
                    url: "/typing",
                    data: {msg: $('#user_name').val() + ' is typing...'}

                }).done(function (data) {

                });
            });

            $('#msg').blur(function () {
                $.ajax({
                    headers: {
                        'X-CSRF-Token': $('input[name="_token"]').val()
                    },
                    method: "POST",
                    url: "/typing",
                    data: {msg: ''}

                }).done(function (data) {

                });
            });

        });

    </script>

@endsection