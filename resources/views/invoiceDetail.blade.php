@extends('Layouts.master')

@section('content')

@if($detail->isEmpty())
<p class="d-flex justify-content-center text-danger fs-4">No data</p>
@else
<table class="table table-bordered table-success">
    <thead>
        <tr>
            <th class="col">Name</th>
            <th class="col">Price</th>
        </tr>
    </thead>
        <tbody>
            @foreach($detail as $d)
            <tr>
                    <td class="col">{{ $d->menu_name }}</td>
                    <td class="col">{{ $d->menu_price }}</td>
                    </td>
            </tr>
            @endforeach
        </tbody>
</table>
@endif
@endsection