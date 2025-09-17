<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
     public function index()
    {
        $attendance = Attendance::with('employee')->get();
        return view('attendance.index', compact('attendance'));
    }

    // public function create()
    // {
    //     $employees = Employee::all();
    //     return view('attendance.add', compact('employees'));
    // }




    public function create()
{
    $employees = Employee::all();

    // Get today's attendance records
    $today = date('Y-m-d');
    $attendances = Attendance::where('date', $today)->get()->keyBy('employee_id');

    return view('attendance.add', compact('employees', 'attendances'));
}

// public function createEmployee($employeeId = null)
// {
//     $employees = Employee::all();
//     $today = date('Y-m-d');

//     $attendances = Attendance::where('date', $today)->get()->keyBy('employee_id');

//     // Pre-select employee if passed
//     $selectedEmployee = $employeeId ? Employee::find($employeeId) : null;

//     return view('attendance.add', compact('employees', 'attendances', 'selectedEmployee'));
// }

    public function store(Request $request)
{
    $request->validate(['employee_id' => 'required']);
    $today = Carbon::today()->toDateString();

    // Check if attendance exists for today
    $attendance = Attendance::where('employee_id', $request->employee_id)
        ->where('date', $today)
        ->first();

    if (!$attendance) {
        // Punch In
        Attendance::create([
            'employee_id' => $request->employee_id,
            'date' => $today,
            'check_in' => Carbon::now()->format('H:i:s'),
        ]);

        return redirect()->route('attendance.index')->with('success', 'Punched In successfully!');
    } else {
        if (!$attendance->check_out) {
            // Punch Out
            $attendance->check_out = Carbon::now()->format('H:i:s');
            $attendance->working_hours = Carbon::parse($attendance->check_in)
                ->diffInMinutes(Carbon::now()) / 60;
            $attendance->save();

            return redirect()->route('attendance.index')->with('success', 'Punched Out successfully!');
        } else {
            return redirect()->route('attendance.index')->with('info', 'Attendance already completed for today.');
        }
    }

}

}
