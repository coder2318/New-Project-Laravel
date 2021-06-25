<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div>
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('welcome')}}">Welcome</a>
        </li>
       @can('create', \App\Product::class)
        <li class="nav-item">
            <a class="nav-link" href="{{route('product.create')}}">Product Create</a>
        </li>
        @endcan
        <li class="nav-item">
            <a class="nav-link" href="{{route('product.index')}}">Product List</a>
        </li>
    </ul>
</div>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>



