<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return redirect()->route('students.index');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::resource('students', StudentController::class)
    ->only(['index', 'create', 'store', 'show']);

Route::resource('courses', CourseController::class)
    ->only(['index', 'create', 'store', 'show']);

Route::get('/students/{student}/register', [
    RegistrationController::class, 'create'
])->name('registrations.create');

Route::post('/students/{student}/register', [
    RegistrationController::class, 'store'
])->name('registrations.store');

Route::delete('/students/{student}/courses/{course}', [
    RegistrationController::class, 'destroy'
])->name('registrations.destroy');

Route::post('/students/{student}/courses', [
    RegistrationController::class, 'storeCourse'
])->name('registrations.courses.store');