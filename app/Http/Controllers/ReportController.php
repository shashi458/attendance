<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{


    public function index()
{
    return view('reports.index');
}

    public function filter(Request $request)
{
    $request->validate([
        'from' => 'required|date',
        'to'   => 'required|date|after_or_equal:from',
    ]);

    $start = \Carbon\Carbon::parse($request->from);
    $end   = \Carbon\Carbon::parse($request->to);

    $records = \App\Models\Attendance::with('employee')
        ->select('employee_id', DB::raw('SUM(working_hours) as total_hours'))
        ->whereBetween('date', [$start, $end])
        ->groupBy('employee_id')
        ->get();

    return view('reports.show', compact('records','start','end'));
}
public function calendar(Request $request)
{
    $month = $request->input('month', date('Y-m')); // default current month
    $start = \Carbon\Carbon::parse($month . '-01');
    $end   = $start->copy()->endOfMonth();

    $employees = Employee::all();

    // Get attendance for this month
    $attendance = Attendance::whereBetween('date', [$start, $end])
        ->get()
        ->groupBy(fn($a) => $a->employee_id . '_' . $a->date->toDateString());

    return view('reports.calender', compact('month', 'start', 'end', 'employees', 'attendance'));
}
}
