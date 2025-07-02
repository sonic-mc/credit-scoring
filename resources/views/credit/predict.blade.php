@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Predict Credit Score</h2>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('credit.predict') }}" class="row g-3">
        @csrf

        <div class="col-md-6">
            <label class="form-label">Principal Amount</label>
            <input type="number" name="principal_amount" class="form-control" required>
        </div>

        <div class="col-md-6">
            <label class="form-label">Monthly Interest Rate</label>
            <input type="number" step="0.01" name="monthly_interest_rate" class="form-control" required>
        </div>

        <div class="col-md-6">
            <label class="form-label">Loan Tenure (Months)</label>
            <input type="number" name="loan_tenure" class="form-control" required>
        </div>

        <div class="col-md-6">
            <label class="form-label">Monthly Salary</label>
            <input type="number" name="monthly_salary" class="form-control" required>
        </div>

        <div class="col-md-6">
            <label class="form-label">Loan-to-Income Ratio</label>
            <input type="number" step="0.01" name="loan_to_income" class="form-control" required>
        </div>

        <div class="col-md-6">
            <label class="form-label">Customer Age</label>
            <input type="number" name="customer_age" class="form-control" required>
        </div>

        <div class="col-md-6">
            <label class="form-label">Has Guarantor?</label>
            <select name="has_guarantor" class="form-select" required>
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>

        <div class="col-md-6">
            <label class="form-label">Number of Installments</label>
            <input type="number" name="num_installments" class="form-control" required>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Predict</button>
        </div>
    </form>
</div>
@endsection
