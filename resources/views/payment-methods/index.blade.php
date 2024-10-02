<!-- resources/views/payment-methods/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Available Payment Methods</h1>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Payment Method Name</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($paymentMethods as $paymentMethod)
                <tr>
                    <td>{{ $paymentMethod->id }}</td>
                    <td>{{ $paymentMethod->name }}</td>
                    <td>
                        <a href="#" class="btn btn-primary">Edit</a>
                        <a href="#" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
