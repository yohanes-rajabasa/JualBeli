@extends('shared-layout.layout')

@section('title')
<title>Profile</title>

@section('content')
<style>
    .avatar{
        border-color: #A90011;
    }
    .file-upload{
        width: 230px;
    }
    .edit-profile{
        float: right;
    }
</style>
<form action="">
    <div class="row">
        <div class="col-4 text-center">
            <div class="profile mt-5">
                <img class="avatar rounded-circle img-thumbnail border-3" src="{{ asset('/storage/profile-logo.png') }}" width="250px" height="250px">
                <div class="mt-4">
                    <input class="file-upload form-control form-control-sm mx-5" style="border-color: #A90011" type="file" required>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="form-group">
                <label class="pt-4" style="color: #A90011; font-size: 20px">Name</label>
                <input type="text" class="form-control mt-2" placeholder="Enter name" style="border-color: #A90011">
            </div>
            <div class="form-group">
                <label class="pt-4" style="color: #A90011; font-size: 20px">Email</label>
                <input type="email" class="form-control mt-2" aria-describedby="emailHelp" placeholder="Enter email" style="border-color: #A90011">
            </div>
            <div class="form-group">
                <label class="pt-4" style="color: #A90011; font-size: 20px">Password</label>
                <input type="password" class="form-control mt-2" placeholder="Password" style="border-color: #A90011">
            </div>
            <div class="form-group">
                <label class="pt-4" style="color: #A90011; font-size: 20px">DoB</label>
                <input type="date" class="form-control mt-2"  placeholder="Date of Birth" style="border-color: #A90011">
            </div>
            <div class="form-group">
                <label class="pt-4" style="color: #A90011; font-size: 20px">Address</label>
                <input type="text" class="form-control mt-2"  placeholder="Address" style="border-color: #A90011">
            </div>

            <div class="mt-5">
                <button type="submit" class="edit-profile btn btn-primary" style="background-color: #A90011; border:none">Edit Profile</button>
            </div>
        </div>
    </div>
</form>
@endsection