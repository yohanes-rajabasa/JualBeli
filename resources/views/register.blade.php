@extends('shared-layout.layout')

@section('title')
<title>Register</title>

@section('content')
<style>
    .register-form{
        width: 550px;
        border: 5px solid;
        border-color: #A90011;
        border-radius: 20px;
    }
    .form-group{
        padding-left: 20px;
        padding-right: 20px;
    }
</style>
<div class="d-flex justify-content-between">
    <div class="d-flex flex-wrap align-items-center">
        <img src="{{ asset('/storage/register-logo.png') }}" width="500px">
    </div>
    <div class="right mx-5">
        <h2 class="text-center" style="color: #A90011">Register Here !</h2>
        <form class="mt-4 register-form" action="/register/seller" method="POST">
            @csrf
            <div class="form-group">
                <label class="pt-4" style="color: #A90011; font-size: 20px">Name</label>
                <input type="text" class="form-control mt-2 @error('name') is-invalid @enderror" name="name" placeholder="Enter name" style="border-color: #A90011" required value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label class="pt-4" style="color: #A90011; font-size: 20px">Email</label>
                <input type="email" class="form-control mt-2 @error('email') is-invalid @enderror" name="email" placeholder="Enter email" style="border-color: #A90011" required value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label class="pt-4" style="color: #A90011; font-size: 20px">Password</label>
                <input type="password" class="form-control mt-2 @error('password') is-invalid @enderror" name="password" placeholder="Password" style="border-color: #A90011" required>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label class="pt-4" style="color: #A90011; font-size: 20px">Address</label>
                <input type="text" class="form-control mt-2 @error('address') is-invalid @enderror" name="address" placeholder="Address" style="border-color: #A90011" required value="{{ old('address') }}">
                @error('address')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-check mt-4 mb-4">
                <input type="checkbox" class="form-check-input" name="check-term" style="margin-left: 5px; border-color:#A90011" required>
                <label class="form-check-label" style="margin-left: 10px; color:#A90011">I accept the terms of service and privacy policy</label>
            </div>

            <div class="d-grid gap-2 mb-3 mx-3">
                <button type="submit" class="btn btn-primary" style="background-color: #A90011; border:none">Register as Seller</button>
                <button type="submit" formaction="/register/customer" class="btn btn-primary" style="background-color: #A90011; border:none">Register as Customer</button>
            </div>

            <p class="text-center">Already have an account? <a href="/login">Login</a> here</p>
        </form>
    </div>
</div>
@endsection