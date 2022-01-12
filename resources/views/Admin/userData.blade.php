@extends('Layouts.master')

@section('content')
@if($user->isEmpty())
<p class="d-flex justify-content-center text-danger fs-4">No data</p>
@else
<p class="d-flex justify-content-center fs-2" style="color: #FFD700">User Data</p>
<table class="table table-bordered table-success">
    <thead>
        <tr>
            <th class="col">Name</th>
            <th class="col">Email</th>
            @if(auth()->user()->role == 3)
            <th class="col">Action</th>
            @endif
        </tr>
    </thead>
        <tbody>
            @foreach($user as $u)
            <tr>
                    <td class="col">{{ $u->name }}</td>
                    <td class="col">{{ $u->email }}</td>
                    @if(auth()->user()->role == 3)
                    <td class="col d-flex">
                    <form action="/userDelete" method="post" class="d-flex mx-2">
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                    <input type="hidden" value="{{$u->id}}" name="id">
                    </form>

                    <form action="/userUpdate" method="post" class="d-flex">
                    @csrf
                    <button type="submit" class="btn btn-primary">Update</button>
                    <input type="hidden" value="{{$u->id}}" name="id">
                    </form>
                    </td>
                    @endif
            </tr>
            @endforeach
            {{ $user->links() }}
        </tbody>
</table>
@endif
@endsection