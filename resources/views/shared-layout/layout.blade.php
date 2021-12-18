<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('asset/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('asset/css/app.css')}}">
</head>
<body>
    @include('shared-layout.header')

    <div class="container p-5">
        @yield('content')
    </div>
    @include('shared-layout.footer')
</body>
    <script src="{{asset('asset/js/bootstrap.js')}}"></script>
</html>