<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
{
    // dd('ff');
    $employees= Employee::all();
    return view('employee.index',compact('employees'));
}
    public function add()
    {
        return view('employee.add');
    }

    public function store(Request $request)
    {
    $validated = $request->validate([
        'full_name' => 'string|max:255',
        'date_of_birth' => 'date',
        'gender' => 'required|in:Male,Female,Other',
        'marital_status' => 'required|in:Single,Married,Divorced,Widowed',
        'aadhaar_number' => 'nullable|digits:12',
        'mobile' => 'digits:10',
        'email' => 'email|unique:employees,email',
        'address' => 'string',
        'designation' => 'string',
        'date_of_joining' => 'date',
        'profile_photo' => 'nullable|image|max:2048',
        'id_proof' => 'nullable|file|max:2048',
    ]);

    if ($request->hasFile('profile_photo')) {
    $file = $request->file('profile_photo');
    $filename = time() . '_' . $file->getClientOriginalName();
    $file->move(public_path('images/employee'), $filename);
    $validated['profile_photo'] = 'images/employee/' . $filename;
}

if ($request->hasFile('id_proof')) {
    $file = $request->file('id_proof');
    $filename = time() . '_' . $file->getClientOriginalName();
    $file->move(public_path('images/employee'), $filename);
    $validated['id_proof'] = 'images/employee/' . $filename;
}

    Employee::create($validated);

    return redirect()->back()->with('success', 'Employee registered successfully!');
}

public function edit($id)
{
    $employee = Employee::findOrFail($id);
    return view('employee.edit', compact('employee'));
}

public function update(Request $request, $id)
{
    $employee = Employee::findOrFail($id);

    $validated = $request->validate([
        'full_name' => 'string|max:255',
        'date_of_birth' => 'date',
        'gender' => 'required|in:Male,Female,Other',
        'marital_status' => 'required|in:Single,Married,Divorced,Widowed',
        'aadhaar_number' => 'nullable|digits:12',
        'mobile' => 'digits:10',
        'email' => 'email|unique:employees,email,' . $employee->id,
        'address' => 'string',
        'designation' => 'string',
        'date_of_joining' => 'date',
        'profile_photo' => 'nullable|image|max:2048',
        'id_proof' => 'nullable|file|max:2048',
    ]);

    if ($request->hasFile('profile_photo')) {
        $file = $request->file('profile_photo');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('images/employee'), $filename);
        $validated['profile_photo'] = 'images/employee/' . $filename;
    }

    if ($request->hasFile('id_proof')) {
        $file = $request->file('id_proof');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('images/employee'), $filename);
        $validated['id_proof'] = 'images/employee/' . $filename;
    }

    $employee->update($validated);

    return redirect()->route('employee')->with('success', 'Employee updated successfully!');
}
public function destroy($id)
{
    $employee = Employee::findOrFail($id);
    $employee->delete();

    return redirect()->back()->with('success', 'Employee deleted successfully!');
}
}
