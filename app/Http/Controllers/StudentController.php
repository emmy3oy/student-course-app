<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
 
public function index(Request $request)
{
    $search = $request->input('search');
    $filter = $request->input('filter');

    $students = Student::withCount('courses')
        ->when($search, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%");
            });
        })
        ->when($filter === 'registered', function ($query) {
            $query->has('courses');
        })
        ->when($filter === 'not_registered', function ($query) {
            $query->doesntHave('courses');
        })
        ->orderBy('name')
        ->paginate(5)
        ->withQueryString();

    return view('students.index', compact(
        'students',
        'search',
        'filter'
    ));
}

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:students,email',
        'class' => 'required|string|max:25',
    ]);

    Student::create($validated);

    return redirect()
        ->route('students.index')
        ->with('success', 'Student added successfully.');
}

    public function show(Student $student)
    {
        $student->load('courses');

        return view('students.show', compact('student'));
    }
}