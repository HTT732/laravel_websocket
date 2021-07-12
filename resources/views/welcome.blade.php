<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Home</title>
</head>
<body data-id="{{Auth::id()}}">
<div id="app"></div>
<div class="container">
    <p><h3>List Friend</h3></p>
    <div class="card mb-3 border-0 d-flex">
        <div class="row g-0 ">
            <div class="w-auto">
                <img src="{{asset('media/avatar/default.jpg')}}" class="img-fluid rounded-circle" alt="avatar" style="width: 80px">
            </div>
            <div class="col-md-8">
                <div class="card-body pt-0">
                    <h6 class="card-title">Card title</h6>
                    <p class="card-text mb-1 text-truncate">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-3 border-0 d-flex">
        <div class="row g-0 ">
            <div class="w-auto">
                <a href="#">
                    <img src="{{asset('media/avatar/default.jpg')}}" class="img-fluid rounded-circle" alt="avatar" style="width: 80px">
                </a>
            </div>
            <div class="col-md-8">
                <div class="card-body pt-0">
                    <h6 class="card-title"><a href="#" style="text-decoration: none; color:deeppink">Card title</h6></a>
                    <p class="card-text mb-1 text-truncate">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text">
                         <span class="p-1 badge bg-danger rounded-circle">
                         </span>
                        <small class="text-muted">Offline</small>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="{{asset('js/app.js')}}"></script>
</div>
</body>
</html>
