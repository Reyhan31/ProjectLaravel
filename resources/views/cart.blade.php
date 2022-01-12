@extends('Layouts.master')

@section('content')
@if($cart->isEmpty())
<p class="d-flex justify-content-center text-danger fs-4">No data</p>
@else
<table class="table table-bordered table-success">
    <thead>
        <tr>
            <th class="col">Name</th>
            <th class="col">Price</th>
            <th class="col">Action</th>
        </tr>
    </thead>
        <tbody>
            @foreach($cart as $c)
            <tr>
                    <td class="col">{{ $c->menu_name }}</td>
                    <td class="col">{{ $c->menu_price }}</td>
                    <td class="col">
                    <form action="/cartDelete" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                    <input type="hidden" value="{{$c->id}}" name="id">
                    </form>
                    </td>
            </tr>
            @endforeach
        </tbody>
</table>
<form action="/invoice" method="post">
    @csrf
    <button type="submit" class="btn btn-success">Check out</button>
</form>
@endif
@endsection