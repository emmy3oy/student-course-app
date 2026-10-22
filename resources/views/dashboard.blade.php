 @extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="container">
    <h1>Student Course Registration Dashboard</h1>
    <p>Overview of students, courses, and registrations.</p>

    <div class="dashboard-stats">

        <div class="stat-card">
            <h3>Total Students</h3>
            <p>{{ $totalStudents }}</p>
            <a href="{{ route('students.index') }}" class="btn">View Students</a>
        </div>

        <div class="stat-card">
            <h3>Total Courses</h3>
            <p>{{ $totalCourses }}</p>
            <a href="{{ route('courses.index') }}" class="btn">View Courses</a>
        </div>

        <div class="stat-card">
            <h3>Total Course Registrations</h3>
            <p>{{ $totalRegistrations }}</p>
        </div>

    </div>
</div>

@endsection