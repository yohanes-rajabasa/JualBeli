@extends('shared-layout.layout')

@section('title')
    Login Seller
@endsection

@section('content')
<style>
    .title-login{
        color: aliceblue;
    }
    label{
        color: aliceblue;
    }
    .containerlogin{
        background-image: url('{{asset('asset/login-background.png')}}');
        padding: 100px;
        border-radius: 30px;
    }
</style>
<div class="containerlogin">
    
    <p class="h3 text-center title-login">Login Seller</p>
    <form action="/auth/login/customer" method="post">
        @csrf
        <label for="basic-url" class="form-label">Email</label>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
              </svg></span>
            <input type="text" class="form-control" placeholder="E-mail" aria-label="Username" aria-describedby="basic-addon1" name="email">
        </div>
    
        <label for="basic-url" class="form-label">Password</label>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key" viewBox="0 0 16 16">
                <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z"/>
                <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
              </svg></span>
            <input type="password" name="password" class="form-control" placeholder="password" aria-label="Username" aria-describedby="basic-addon1" name="email">
        </div>
        <br>
        <div class="d-grid gap-2">
            <button type="submit" class="btn-outline-apps">Login</button>
        </div>
        
    </form><br>
    <p class="text-center"><a href="/auth/login/customer" class="text-decoration-none title-login">Login as Customer</a></p>

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