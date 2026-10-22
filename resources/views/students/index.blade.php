@extends('layouts.app')

@section('title', 'Students')

@section('content')

<div class="container">

    <h1>Students</h1>
    <p>View and manage registered students.</p>

    @if (session('success'))
        <p class="success-message">{{ session('success') }}</p>
    @endif

    <div class="form-container">
        <form action="{{ route('students.index') }}" method="GET">

            <div class="form-group">
                <label for="search">Search Students</label>
                <input
                    type="text"
                    id="search"
                    name="search"
                    placeholder="Search by name or email"
                    value="{{ $search ?? '' }}"
                >
            </div>

            <div class="form-group">
                <label for="filter">Filter Students</label>
                <select name="filter" id="filter">
                    <option value="">All Students</option>

                    <option value="registered"
                        {{ ($filter ?? '') === 'registered' ? 'selected' : '' }}>
                        Registered for Courses
                    </option>

                    <option value="not_registered"
                        {{ ($filter ?? '') === 'not_registered' ? 'selected' : '' }}>
                        Not Registered
                    </option>
                </select>
            </div>

            <button type="submit" class="btn">Apply</button>

            <a href="{{ route('students.index') }}" class="btn">
                Clear
            </a>

        </form>
    </div>

    <p>
        <a href="{{ route('students.create') }}" class="btn">Add Student</a>
        <a href="{{ route('courses.index') }}" class="btn">View Courses</a>
    </p>

    <h2>Student List</h2>

    @forelse ($students as $student)
        <div class="stat-card">
            <h3>{{ $student->name }}</h3>

            <p>Email: {{ $student->email }}</p>
            <p>Class: {{ $student->class }}</p>

            <p>
                Registered Courses: {{ $student->courses_count }}
            </p>

            <a href="{{ route('students.show', $student) }}" class="btn">
                View Student
            </a>
        </div>
        <br>
    @empty
        <p>No students found.</p>
    @endforelse

    <div class="pagination">
        {{ $students->links() }}
    </div>

</div>

@endsection