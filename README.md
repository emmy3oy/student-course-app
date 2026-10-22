Student Course Registration System

About the Project

I built this project while learning backend development with PHP and Laravel. My main goal was to understand how database relationships work in Laravel, especially the **many-to-many relationship**.

What I Learned

- One-to-One: Understanding how one record relates to one other record.
- One-to-Many: Understanding how one student or parent record can be related to multiple records.
- Many-to-Many: Implementing the relationship between students and courses, where one student can register for multiple courses and each course can have multiple students.

The main focus was the many-to-many relationship. I created a `course_student` pivot table and used Laravel's `belongsToMany()` relationship to connect students and courses, register students for courses, and manage their registrations.

I also practised migrations, models, controllers, CRUD operations, validation, search, filtering, pagination, and building a dashboard.

Technologies Used

- PHP and Laravel
- MySQL
- Blade, HTML and CSS
- Git and GitHub
- Laragon and HeidiSQL

What This Project Means to Me

This project helped me understand database relationships beyond just reading about them. I wanted to build something practical, test how the relationships work, and understand how Laravel connects everything together.

GitHub: https://github.com/emmy3oy/student-course-app
