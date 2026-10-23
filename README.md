Student Course Registration System

About the Project

This is a Student Course Registration System I built while learning backend development with PHP and Laravel.

The main idea behind this project was to understand how to manage students and courses, and how to connect them together. I wanted to build something practical instead of just learning Laravel commands without knowing how they work in a real application.

During the project, I worked with database migrations, models, controllers, routes, Blade views, and Eloquent relationships. I also learned how to handle form submissions, validate user input, and display data from the database on different pages.

It took some time to get everything working properly, especially the relationships between students and courses, but that was part of the learning process.

What I Built

Here are some of the things I implemented in the project:

- Student Management: Add new students, view their details, edit their information, and delete students.
- Course Management: Create courses and manage the available courses in the system.
- Course Registration: Register a student for one or more courses from the registration page.
- Manage Registrations: View the courses registered by a student and the students registered for a particular course.
- Remove Registrations: Remove a student from a course without deleting the student or the course itself.
- Dashboard: Display the total number of students, courses, and registrations.
- Search and Filtering: Search and filter records to make it easier to find the information I need.
- Sorting and Pagination: Organize records and display them across pages.
- Validation: Validate form inputs and prevent duplicate course registrations.
- Navigation: Add a navbar that allows me to move between the different pages of the application.
- Add Courses During Registration: Add a new course directly from the Register Courses page, then select the courses a student should register for.

Technologies Used
- PHP
- Laravel
- MySQL
- Blade Templates
- HTML
- CSS
- Git and GitHub
- Laragon
- HeidiSQL

What I Learned
One of the main things I learned from this project was how database relationships work in Laravel.
Students and courses have a many-to-many relationship because one student can register for multiple courses, and one course can have multiple students.
To handle this, I created a course_student pivot table that connects students to courses. I also used Laravel's belongsToMany() relationship in the Student and Course models.
I learned how to use migrations to create and manage database tables, how controllers handle application logic, and how routes connect requests to the correct controller methods and pages.
I also worked with validation, Eloquent queries, adding and removing relationships, search, filtering, and pagination.
Most importantly, this project helped me understand how the different parts of a Laravel application work together instead of treating them as separate things.
Database Structure
The project uses three main tables:

- students — stores student information such as name and email.
- courses — stores course information such as name and description.
- course_student — connects students to the courses they register for.

The pivot table has foreign keys linking it to the students and courses tables. It also prevents the same student-course combination from being registered more than once.

How to Run the Project Locally

If you want to run this project on your computer, follow these steps.

1. Clone the repository
git clone https://github.com/emmy3oy/student-course-app.git

2. Enter the project folder
cd student-course-app

3. Install PHP dependencies
composer install

4. Create your environment file
cp .env.example .env


On Windows, you can also copy .env.example and rename the copy to .env.

5. Generate the application key
php artisan key:generate

6. Configure the database
Create a database for the project using MySQL and update the database settings in your .env file.

Make sure the database name, username, and password match your local setup.

7. Run the migrations
php artisan migrate

8. Install frontend dependencies
npm install
npm run build

9. Start the Laravel development server
php artisan serve

Open the local URL displayed in your terminal, usually http://127.0.0.1:8000.

Project Repository

GitHub: https://github.com/emmy3oy/student-course-app

Final Note

This project is part of my journey into backend development. I built it to practise what I have been learning and get a better understanding of how Laravel applications work, especially when dealing with databases and relationships.

I know there is still more to learn and more improvements I can make, but I am happy with what I have been able to build so far.

More projects and more learning ahead.
