@extends('layouts.app')

@section('title', 'Add Student')

@section('content')

<div class="container">

    <h1>Add Student</h1>
    <p>Enter the student's details below.</p>

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

        <form action="{{ route('students.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Student Name</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    value="{{ old('name') }}"
                    required
                >
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    value="{{ old('email') }}"
                    required
                >
            </div>

            <div class="form-group">
                <label for="class">Class</label>
                <input
                    type="text"
                    name="class"
                    id="class"
                    value="{{ old('class') }}"
                    required
                >
            </div>

            <button type="submit" class="btn">Save Student</button>

            <a href="{{ route('students.index') }}" class="btn">
                Back to Students
            </a>
        </form>

    </div>

</div>

@endsection