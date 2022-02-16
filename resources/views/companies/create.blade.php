@extends('layouts.app')

@section('content')
    <div class="row justify-content-lg-right">
        <div class="col-lg-auto">
            <form method="POST" action="{{ route('companies.store') }}">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="mb-3">
                    <label for="symbol" class="form-label">Symbol</label>
                    <input type="text" required class="form-control" id="symbol" name="symbol" value="{{ old('symbol') }}">
                </div>
                <div class="mb-3">
                    <label for="start_date" class="form-label">Start Date</label>
                    <input type="text" required class="form-control" id="start_date" name="start_date" autocomplete="off" value="{{ old('start_date') }}">
                </div>
                <div class="mb-3">
                    <label for="end_date" class="form-label">End Date</label>
                    <input type="text" class="form-control" id="end_date" name="end_date" autocomplete="off" value="{{ old('end_date') }}">

                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email </label>
                    <input type="email" required class="form-control" id="email" name="email" aria-describedby="emailHelp" value="{{ old('email') }}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
