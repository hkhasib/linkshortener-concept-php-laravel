@extends('layouts.auth')
@section('title')
    Login - LinkShortener
@endsection()
@section('main')
    <div class="col d-flex justify-content-center">
        <div class="card" style="width: 50%; padding: 30px">
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{session('success')}}
                </div>
            @elseif(session('warning'))
                <div class="alert alert-warning" role="alert">
                    {{session('warning')}}
                </div>
            @elseif(session('error'))
                <div class="alert alert-error" role="alert">
                    {{session('error')}}
                </div>
            @endif
            <form method="post" action="{{route('post.login')}}">
                @csrf
                <div class="form-group">
                    <label>Username</label>
                    <input name="username" type="text" class="form-control" placeholder="Enter Username">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>

                <br>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>

@endsection
