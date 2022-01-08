<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('asset/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('asset/css/app.css')}}">
    <script src="{{asset('asset/js/jquery-3.5.1.min.js')}}"></script>

</head>

<body style="background-color: #FFFAEF">
    @include('shared-layout.header')

    <div class="container p-5">
        @yield('content')
    </div>
    @include('shared-layout.footer')
</body>

<script src="{{asset('asset/js/popper.min.js')}}"></script>
<script src="{{asset('asset/js/bootstrap.min.js')}}"></script>
{{-- bootstrap.min.js nya versi 4.0, bukan bootstrap 5 --}}
<script src="{{asset('asset/js/bootstrap.js')}}"></script>

<!--
<script src="{{asset('asset/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('asset/js/bootstrap.js.map')}}"></script> -->
<script>
    $(document).ready(function(){
        $('#myModal').on('shown.bs.modal', function() {
            $('#myInput').trigger('focus')
        })
    });

</script>
@yield('script')
</html>
