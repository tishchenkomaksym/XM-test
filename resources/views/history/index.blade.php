@extends('layouts.app')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Date</th>
            <th scope="col">Open</th>
            <th scope="col">High</th>
            <th scope="col">Low</th>
            <th scope="col">Close</th>
            <th scope="col">Volume</th>
        </tr>
        </thead>
        <tbody>
        @foreach($historyPrices as $key => $value)
            <tr>
                <th scope="row">{{ $key }}</th>
                <td>{{ $value->date }}</td>
                <td>{{ $value->open }}</td>
                <td>{{ $value->high }}</td>
                <td>{{ $value->low }}</td>
                <td>{{ $value->close }}</td>
                <td>{{ $value->volume }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
