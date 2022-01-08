@extends('shared-layout.layout')

@section('title')
    Login Seller
@endsection

@section('content')
<style>
    p{
        color: aliceblue;
    }
    label{
        color: aliceblue;
    }
    .containerlogin{
        background-image: url('{{asset('asset/login-background.png')}}');
    }
</style>
<div class="containerlogin">
    @section('content')
    <p>Login seller</p>
    <form action="/auth/login/seller" method="post">
        @csrf
        <label for="email">Email</label><br>
        <input type="email" name="email" id="email">
        <br>
        <br>
        <label for="password">Password</label><br>
        <input type="password" name="password" id="password">
        <br>
        <br>
        <input type="submit" value="Login">
    </form>
    <a href="/auth/login/customer">Login as Customer</a>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>  
@endsection