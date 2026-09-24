# Personal Task Manager

Project Code: WST21-PM-2026-SF
Student Name:
Course & Year:
Database Used: MySQL

## Features
- Add Task
- View Tasks
- Edit Task
- Delete Task
- Update Status

## How It's Built
- **Routes** (`routes/web.php`) – defines all task routes using `Route::resource` plus one extra route for quick status toggling.
- **Controller** (`app/Http/Controllers/TaskController.php`) – handles index, create, store, edit, update, destroy, and updateStatus.
- **Model** (`app/Models/Task.php`) – Eloquent model for the `tasks` table with mass-assignable fields.
- **Database** (`database/migrations/..._create_tasks_table.php`) – defines the `tasks` table (id, task_name, description, status, due_date, timestamps).
- **Blade Views** (`resources/views/tasks/*.blade.php`, `resources/views/layouts/app.blade.php`) – list, create, and edit pages, sharing one styled layout.

## Setup Instructions
1. Create a new Laravel project: `composer create-project laravel/laravel task-manager`
2. Copy the files from this repo into the new project (overwriting `routes/web.php`, adding the model, controller, migration, and views).
3. Configure your `.env` database credentials (MySQL by default).
4. Run migrations: `php artisan migrate`
5. Start the server: `php artisan serve`
6. Visit `http://127.0.0.1:8000`

## Screenshots
_Add your own screenshots here once the app is running (task list, add form, edit form)._
