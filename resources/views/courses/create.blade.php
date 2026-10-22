@extends('layouts.app')

@section('title', 'Add Course')

@section('content')

<div class="container">

    <h1>Add Course</h1>
    <p>Enter the course details below.</p>

    <div class="form-container">

        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('courses.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Course Name</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    value="{{ old('name') }}"
                    required
                >
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea
                    name="description"
                    id="description"
                >{{ old('description') }}</textarea>
            </div>

            <button type="submit" class="btn">Save Course</button>

            <a href="{{ route('courses.index') }}" class="btn">
                Back to Courses
            </a>
        </form>

    </div>

</div>

@endsection