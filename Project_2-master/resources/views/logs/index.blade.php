@extends('dashboards.users.layouts.user-dash-layout')

@section('content')
<div class="container-fluid mt-4">
    <div class="row">
        <!-- Sidebar -->
        <aside class="col-md-2">
            <h5 class="mb-3">Log System</h5>
            <ul class="list-group">
                <li class="list-group-item">
                    <input type="checkbox" id="showAll" checked> Show All
                </li>
                <li class="list-group-item">
                    <input type="checkbox" id="logLogin"> Log Login
                </li>
                <li class="list-group-item">
                    <input type="checkbox" id="logError"> Log Error
                </li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="col-md-10">
            <!-- Graph -->
            <div class="card mb-4">
                <div class="card-body">
                    <canvas id="logChart"></canvas> <!-- กราฟ -->
                </div>
            </div>

            <!-- Search Box -->
            <div class="d-flex mb-3">
                <input type="text" class="form-control me-2" id="search" placeholder="Search">
                <input type="text" class="form-control me-2" id="userId" placeholder="User ID">
                <input type="date" class="form-control me-2" id="date">
                <button class="btn btn-primary">Search</button>
            </div>

            <!-- Log Table -->
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-dark">
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
                        @forelse ($logs as $log)
                        <tr>
                            <td>{{ $log->created_at->format('Y-m-d') }}</td>
                            <td>{{ $log->created_at->format('H:i:s') }}</td>
                            <td>{{ $log->user->name ?? 'Guest' }}</td>
                            <td>{{ $log->event }}</td>
                            <td>{{ $log->type }}</td>
                            <td>{{ $log->description }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">No logs found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                {{ $logs->links() }} <!-- Pagination -->
            </div>
        </main>
    </div>
</div>
@endsection

@section('javascript')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    let ctx = document.getElementById('logChart').getContext('2d');
    let logChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["1", "2", "3", "4", "5", "6"],
            datasets: [{
                label: 'Log Events',
                data: [10, 30, 15, 40, 35, 20],
                borderColor: 'blue',
                fill: false
            }]
        }
    });
});
</script>
@endsection
