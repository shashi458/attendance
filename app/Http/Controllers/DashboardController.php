<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today()->toDateString();

        $totalEmployees = Employee::count();
        $presentToday = Attendance::where('date', $today)->count();
        $absentToday = $totalEmployees - $presentToday;
        $onLeave = 0; // later add leave table if you want

        // Get today's attendance list
        $attendanceToday = Attendance::with('employee')->where('date', $today)->get();

        return view('dashboard', compact(
            'totalEmployees',
            'presentToday',
            'absentToday',
            'onLeave',
            'attendanceToday'
        ));
    }
}
