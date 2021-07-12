<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    <title>Home</title>
</head>
<body data-id="{{Auth::id()}}">
<div id="app"></div>
<div class="container">
    <div style="position: absolute; right: 10px;">
        @if(Auth::check())
            <form action="{{route('logout')}}" method="post">
                @csrf
                <input type="submit" class="btn btn-warning" value="Log out">
            </form>

        @endif
    </div>
    <p><h3>List Friend</h3></p>

    @if(count($groups) > 0)
        @foreach($groups as $group)
            @php
                $check = false;
            @endphp
            @foreach($userGroup as $gr)
                @if($group->id == $gr['id'])
                    @php
                        $check = true;
                    @endphp
                    @break
                @endif
            @endforeach

            @if($check)
                <a href="{{route('join', ['group_id'=>$group->id, 'user_id'=>Auth::id()])}}" class="btn btn-success mx-2">{{$group->name}}</a>
                <a href="{{route('leave', ['user_id'=>Auth::id(), 'group_id'=>$group->id])}}">Leave</a>
            @else
                <a href="{{route('join', ['group_id'=>$group->id, 'user_id'=>Auth::id()])}}" class="btn btn-success mx-2">Join {{$group->name}}</a>
            @endif
        @endforeach
    @endif
    <p class="text-muted my-2"><small>{{count($users) ?? 0}} Friends</small></p>
    @if(count($users) > 0)
        @foreach($users as $user)
            <div class="card mb-3 border-0 d-flex">
                <div class="row g-0 ">
                    <div class="w-auto position-relative">
                        <a href="{{route('chat', ['id'=>$user->id])}}">
                            <img src="{{$user->avatar}}" class="img-fluid rounded-circle" alt="avatar" style="width: 60px; height: 60px">
                        </a>
                    </div>
                    <div class="col-md-8" style="padding-left: 5px">
                        <div class="card-body pt-0">
                            <h6 class="card-title"><a href="{{route('chat', ['id'=>$user->id])}}" style="text-decoration: none; color: black">{{$user->name}}</a></h6>
                            <p class="card-text mb-1 text-truncate"><small>{{$user->message ? $user->message->first : ''}}</small></p>
                            @if($user->active)
                                <p class="card-text">
                                     <span class="p-1 badge bg-success rounded-circle">
                                     </span><small class="text-muted mx-1">online</small>
                                </p>
                            @else
                                <p class="card-text"><small class="text-muted">{{$user->updated_at->diffForHumans()}}</small></p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <p>No friends in list</p>
    @endif

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="{{asset('js/app.js')}}"></script>
    <script>
        Echo.channel('public')
        .listen('NotifyLogin', (e) => {
            console.log(e)
            toastr["info"](e.name + "just logged in!")
        });
    </script>
</div>
</body>
</html>
