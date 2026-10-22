<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
 

public function index(Request $request)
{
    $search = $request->input('search');
    $filter = $request->input('filter');

    $courses = Course::withCount('students')
        ->when($search, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%");
            });
        })
        ->when($filter === 'registered', function ($query) {
            $query->has('students');
        })
        ->when($filter === 'not_registered', function ($query) {
            $query->doesntHave('students');
        })
        ->orderBy('name')
        ->paginate(5)
        ->withQueryString();

    return view('courses.index', compact(
        'courses',
        'search',
        'filter'
    ));
}


    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:courses,name',
            'description' => 'nullable|string',
        ]);

        Course::create($validated);

        return redirect()
            ->route('courses.index')
            ->with('success', 'Course added successfully.');
    }

    public function show(Course $course)
    {
        $course->load('students');

        return view('courses.show', compact('course'));
    }
}