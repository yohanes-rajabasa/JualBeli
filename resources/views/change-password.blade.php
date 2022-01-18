@extends('shared-layout.layout')

@section('title')
<title>Change Password</title>

@section('content')
<title>Change Password Page</title>
<style>
    .form-change-password{
        border: 5px solid#222020;
        background-color: #A90011;
        width: 60%;
        height: 310px;
        margin: auto;
        text-align: center;
        border-radius: 20px;
        margin-top: 20px;
        margin-bottom: 20px;
    }
    .form-change-password h4{
        color: #f9f6ef;
        padding-top: 20px;
        margin: 0;
    }
    .current-password-label{
        margin-right: 60px;
    }
    .new-password-label{
        margin-right: 80px;
    }
    .new-confirm-password-label{
        margin-right: 25px;
    }
    .form-input{
        color: #f9f6ef;
        font-size: 14px;
    }
    .text-input{
        margin-top: 25px;
        border-radius: 5px;
        border: none;
        height: 25px;
        width: 200px;
        padding-left: 5px;
    }
    .change-password-button{
        height: 30px;
        width: 140px;
        border-radius: 10px;
        text-align: center;
        background-color:  #f9f6ef;
        margin-top: 20px;
        margin-left: auto;
        margin-right: auto;
        text-decoration: none;
        border: none;
        font-size: 12px;
        color: #A90011;
    }
    .change-password-button:hover{
        background-color: #e9d4f0;
    }
</style>
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if($errors)
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
    @endif
    <form class="form-change-password" action="/changepassword" method="POST">
        @csrf
        <h4>Change Password</h4>
        <div class="form-group {{ $errors->has('current-password') ? ' has-error' : '' }}">
            <div class="form-input">
                <label for="current-password" class="current-password-label">Current Password</label>
                <input id="current-password" name="current-password" type="password" class="text-input" required>
                @if ($errors->has('current-password'))
                <span class="help-block">
                    <strong>{{ $errors->first('current-password') }}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="form-group {{ $errors->has('new-password') ? ' has-error' : '' }}">
            <div class="form-input">
                <label for="new-password" class="new-password-label">New Password</label>
                <input id="new-password" name="new-password" type="password" class="text-input" required>
                <div>
                    @if ($errors->has('new-password'))
                        <span class="help-block">
                            <strong style="font-size: 10px; color:white; margin-left:200px">{{ $errors->first('new-password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="form-group {{ $errors->has('new-password-confirm') ? ' has-error' : '' }}">
            <div class="form-input">
                <label for="new-password-confirm" class="new-confirm-password-label">New Confirm Password</label>
                <input id="new-password-confirm" name="new-password-confirm" type="password" class="text-input" required>
            </div>
        </div>
        <button type="submit" class="change-password-button">Change Password</button>
    </form>
@endsection