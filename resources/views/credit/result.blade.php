@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Prediction Result</h3>

    <div class="card mt-3">
        <div class="card-body">
            <p><strong>Status:</strong> {{ $result['status'] }}</p>
            <p><strong>Credit Score:</strong> {{ $result['credit_score'] }}</p>
            <p><strong>Reasons:</strong></p>
            <ul>
                @foreach($result['reasons'] as $reason)
                    <li>{{ $reason }}</li>
                @endforeach
            </ul>
        </div>
    </div>

    <a href="{{ route('credit.form') }}" class="btn btn-outline-secondary mt-3">Try Again</a>
</div>
@endsection
