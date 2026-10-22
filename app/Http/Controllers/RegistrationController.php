<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function create(Student $student)
    {
        $courses = Course::all();

        return view('registrations.create', compact('student', 'courses'));
    }

   
public function store(Request $request, Student $student)
{
    $validated = $request->validate([
        'courses' => 'required|array|min:1',
        'courses.*' => 'required|integer|exists:courses,id',
    ]);

    $existingCourses = $student->courses()
        ->whereIn('courses.id', $validated['courses'])
        ->pluck('courses.id')
        ->toArray();

    $student->courses()->syncWithoutDetaching($validated['courses']);

    if (count($existingCourses) > 0) {
        return redirect()
            ->route('students.show', $student)
            ->with('success', 'Courses registered. Already registered courses were not added again.');
    }

    return redirect()
        ->route('students.show', $student)
        ->with('success', 'Courses registered successfully.');
}


    public function storeCourse(Request $request, Student $student)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:courses,name',
            'description' => 'nullable|string',
        ]);

        Course::create($validated);

        return redirect()
            ->route('registrations.create', $student)
            ->with('success', 'Course added successfully.');
    }

    public function destroy(Student $student, Course $course)
    {
        $student->courses()->detach($course->id);

        return redirect()
            ->route('students.show', $student)
            ->with('success', 'Course removed successfully.');
    }
}