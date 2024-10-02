@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Event Payment Management</h1>

        <table class="table table-striped">
            <thead>
            <tr>
                <th>Event Name</th>
                <th>Location</th>
                <th>Payment Method</th>
                <th>Company</th>
                <th>VAT Rate</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($eventPayments as $eventPayment)
                <tr>
                    <td>{{ $eventPayment->event->name }}</td>
                    <td>{{ $eventPayment->event->location }}</td>
                    <td>{{ $eventPayment->paymentMethod->name }}</td>
                    <td>{{ $eventPayment->company->name }}</td>
                    <td>{{ $eventPayment->vat_rate }}%</td>
                    <td>
                        <a href="{{ route('eventPayments.edit', $eventPayment->id) }}" class="btn btn-primary">Manage</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <a href="{{ route('eventPayments.create') }}" class="btn btn-success">Assign New Payment Method</a>
    </div>
@endsection
