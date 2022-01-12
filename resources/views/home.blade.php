@extends('Layouts.master')

@section('content')


<form action="/search" method="post" class="d-flex justify-content-center my-2">
    @csrf
   <input class="form-control" type="search" placeholder="Search" aria-label="Search" name="search" style="width: 50%">
   <button class="btn btn-success" type="submit">Search</button>
</form>
                        

<p class="d-flex justify-content-center fs-2 my-2 mt-5" style="color: #FFD700">Explore Various Food Categories</p>
<div class="row row-cols-1 row-cols-md-3 g-4 d-flex justify-content-center">
@foreach($category as $c)
<a href="/menu/{{$c->id}}" style="text-decoration: none">
  <div class="col">
    <div class="card bg-dark" style="width: 100%">
      <img src="{{asset('storage/'.$c->category_image)}}" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title d-flex justify-content-center" style="color: #FFD700">{{$c->category_name}}</h5>
      </div>
    </div>
  </div>
</a>
@endforeach  
</div>
@endsection