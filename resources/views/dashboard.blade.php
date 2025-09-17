@extends('includes.layout')
@section('content')
<section class="content">
    <br>
    <div class="row">
        <div class="col-12">
            <h1>Dashboard</h1>
            <p>Welcome to Attendance.</p>
        </div>
    </div>

    <!-- Summary Cards -->
    <div class="row mt-4">
        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5>Total Employees</h5>
                    <h3>{{ $totalEmployees }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <h5>Present Today</h5>
                    <h3>{{ $presentToday }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-danger text-white">
                <div class="card-body">
                    <h5>Absent Today</h5>
                    <h3>{{ $absentToday }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-warning text-dark">
                <div class="card-body">
                    <h5>On Leave</h5>
                    <h3>{{ $onLeave }}</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Today's Attendance Table -->
    <div class="card mt-4">
        <div class="card-header">Today's Attendance</div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Employee</th>
                        <th>Check-in</th>
                        <th>Check-out</th>
                        <th>Working Hours</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($attendanceToday as $record)
                        <tr>
                            <td>{{ $record->employee->full_name }}</td>
                            <td>{{ $record->check_in ?? '-' }}</td>
                            <td>{{ $record->check_out ?? '-' }}</td>
                            <td>{{ $record->working_hours ? round($record->working_hours, 2) . ' hrs' : '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No attendance marked yet today.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</section>
@endsection
