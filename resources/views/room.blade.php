<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
    <style>
        #messageBox {
            border: 1px solid #ccc;
            min-height: 100px;
            overflow-y: scroll;
        }
    </style>
</head>
<body data-id="{{Auth::id()}}" data-group-id="{{$groupId}}">
<div id="app"></div>
<div class="container">
    <div  class="mt-4 py-2">
        <div id="messageBox" class="row py-2 m-0">
            @if(count($conversation) > 0)
                @foreach($conversation as $conver)
                    @if($conver->user->id != Auth::id())
                        <div class="col-12">
                            <img src="{{$conver->user->avatar}}" class="float-start img-fluid rounded-circle" alt="avatar" style="width: 60px; height: 60px">
                            <div class="col-8 col-md-7 col-lg-6 alert alert-primary float-start mx-2" role="alert">{{$conver->message}}</div>
                        </div>
                    @else
                        <div class="col-12"><div class="col-8 col-md-7 col-lg-6 alert alert-success float-end" role="alert">{{$conver->message}}</div></div>
                    @endif
                @endforeach
            @endif
        </div>
    </div>
    <div class="form-floating">
        <textarea id="mess" class="form-control" placeholder="Leave a comment here" style="height: 100px"></textarea>
        <label for="floatingTextarea2">Message</label>
    </div>
    <input type="hidden" value="{{csrf_token()}}" name="_token">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('js/app.js')}}"></script>
    <script>
        var id = $('body').attr('data-id');
        var groupId = $('body').attr('data-group-id');


        // Echo.channel('chat')
        // .listen('.chat', function (e) {
        //     data = e.message;
        //     console.log(e)
        //     if (id == data.id) {
        //         $('#messageBox').append(getHtml('html2', data));
        //     } else {
        //         $('#messageBox').append(getHtml('html1', data));
        //     }
        // });

        Echo.private('room.'+groupId)
            .listen('.room.'+groupId, (e) => {
                data = e.message;
                if (id == data.userId) {
                    $('#messageBox').append(getHtml('html2', data));
                } else {
                    $('#messageBox').append(getHtml('html1', data));
                }
            });

        $(document).keyup(function(e) {
            if(e.which == 13) {
                var mess = $('#mess').val();
                $('#mess').val('');
                $("#messageBox").scrollTop(function() { return this.scrollHeight; });

                if (mess != undefined || mess.length > 0) {
                    var token = $('input[name="_token"]').val();
                    data = {
                        message: mess,
                        userId: id,
                        groupId: groupId,
                        _token: token
                    }

                    $.ajax({
                        url: '{{route('chat-room')}}',
                        type: 'post',
                        data:data
                    })
                }

                return false;
            }
        });

        function getHtml(val, data) {
            switch (val) {
                case 'html1':
                    return '<div class="col-12">'+
                        '<img src="'+data.avatar+'" class="float-start img-fluid rounded-circle" alt="avatar" style="width: 60px; height: 60px">'+
                        '<div class="col-8 col-md-7 col-lg-6 alert alert-primary float-start mx-2" role="alert">'+
                        data.message +
                        '</div>'+
                        '</div>'
                case 'html2':
                    return '<div class="col-12">'+
                        '<div class="col-8 col-md-7 col-lg-6 alert alert-success float-end" role="alert">'+
                        data.message+
                        '</div>'+
                        '</div>'
                case 'error':
                    return '<div class="col-12">'+
                        '<div class="col-8 col-md-7 col-lg-6 alert alert-danger float-end" role="alert">'+
                        data.message+
                        '</div>'+
                        '</div>'
            }
        }
    </script>
</div>
</body>
</html>
