@extends('Layouts.master')

@section('content')
@if($invoice->isEmpty())
<p class="d-flex justify-content-center text-danger fs-4">No data</p>
@else
<table class="table table-bordered table-success">
    <thead>
        <tr>
            <th class="col">Created at</th>
            <th class="col">action</th>
        </tr>
    </thead>
        <tbody>
            @foreach($invoice as $i)
            <tr>
                    <td class="col">{{ $i->created_at }}</td>
                    <td class="col">
                    <form action="/invoiceDetail" method="post">
                    @csrf
                    <button type="submit" class="btn btn-success">Check Detail</button>
                    <input type="hidden" value="{{$i->id}}" name="id">
                    </form>
                    </td>
            </tr>
            @endforeach
        </tbody>
</table>
@endif
@endsection