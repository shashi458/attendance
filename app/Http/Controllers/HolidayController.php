<?php

namespace App\Http\Controllers;

use App\Models\Holiday;
use Illuminate\Http\Request;

class HolidayController extends Controller
{
     public function index()
    {
        $holidays = Holiday::all();
        return view('holiday.index', compact('holidays'));
    }

    public function create()
    {
        return view('holiday.add');
    }

       public function store(Request $request)
{
    $validated = $request->validate([
        'date' => 'required|date',
        'description' => 'required|string|max:255',
    ]);
    Holiday::create($validated);
    return redirect()->route('holidays.index')->with('success', 'Holiday added.');
}
}
