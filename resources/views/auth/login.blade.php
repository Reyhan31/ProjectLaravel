@extends('Layouts.master')

@section('content')
<div class="container-sm">

    @if(session()->has('loginError'))

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{session('loginError')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    @endif

    <form method="post" action="/login">
    @csrf
    <div class="mb-3">
        <label class="form-label" style="color: #FFD700">Email address</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{old('email')}}">
        @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label" style="color: #FFD700">Password</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
        @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary d-flex justify-content-center ">Submit</button>
    </form>

    <div>
        <a href="/login/github"><img src="https://img.icons8.com/fluency/48/000000/github.png"/></a>
        <a href="/login/google"><img src="https://img.icons8.com/fluency/48/000000/google-logo.png"/></a>
        
    </div>

</div>

@endsection