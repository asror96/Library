<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="app.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Library</title>
</head>
<body style="background-color:#C5C6C7;">
<div class="container">
    <div class="row">
        <nav class="navbar navbar-expand-lg navbar-light" style="font-size: large">
            <div class="container-fluid">
                <a class="navbar-brand" style="font-size: x-large" href="#">Admin</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link change-color-link" aria-current="page" href="{{route('user.index')}}">Users</a>
                        <a class="nav-link change-color-link" aria-current="page" href="{{route('book.index')}}">Books</a>
                        <a class="nav-link change-color-link" aria-current="page" href="{{route('genre.index')}}">Genres</a>
                    </div>
                </div>
            </div>
        </nav>
        @yield('content')
    </div>
</div>

</body>
</html>
