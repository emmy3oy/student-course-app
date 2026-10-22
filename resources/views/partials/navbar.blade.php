
<nav class="navbar">
    <a href="{{ route('dashboard') }}" class="nav-brand">
        Student Portal
    </a>

    <button class="menu-toggle" id="menu-toggle" type="button"
        aria-label="Toggle navigation" aria-expanded="false">
        ☰
    </button>

    <div class="nav-links" id="nav-links">
        <a href="{{ route('dashboard') }}"
           class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
            Dashboard
        </a>

        <a href="{{ route('students.index') }}"
           class="{{ request()->routeIs('students.index') || request()->routeIs('students.show') ? 'active' : '' }}">
            Students
        </a>

        <a href="{{ route('students.create') }}"
           class="{{ request()->routeIs('students.create') ? 'active' : '' }}">
            Add Student
        </a>

        <a href="{{ route('courses.index') }}"
           class="{{ request()->routeIs('courses.index') || request()->routeIs('courses.show') ? 'active' : '' }}">
            Courses
        </a>

        <a href="{{ route('courses.create') }}"
           class="{{ request()->routeIs('courses.create') ? 'active' : '' }}">
            Add Course
        </a>
    </div>
</nav>
