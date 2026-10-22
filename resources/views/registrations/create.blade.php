@extends('layouts.app')

@section('title', 'Register Courses')

@section('content')


@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <h1>Register Courses</h1>

    <p>Student: {{ $student->name }}</p>

    @if (session('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
    @endif

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <hr>

    <h2>Add a New Course</h2>

    <form
        action="{{ route('registrations.courses.store', $student) }}"
        method="POST"
    >
        @csrf

        <div>
            <label for="name">Course Name</label>
            <input
                type="text"
                name="name"
                id="name"
                value="{{ old('name') }}"
                required
            >
        </div>

        <br>

        <div>
            <label for="description">Description</label>
            <textarea
                name="description"
                id="description"
            >{{ old('description') }}</textarea>
        </div>

        <br>

        <button type="submit">Add Course</button>
    </form>

    <hr>

    <h2>Select Courses</h2>

    <form
        action="{{ route('registrations.store', $student) }}"
        method="POST"
    >
        @csrf

        @forelse ($courses as $course)
            <div>
                <label>
                    <input
                        type="checkbox"
                        name="courses[]"
                        value="{{ $course->id }}"
                        {{ in_array($course->id, old('courses', [])) ? 'checked' : '' }}
                    >

                    {{ $course->name }}
                </label>
            </div>
        @empty
            <p>No courses available. Add your first course above.</p>
        @endforelse

        <br>

        <button
            type="submit"
            {{ $courses->isEmpty() ? 'disabled' : '' }}
        >
            Register Selected Courses
        </button>
    </form>

    <p>
        <a href="{{ route('students.show', $student) }}">
            Back to Student
        </a>
    </p>

@endsection