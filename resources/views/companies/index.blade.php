@extends('layouts.app')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Symbol</th>
            <th scope="col">Start Date</th>
            <th scope="col">End Date</th>
            <th scope="col">Email</th>
        </tr>
        </thead>
        <tbody>
        @foreach($companyRegistry as $key => $value)
            <tr>
                <th scope="row">{{ $key }}</th>
                <td>{{ $value->symbol }}</td>
                <td>{{ $value->start_date->format('Y-m-d') }}</td>
                <td>{{ $value->end_date->format('Y-m-d') }}</td>
                <td>{{ $value->email }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {!! $companyRegistry->links() !!}
    </div>
@endsection
