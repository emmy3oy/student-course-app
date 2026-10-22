@extends('layouts.app')

@section('title', 'Course Details')

@section('content')

<div class="container">

    <h1>Course Details</h1>

    <div class="form-container">
        <h2>{{ $course->name }}</h2>

        <p>{{ $course->description }}</p>
    </div>

    <h2>Registered Students</h2>

    @forelse ($course->students as $student)
        <div class="stat-card">
            <h3>{{ $student->name }}</h3>

            <p>Email: {{ $student->email }}</p>

            <a href="{{ route('students.show', $student) }}" class="btn">
                View Student
            </a>
        </div>
        <br>
    @empty
        <p>No students have registered for this course yet.</p>
    @endforelse

    <p>
        <a href="{{ route('courses.index') }}" class="btn">
            Back to Courses
        </a>
    </p>

</div>

@endsection