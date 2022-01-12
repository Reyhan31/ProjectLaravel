@extends('Layouts.master')

@section('content')

<p class="d-flex justify-content-center fs-2" style="color: #FFD700">Add Product</p>

@if(session()->has('condition'))

<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session('condition')}}
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

@endif

<div class="container-sm">
    <form method="post" action="/addProduct" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <select class="form-select form-select mb-3 @error('category_id') is-invalid @enderror" aria-label=".form-select-lg example" name="category_id">
                <option selected value=0>Select Category</option>
                @foreach($category as $c)
                    <option value="{{$c->id}}">{{$c->category_name}}</option>
                @endforeach
            </select>
            @error('category_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    <div class="mb-3">
        <label class="form-label" style="color: #FFD700">Product name</label>
        <input type="text" class="form-control @error('menu_name') is-invalid @enderror" id="menu_name" name="menu_name" value="{{old('menu_name')}}">
        @error('menu_name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label" style="color: #FFD700">Product price</label>
        <input type="text" class="form-control @error('menu_price') is-invalid @enderror" id="menu_price" name="menu_price" value="{{old('menu_price')}}">
        @error('menu_price')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="image" class="form-label" style="color: #FFD700">Input Image</label>
        <input class="form-control @error('menu_image') is-invalid @enderror" type="file" id="menu_image" name="menu_image">
    </div>
        @error('menu_image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    <button type="submit" class="btn btn-primary">Add Product</button>
    </form>

</div>

@endsection