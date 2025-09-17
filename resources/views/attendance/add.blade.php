@extends('includes.layout')

@section('content')
{{-- <div class="container">
    <h2>Employee Registration</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('attendance.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Employee</label>
        <select name="employee_id" class="form-select" required>
            <option value="">Select Employee</option>
            @foreach($employees as $emp)
            <option value="{{ $emp->id }}">{{ $emp->full_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
    <label for="attendance_date">Date</label>
    <input type="date" id="attendance_date" name="attendance_date" class="form-control"
           value="{{ date('Y-m-d') }}">
</div> --}}
   {{-- <div class="mb-3">
    <label for="check_in">Check In</label>
    <input type="time" id="check_in" name="check_in" class="form-control"
           value="{{ date('H:i') }}">
</div>
    <div class="mb-3">
        <label>Check Out</label>
        <input type="time" name="check_out" class="form-control">
    </div>
    <button class="btn btn-primary">Save Attendance</button>
</form>
</div> --}}




{{-- dynamic Employee Selection and Punch In/Out --}}
{{-- <div class="container">
    <h2>Attendance Punch</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('info'))
        <div class="alert alert-info">{{ session('info') }}</div>
    @endif

    <div class="mb-3">
        <label>Employee</label>
        <select id="employee_id" name="employee_id" class="form-select" required>
            <option value="">Select Employee</option>
            @foreach($employees as $emp)
                <option value="{{ $emp->id }}">{{ $emp->full_name }}</option>
            @endforeach
        </select>
    </div>

    <form action="{{ route('attendance.store') }}" method="POST">
        @csrf
        <input type="hidden" name="employee_id" id="selected_employee">

        <button type="submit" class="btn btn-success"
            onclick="document.getElementById('selected_employee').value=document.getElementById('employee_id').value">
            Punch In / Out
        </button>
    </form>
</div> --}}



<div class="container">
    <h2>Attendance Punch</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('info'))
        <div class="alert alert-info">{{ session('info') }}</div>
    @endif

    <div class="mb-3">
        <label>Employee</label>
        <select id="employee_id" name="employee_id" class="form-select" onchange="updateButtonLabel()" required>
            <option value="">Select Employee</option>
            @foreach($employees as $emp)
                <option value="{{ $emp->id }}">{{ $emp->full_name }}</option>
            @endforeach
        </select>
    </div>

    <form action="{{ route('attendance.store') }}" method="POST">
        @csrf
        <input type="hidden" name="employee_id" id="selected_employee">

        <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" id="manualTimeToggle" onclick="toggleManualTime()">
            <label for="manualTimeToggle" class="form-check-label">Set Time Manually</label>
        </div>

        <div id="manualTimeFields" style="display:none;">
            <div class="mb-3">
                <label for="manual_check_in">Check In</label>
                <input type="time" name="manual_check_in" id="manual_check_in" class="form-control">
            </div>
            <div class="mb-3">
                <label for="manual_check_out">Check Out</label>
                <input type="time" name="manual_check_out" id="manual_check_out" class="form-control">
            </div>
        </div>

        <button type="submit" class="btn btn-success" id="punchButton"
            onclick="document.getElementById('selected_employee').value=document.getElementById('employee_id').value">
            Punch In
        </button>
    </form>
</div>

<script>
let attendances = @json($attendances);

function toggleManualTime() {
    let fields = document.getElementById('manualTimeFields');
    fields.style.display = fields.style.display === 'none' ? 'block' : 'none';
}

function updateButtonLabel() {
    let empId = document.getElementById('employee_id').value;
    let button = document.getElementById('punchButton');

    if(!empId) {
        button.innerText = 'Punch In';
        button.disabled = true;
        return;
    }

    button.disabled = false;

    if(attendances[empId] === undefined) {
        button.innerText = 'Punch In';
    } else if(attendances[empId].check_out === null) {
        button.innerText = 'Punch Out';
    } else {
        button.innerText = 'Attendance Completed';
        button.disabled = true;
    }
}
</script>


<script>
function toggleManualTime() {
    let fields = document.getElementById('manualTimeFields');
    fields.style.display = fields.style.display === 'none' ? 'block' : 'none';
}
</script>

@endsection
