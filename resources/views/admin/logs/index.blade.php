@extends('layouts.admin')
@section('title')
    Logs
@endsection
@section('content')
    <div class="container mt-4">
        <h2>Logs</h2>

        <form method="GET" action="{{ route('admin.logs') }}" class="row g-3 mb-4">
            <div class="col-md-4">
                <label for="date_from" class="form-label">Date From</label>
                <input type="date" id="date_from" name="date_from" class="form-control" value="{{ request('date_from') }}">
            </div>

            <div class="col-md-4">
                <label for="date_to" class="form-label">Date To</label>
                <input type="date" id="date_to" name="date_to" class="form-control" value="{{ request('date_to') }}">
            </div>

            <div class="col-md-4 d-flex align-items-end gap-2">
                <button type="submit" class="btn btn-dark mr-2">Filter</button>
                <a href="{{ route('admin.logs') }}" class="btn btn-outline-secondary">Reset</a>
            </div>
        </form>

        <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Order</th>
                <th>User</th>
                <th>Message</th>
                <th>Date</th>
            </tr>
            </thead>

            <tbody>
            @forelse($logs as $log)
                <tr>
                    <td data-label="Order">{{ $loop->iteration }}</td>
                    <td data-label="User">{{ $log->user->name ?? 'Guest' }}</td>
                    <td data-label="Message">{{ $log->message }}</td>
                    <td data-label="Date">{{ $log->created_at?->format('d.m.Y H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No logs found for selected period.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        </div>
    </div>
@endsection
