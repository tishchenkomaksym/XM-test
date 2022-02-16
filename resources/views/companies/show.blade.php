@extends('layouts.app')

@section('content')

{{--    <div class="d-flex flex-row mb-3">--}}
{{--        <a href="{{ route('companies.edit', $company) }}" class="btn btn-primary mr-1">Edit</a>--}}
{{--    </div>--}}

    <table class="table table-bordered table-striped">
        <tbody>
        <tr>
            <th>ID</th><td>{{ $company->id }}</td>
        </tr>
        <tr>
            <th>Symbol</th><td>{{ $company->symbol }}</td>
        </tr>
        <tr>
            <th>Start Date</th><td>{{ $company->start_date->format('Y-m-d') }}</td>
        </tr>
        <tr>
            <th>End Date</th><td>{{ $company->end_date->format('Y-m-d') }}</td>
        </tr>
        <tr>
            <th>
                Email
            </th>
            <td>{{ $company->email }}</td>
        </tr>
        </tbody>
    </table>

@endsection
