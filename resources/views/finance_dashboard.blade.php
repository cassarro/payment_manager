@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Finance Dashboard</h1>

        <h2>Events</h2>
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Location</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($events as $event)
                <tr>
                    <td>{{ $event->name }}</td>
                    <td>{{ $event->location }}</td>
                    <td>{{ $event->date }}</td>
                    <td>
                        <a href="{{ route('finance.editPayment', $event->id) }}" class="btn btn-primary">Manage Payment Methods</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <h2>Request New Payment Provider</h2>
        <form action="{{ route('finance.storePaymentProviderRequest') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="payment_method_name">Payment Method Name</label>
                <input type="text" class="form-control" id="payment_method_name" name="payment_method_name" required>
            </div>
            <div class="form-group">
                <label for="website">Website</label>
                <input type="url" class="form-control" id="website" name="website" required>
            </div>
            <div class="form-group">
                <label for="event">Event</label>
                <select class="form-control" id="event" name="event_id" required>
                    @foreach($events as $event)
                        <option value="{{ $event->id }}">{{ $event->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="company">Company</label>
                <select class="form-control" id="company" name="company_id" required>
                    @foreach($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Request Payment Provider</button>
        </form>
    </div>
@endsection
