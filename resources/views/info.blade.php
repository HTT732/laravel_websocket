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
<body>
<div id="app"></div>
<div class="container">
    @if(isset($user))
    <div class="card-body row col-6">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Token</label>
            <textarea type="email" class="form-control" rows="5" id="exampleFormControlInput1">{{$user->token}}</textarea>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">ID</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" value="{{$user->id}}">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nick name</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" value="{{$user->nickname ?? 'Null'}}">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" value="{{$user->name}}">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" value="{{$user->email}}">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Avatar</label>
            <img src="{{$user->avatar}}" alt="" class="img-thumbnail">
        </div>
    </div>
    @endif

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="{{asset('js/app.js')}}"></script>

</div>
</body>
</html>
