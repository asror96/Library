<!doctype html>
<html lang="en">
<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Library</title>
</head>
<body style="background-color:#C5C6C7;">
<div class="container">
    <div class="container-fluid" style="height: 75%;">
        <div class="row flex-nowrap">
            <div class="bg-dark col-auto col-md-3 min-vh-100">
                <div class="bg-dark p-2">
                    <a class="d-flex text-decoration-none align-items-center text-white mt-1">
                        <span class="fs-3 d-none d-sm-inline">Admin panel</span>
                    </a>
                    <ul class="nav nav-pills flex-column mt-4">
                        <li class="nav-item">
                            <a href="{{route('user.index')}}" class="nav-link text-white" >
                                &#9783; <span class="fs-5 d-none d-sm-inline">User</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('book.index')}}" class="nav-link text-white" >
                                &#9783;<span class="fs-5 d-none d-sm-inline">Book</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('genre.index')}}" class="nav-link text-white" >
                                &#9783;<span class="fs-5 d-none d-sm-inline">Genre</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div style="margin-top: 3%;">
                @yield('content')
            </div>

        </div>
    </div>
</div>



</body>
</html>
