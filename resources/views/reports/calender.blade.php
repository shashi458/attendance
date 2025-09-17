@extends('includes.layout')
@section('content')
<h4>Attendance Calendar ({{ $start->format('F Y') }})</h4>

<form method="GET" action="{{ route('reports.calendar') }}" class="mb-3">
    <label>Select Month</label>
    <input type="month" name="month" value="{{ $month }}" class="form-control w-25 d-inline">
    <button class="btn btn-primary">View</button>
</form>

<div class="table-responsive">
    <table class="table table-bordered text-center align-middle">
        <thead>
            <tr>
                <th>Employee</th>
                @for($d = 1; $d <= $end->daysInMonth; $d++)
                    <th>{{ $d }}</th>
                @endfor
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $emp)
                <tr>
                    <td class="fw-bold">{{ $emp->name }}</td>
                    @for($d = 1; $d <= $end->daysInMonth; $d++)
                        @php
                            $date = $start->copy()->day($d);
                            $record = $attendance[$emp->id . '_' . $date->toDateString()] ?? null;
                        @endphp
                        <td style="font-size: 12px;
                                   @if(!$record) background:#f8d7da; @endif">
                            @if($record)
                                P
                            @else
                                A
                            @endif
                        </td>
                    @endfor
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
