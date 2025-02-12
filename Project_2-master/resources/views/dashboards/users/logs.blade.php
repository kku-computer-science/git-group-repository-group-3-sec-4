@extends('dashboards.users.layouts.user-dash-layout')
@section('title', 'System Logs')

@section('content')

<h3>System Logs</h3>

@if(Auth::check() && Auth::user()->email === 'admin@gmail.com')
    <div class="container mt-4">
        <h2>System Logs</h2>

        @if(isset($logs) && $logs->count() > 0)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Time</th>
                        <th>User</th>
                        <th>IP Address</th>
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
                            <td>{{ $log->user->name ?? 'Guest' }}</td>
                            <td>{{ $log->ip_address }}</td>
                            <td>{{ $log->event }}</td>
                            <td>{{ $log->type }}</td>
                            <td>{{ $log->description }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-warning">No logs available.</p>
        @endif
    </div>
@else
    <p class="text-danger">คุณไม่มีสิทธิ์เข้าถึง Log ของระบบ</p>
@endif

@endsection
