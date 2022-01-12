@extends('Layouts.master')

@section('content')

@if($menu->isEmpty())
<p class="d-flex justify-content-center text-danger fs-4">No data</p>
@else

@if(isset($search))
  <p class="d-flex justify-content-center fs-2" style="color: #FFD700">Foods on {{$search}}</p>
@endif  

@if(isset($category))
  <p class="d-flex justify-content-center fs-2" style="color: #FFD700">Foods on {{$category->category_name}}</p>
@endif  

<div class="row row-cols-1 row-cols-md-3 g-4 d-flex justify-content-center">
@foreach($menu as $m)
  <div class="col">
    <div class="card bg-dark" style="width: 100%">
      <img src="{{URL::asset('storage/'.$m->menu_image)}}" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title d-flex justify-content-center" style="color: #FFD700">{{$m->menu_name}}</h5>
        <h5 class="card-title d-flex justify-content-center" style="color: #FFD700">{{$m->menu_price}}</h5>
        <form action="/cart" method="post" class="d-flex justify-content-center">
        @csrf
        <button class="btn btn-success">Add to Cart</button>
        <input type="hidden" value="{{$m->id}}" name="id">
        </form>
      </div>
    </div>
  </div>
@endforeach  
</div>
@endif
@endsection