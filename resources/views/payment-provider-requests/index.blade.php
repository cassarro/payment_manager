@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Payment Provider Requests</h1>
        <a href="{{ route('paymentProviderRequests.create') }}" class="btn btn-primary mb-3">Create New Request</a>

        @if ($requests->isEmpty())
            <div class="alert alert-warning">No payment provider requests found.</div>
        @else
            <table class="table">
                <thead>
                <tr>
                    <th>Payment Method Name</th>
                    <th>Website</th>
                    <th>Event ID</th>
                    <th>Company ID</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($requests as $request)
                    <tr>
                        <td>{{ $request->payment_method_name }}</td>
                        <td>{{ $request->website }}</td>
                        <td>{{ $request->event_id }}</td>
                        <td>{{ $request->company_id }}</td>
                        <td>{{ $request->status }}</td>
                        <td>
                            <a href="{{ route('paymentProviderRequests.edit', $request->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('paymentProviderRequests.destroy', $request->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
