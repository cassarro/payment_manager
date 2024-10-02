<!-- resources/views/payment-provider-requests/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Create Payment Provider Request</h1>

    <form action="{{ route('paymentProviderRequests.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="payment_method_name">Payment Method Name</label>
            <input type="text" class="form-control" id="payment_method_name" name="payment_method_name" required>
        </div>

        <div class="form-group">
            <label for="website">Website</label>
            <input type="url" class="form-control" id="website" name="websit
