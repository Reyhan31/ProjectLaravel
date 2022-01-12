@extends('Layouts.master')

@section('content')
<div class="d-flex m-2">
    <img src="{{URL::asset('storage/'.auth()->user()->image)}}" alt="" style="width: 13%">
    <div class="m-2">
    <form action="/changeProfile" method="post" enctype="multipart/form-data">
    @csrf
    <input class="form-control m-2 @error('image') is-invalid @enderror" type="file" id="formFile" name="image">
        @error('image')
            <div class="invalid-feedback m-1">
                {{ $message }}
            </div>
        @enderror
    <button type="submit" class="btn btn-success d-flex justify-content-center m-2">Change Picture</button>
    </form>
    </div>
</div>
<br>
<p class="fs-2" style="color: #FFD700">Name : {{auth()->user()->name}}</p>
<br>
<p class="fs-2" style="color: #FFD700">Email : {{auth()->user()->email}}</p>
@endsection