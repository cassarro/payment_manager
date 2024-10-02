@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create New Payment Method</h1>

        <form action="{{ route('eventPayments.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="payment_method_name">Payment Method Name:</label>
                <input type="text" class="form-control" id="payment_method_name" name="payment_method_name" required>
            </div>

            <div class="form-group">
                <label for="vat_rate">VAT Rate:</label>
                <input type="number" class="form-control" id="vat_rate" name="vat_rate" required>
            </div>

            <div class="form-group">
                <label for="company">Link to Company:</label>
                <select name="company" class="form-control" required>
                    <option value="">Choose a company</option>
                    @foreach($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Create Payment Method</button>
        </form>
    </div>
@endsection
