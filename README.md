# CCS Student Portal — Student Registration System

## Introduction

The College of Computer Studies (CCS) is transitioning from paper-based student registration to a digital registration system. This project, the **CCS Student Portal**, is a Student Registration System built using Laravel to allow students to register online while ensuring that submitted information is valid, secure, and stored correctly.

A student registration system is a common feature in enterprise information systems — universities, companies, hospitals, banks, and government agencies all require secure and validated registration systems to collect and manage user information. Data validation is critical in these systems because it prevents incomplete, incorrect, or malicious data from entering the database, protecting both the institution and the students whose information is being collected.

Registration systems like this one play a foundational role in enterprise applications by handling the full lifecycle of a client request — from form submission, through validation and file handling, to secure database storage — skills that are directly transferable to larger systems such as e-commerce platforms, hospital management systems, and banking portals.

## Objectives

At the end of this activity, the following learning objectives were accomplished:

1. Developed HTML forms using Blade templates.
2. Processed client requests using Laravel controllers.
3. Implemented server-side validation using Laravel Validation Rules.
4. Displayed flash messages for successful and failed operations.
5. Uploaded and securely stored files using Laravel Storage.
6. Designed and implemented a relational database table.
7. Documented the software development process using Markdown.
8. Applied Git version control and portfolio-building practices.


## Laravel Request Lifecycle

When a student submits the registration form, the request goes through the following stages in Laravel:

1. **Browser** — The student fills out the registration form and clicks "Register Student." The browser sends a `POST` request to `/students`, including the form data and the uploaded profile picture.

2. **Route** — Laravel's router (`routes/web.php`) matches the incoming request to the `students.store` route, which points to the `store()` method in `StudentController`.

3. **Controller** — The `StudentController@store` method receives the request. This is where the request is processed before anything touches the database.

4. **Validation** — Inside the controller, `$request->validate()` checks every field against the defined rules (required, unique, email, numeric, image, etc.). If validation fails, Laravel automatically redirects back to the form with error messages and the old input. If it passes, execution continues.

5. **Model** — Once validation passes, the profile picture is stored using Laravel Storage, and the validated data (including the picture's file path) is passed to the `Student` model via `Student::create()`.

6. **Database** — The Eloquent ORM translates `Student::create()` into an `INSERT` SQL statement, saving the new student record into the `students` table in MySQL.

7. **Response** — After the record is saved, the controller redirects the student to their profile page (`students.show`) with a flash success message, which is displayed using Laravel's session flash data.

*(See `documentation/request-lifecycle.png` for a visual diagram of this flow.)*


## Validation Rules

The registration form enforces the following server-side validation rules using Laravel's `$request->validate()`:

| Field | Rule | Why It Matters |
|---|---|---|
| `student_id` | `required\|unique:students` | Ensures every student has an ID and prevents duplicate registrations under the same ID. |
| `first_name`, `last_name` | `required\|string\|max:100` | Ensures core identity fields are always provided and prevents excessively long input. |
| `middle_name` | `nullable\|string\|max:100` | Optional field — not every student has a middle name, so it is allowed to be empty. |
| `email` | `required\|email\|unique:students` | Confirms the email is in a valid format and prevents two students from registering with the same email address. |
| `mobile_number` | `required\|numeric` | Prevents letters or symbols from being entered into a field meant only for a phone number. |
| `date_of_birth` | `required\|date` | Ensures the value is a valid, parseable date rather than arbitrary text. |
| `gender`, `program`, `year_level` | `required` | These are essential classification fields used for student records and reporting. |
| `address` | `required\|string` | Ensures contact/location information is always captured. |
| `profile_picture` | `required\|image\|mimes:jpg,jpeg,png\|max:2048` | Restricts uploads to actual image files (jpg, jpeg, png) under 2MB, preventing malicious file uploads and oversized files from being stored on the server. |

### Required vs. Unique Constraints
- **Required** rules prevent blank submissions — without them, incomplete student records could be saved to the database.
- **Unique** constraints (on `student_id` and `email`) protect data integrity by preventing duplicate student accounts.

### Client-Side vs. Server-Side Validation
In addition to Laravel's server-side validation, this project includes **JavaScript client-side validation** that gives students instant feedback (red field outlines and inline error messages) before the form is even submitted. However, server-side validation remains the primary line of defense, since client-side checks can be bypassed (e.g., by disabling JavaScript). Both layers work together to create a smooth user experience while keeping the data secure.


## Database Design

### Entity Relationship Diagram (ERD)

The system uses a single `students` table to store all registration records.

*(See `documentation/erd.png` for the visual Entity Relationship Diagram.)*

### Table Structure: `students`

| Column | Data Type | Constraints |
|---|---|---|
| `id` | BIGINT (unsigned) | Primary Key, Auto-increment |
| `student_id` | VARCHAR(255) | Unique, Not Null |
| `first_name` | VARCHAR(255) | Not Null |
| `middle_name` | VARCHAR(255) | Nullable |
| `last_name` | VARCHAR(255) | Not Null |
| `email` | VARCHAR(255) | Unique, Not Null |
| `mobile_number` | VARCHAR(255) | Not Null |
| `date_of_birth` | DATE | Not Null |
| `gender` | VARCHAR(255) | Not Null |
| `program` | VARCHAR(255) | Not Null |
| `year_level` | VARCHAR(255) | Not Null |
| `address` | TEXT | Not Null |
| `profile_picture` | VARCHAR(255) | Not Null (stores file path, not the image itself) |
| `created_at` | TIMESTAMP | Auto-generated by Laravel |
| `updated_at` | TIMESTAMP | Auto-generated by Laravel |

### Design Notes
- The **primary key** (`id`) is an auto-incrementing integer, which Laravel generates automatically for every Eloquent model.
- **`student_id`** and **`email`** both have unique constraints at the database level, providing a second layer of protection against duplicate records even if application-level validation were ever bypassed.
- **`profile_picture`** stores only the relative file path (e.g., `profile_pictures/xyz.jpg`), not the binary image data. The actual image file lives in `storage/app/public/profile_pictures`, and is made publicly accessible through a symbolic link created with `php artisan storage:link`. This keeps the database lightweight and follows Laravel's recommended approach to file storage.
- **`address`** uses the `TEXT` type instead of `VARCHAR` to comfortably accommodate longer addresses.

