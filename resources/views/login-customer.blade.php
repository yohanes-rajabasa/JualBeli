@extends('shared-layout.layout')

@section('title')
    Login Customer
@endsection

@section('content')
    <p>login customer</p>
    <form action="/auth/login/customer" method="post">
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
    <a href="/auth/login/seller">Login as Seller</a>
@endsection