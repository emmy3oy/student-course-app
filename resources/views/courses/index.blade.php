@extends('layouts.app')

@section('title', 'Courses')

@section('content')

<div class="container">

    <h1>Courses</h1>
    <p>View and manage available courses.</p>

    @if (session('success'))
        <p class="success-message">{{ session('success') }}</p>
    @endif

    <div class="form-container">
        <form action="{{ route('courses.index') }}" method="GET">

            <div class="form-group">
                <label for="search">Search Courses</label>
                <input
                    type="text"
                    id="search"
                    name="search"
                    placeholder="Search by course name or description"
                    value="{{ $search ?? '' }}"
                >
            </div>

            <div class="form-group">
                <label for="filter">Filter Courses</label>
                <select name="filter" id="filter">
                    <option value="">All Courses</option>

                    <option value="registered"
                        {{ ($filter ?? '') === 'registered' ? 'selected' : '' }}>
                        With Registered Students
                    </option>

                    <option value="not_registered"
                        {{ ($filter ?? '') === 'not_registered' ? 'selected' : '' }}>
                        Without Registered Students
                    </option>
                </select>
            </div>

            <button type="submit" class="btn">Apply</button>

            <a href="{{ route('courses.index') }}" class="btn">Clear</a>

        </form>
    </div>

    <p>
        <a href="{{ route('courses.create') }}" class="btn">Add Course</a>
        <a href="{{ route('students.index') }}" class="btn">View Students</a>
    </p>

    <h2>Course List</h2>

    @forelse ($courses as $course)
        <div class="stat-card">
            <h3>{{ $course->name }}</h3>

            <p>{{ $course->description }}</p>

            <p>Registered Students: {{ $course->students_count }}</p>

            <a href="{{ route('courses.show', $course) }}" class="btn">
                View Course
            </a>
        </div>
        <br>
    @empty
        <p>No courses found.</p>
    @endforelse

    <div class="pagination">
        {{ $courses->links() }}
    </div>

</div>

@endsection