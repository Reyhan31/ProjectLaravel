@extends('Layouts.master')

@section('content')
<div class="container-sm">
    <form method="post" action="/regis" enctype="multipart/form-data">
        @csrf
    <div class="mb-3">
        <label class="form-label" style="color: #FFD700">Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}">
        @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
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
    <div class="mb-3">
        <label for="image" class="form-label" style="color: #FFD700">Input Image</label>
        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image">
        @error('image')
            <div class="invalid-feedback m-1">
                {{ $message }}
            </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary m-2">Register</button>
    </form>

</div>

@endsection