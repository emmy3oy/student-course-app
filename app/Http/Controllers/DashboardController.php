<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;

class DashboardController extends Controller
{
   
public function index()
{
    $totalStudents = Student::count();
    $totalCourses = Course::count();

    $totalRegistrations = \Illuminate\Support\Facades\DB::table('course_student')->count();

    return view('dashboard', compact(
        'totalStudents',
        'totalCourses',
        'totalRegistrations'
    ));
}

}
