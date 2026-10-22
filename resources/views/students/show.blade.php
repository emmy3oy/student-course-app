<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Details</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    @include('partials.navbar')

    <div class="container">

        <h1>Student Details</h1>

        <div class="form-container">
            <h2>{{ $student->name }}</h2>
            <p>Class: {{ $student->class }}</p>

            @if (session('success'))
                <p class="success-message">{{ session('success') }}</p>
            @endif

            <a href="{{ route('registrations.create', $student) }}" class="btn">
                Register Courses
            </a>
        </div>

        <h2>Registered Courses</h2>

        @forelse ($student->courses as $course)
            <div class="stat-card">
                <h3>{{ $course->name }}</h3>
                <p>{{ $course->description }}</p>
                <p>Email: {{ $student->email }}</p>

                <form
                    action="{{ route('registrations.destroy', [$student, $course]) }}"
                    method="POST"
                    onsubmit="return confirm('Remove this course from the student?')"
                >
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">
                        Remove Course
                    </button>
                </form>
            </div>
            <br>
        @empty
            <p>This student has not registered for any courses yet.</p>
        @endforelse

        <p>
            <a href="{{ route('students.index') }}" class="btn">
                Back to Students
            </a>
        </p>

    </div>
</body>
</html>