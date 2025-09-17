<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;


Route::middleware(['web'])->group(function () {

    Route::controller(AuthController::class)->group(function () {
        Route::get('/', 'index')->name('login');
        Route::post('/login', 'login')->name('login.submit');
        Route::post('/logout', 'logout')->name('logout');
    });

    Route::middleware(['auth'])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    });
    Route::controller(EmployeeController::class)->group(function () {
        Route::get('/employee', 'index')->name('employee');
        Route::get('/add-employee', 'add')->name('employee.add');
        Route::post('/employee/store', 'store')->name('employee.store');
        // Route::get('/employee/{id}/edit', [App\Http\Controllers\EmployeeController::class, 'edit'])->name('employee.edit');
        // Route::post('/employee/{id}/update', [App\Http\Controllers\EmployeeController::class, 'update'])->name('employee.update');
        // Route::delete('/employee/{id}', [App\Http\Controllers\EmployeeController::class, 'destroy'])->name('employee.destroy');
        Route::get('/employee/{id}', 'edit')->name('employee.edit');
        Route::post('/employee/{id}/update', 'update')->name('employee.update');
        Route::delete('/employee/{id}', 'destroy')->name('employee.destroy');
    });
    Route::controller(HolidayController::class)->group(function () {
        Route::get('/holidays', 'index')->name('holidays.index');
        Route::get('/holidays/create', 'create')->name('holidays.add');
        Route::post('/holidays/store', 'store')->name('holidays.store');
    });
    Route::controller(AttendanceController::class)->group(function () {
        Route::get('/attendance', 'index')->name('attendance.index');
        Route::get('/attendance/create', 'create')->name('attendance.create');
        Route::post('/attendance/store', 'store')->name('attendance.store');
    });

    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::post('/reports/filter', [ReportController::class, 'filter'])->name('reports.filter');
    Route::get('/reports/calendar', [ReportController::class, 'calendar'])->name('reports.calendar');

});
