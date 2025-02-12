@extends('layouts.app')

@section('content')
<div class="container">
    <h2>System Logs</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Date</th>
                <th>Time</th>
                <th>User</th>
                <th>Event</th>
                <th>Type</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($logs as $log)
            <tr>
                <td>{{ $log->created_at->format('Y-m-d') }}</td>
                <td>{{ $log->created_at->format('H:i:s') }}</td>
                <td>{{ $log->user->name ?? 'Guest' }}</td>
                <td>{{ $log->event }}</td>
                <td> -- </td>
                <td>{{ $log->description }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $logs->links() }} <!-- Pagination -->
</div>
@endsection
