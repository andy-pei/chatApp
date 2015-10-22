<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <title>Socket.IO chat</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font: 13px Helvetica, Arial; }
        form { background: #000; padding: 3px; position: fixed; bottom: 0; width: 100%; }
        #msg { border: 0; padding: 10px; width: 90%; margin-right: .5%; }
        #send { width: 9%; background: rgb(130, 224, 255); border: none; padding: 10px; }
        /*#messages { list-style-type: none; margin: 0; padding: 0; }*/
        /*#messages li { padding: 5px 10px; }*/
        /*#messages li:nth-child(odd) { background: #eee; }*/
    </style>
</head>
<body>
<div class="col-lg-4">
<ul id="messages" class="list-group">

</ul>
</div>
{!! Form::open() !!}
{!! Form::input('text', 'msg', '', array('id'=>'msg')) !!}
{!! Form::button('Send', array('id' => 'send')) !!}
{!! Form::input('hidden', 'user_id', $user_id, array('id' => 'user_id')) !!}

{!! Form::close() !!}

</body>
</html>

<script src="//js.pusher.com/3.0/pusher.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){

        var pusher = new Pusher('cd354db57a697fb3d7b4');
        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
            if(data.user_id == $('#user_id').val()) {
                $('#messages').append('<li class="row list-group-item" style="background-color: #BCA9F5;"><p class="pull-right">' + data.message + '</p></li>');
            } else {
                $('#messages').append('<li class="row list-group-item" style="background-color: #F781D8;"><p>' + data.message + '</p></liv>');
            }
        });

        $('#send').click(function() {
            $.ajax({
                headers:
                {
                    'X-CSRF-Token': $('input[name="_token"]').val()
                },
                method: "POST",
                url: "/chat",
                data: { msg: $('#msg').val()}

            }).done(function(data){
                console.log($('input[name="_token"]').val());
            });
//            $.get('/store').done(function(data){
//                $('#messages').append('<li>' + data.message + '</li>');
//            });
        });
    });

</script>