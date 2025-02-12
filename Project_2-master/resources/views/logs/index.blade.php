@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>System Logs</h2>

    @if(session('error'))
        <p class="text-danger">{{ session('error') }}</p>
    @endif

    @if(isset($logs) && $logs->count() > 0)
        <table class="table table-bordered">
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
                @foreach($logs as $log)
                    <tr>
                        <td>{{ $log->created_at->format('Y-m-d') }}</td>
                        <td>{{ $log->created_at->format('H:i:s') }}</td>
                        <td>{{ optional($log->user)->name ?? 'Unknown' }}</td>
                        <td>{{ $log->event }}</td>
                        <td>{{ $log->type ?? 'N/A' }}</td>
                        <td>{{ $log->description }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-warning">No logs available.</p>
    @endif
</div>
@endsection
