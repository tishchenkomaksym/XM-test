@extends('layouts.app')

@section('content')
    <div class="row justify-content-lg-right">
        <div class="col-lg-auto">
            <form id="form" method="POST" action="{{ route('companies.show') }}">
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
                    <div id="message-error-start" style="color: red"></div>
                </div>
                <div class="mb-3">
                    <label for="end_date" class="form-label">End Date</label>
                    <input type="text" class="form-control" id="end_date" name="end_date" autocomplete="off" value="{{ old('end_date') }}">
                    <div id="message-error-end" style="color: red"></div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email </label>
                    <input type="email" required class="form-control" id="email" name="email" aria-describedby="emailHelp" value="{{ old('email') }}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <script>

        document.querySelector("#form").addEventListener("submit", function(e){
            e.preventDefault();
            let messageErrEnd = document.getElementById('message-error-end');
            let messageErrStart = document.getElementById('message-error-start');
            messageErrEnd.innerText = '';
            messageErrStart.innerText = '';
            let startDate = document.getElementById('start_date');
            let endDate = document.getElementById('end_date');
            startDate = new Date(startDate.value);
            endDate = new Date(endDate.value);
            let now = new Date();
            let valid = true;
            if(endDate >= startDate && endDate <= now) {
            }else {
                messageErrEnd.innerText = "Invalid end date";
                valid = false
            }
            if(startDate <= endDate && startDate <= now) {
            }else {
                messageErrStart.innerText = "Invalid start date";
                valid = false
            }
            if(valid){
                this.submit()
            }

        });


    </script>
@endsection
