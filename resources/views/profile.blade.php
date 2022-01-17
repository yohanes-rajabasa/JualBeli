@extends('shared-layout.layout')

@section('title')
<title>Profile</title>

@section('content')
<style>
    .avatar{
        border-color: #A90011;
    }
    .file-upload{
        width: 300px;
    }
    .edit-profile{
        float: right;
    }
</style>
<form enctype="multipart/form-data" action="/profile/edit" method="POST">
    @csrf
    {{ @method_field('PUT') }}
    <div class="row">
        <div class="col-4 text-center">
            <div class="profile mt-5">
                @if ($userData->picture_path == null)
                    <img class="avatar rounded-circle img-thumbnail border-3" src="/storage/profile-logo.png" width="250px" height="250px">
                @else
                    <img class="avatar rounded-circle" style="border: 3px solid #A90011; padding:5px;" src="{{ Storage::url($userData->picture_path) }}" width="250px" height="250px"> 
                @endif
                <div class="mt-4">
                    <input class="file-upload form-control form-control-sm mx-5" name="picture_path" style="border-color: #A90011" type="file">
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="form-group">
                <label class="pt-4" style="color: #A90011; font-size: 20px">Name</label>
                <input type="text" class="form-control mt-2 @error('name') is-invalid @enderror" name="name" placeholder="Enter name" style="border-color: #A90011" required value="{{ old('name') !== null ? old('name') : $userData->name}}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label class="pt-4" style="color: #A90011; font-size: 20px">Email</label>
                <input type="email" class="form-control mt-2 @error('email') is-invalid @enderror" name="email" placeholder="Enter email" style="border-color: #A90011" required value="{{ old('email') !== null ? old('email') : $userData->email}}">
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
                <label class="pt-4" style="color: #A90011; font-size: 20px">Date of Birth</label>
                <input type="date" name="dob" class="form-control mt-2 @error('dob') is-invalid @enderror"  placeholder="Date of Birth" style="border-color: #A90011" required value="{{ old('dob') !== null ? old('dob') : $userData->dob}}">
                @error('dob')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label class="pt-4" style="color: #A90011; font-size: 20px">Address</label>
                <input type="text" class="form-control mt-2 @error('address') is-invalid @enderror" name="address" placeholder="Address" style="border-color: #A90011" required value="{{ old('address') !== null ? old('address') : $userData->address}}">
                @error('address')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mt-5">
                <button type="submit" class="edit-profile btn btn-primary" style="background-color: #A90011; border:none">Edit Profile</button>
            </div>
        </div>
    </div>
</form>
@endsection