# Personal Task Manager

Project Code: WST21-PM-2026-SF
Student Name: John Rusvic F. Auditor
Course & Year: BSIT 2nd year
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

HOMEPAGE:
<img width="1920" height="1080" alt="image" src="https://github.com/user-attachments/assets/cc3c5db1-57e2-4032-a33b-3e4bc208fcac" />

ADD TASK:
<img width="1920" height="1080" alt="image" src="https://github.com/user-attachments/assets/4b92a2eb-9dc0-4fa0-928b-f60f0b867f22" />

VIEW TASK:
<img width="1920" height="1080" alt="image" src="https://github.com/user-attachments/assets/fbf10326-a2f9-448e-980f-2bcce80cc838" />

EDIT TASK:
<img width="1920" height="1080" alt="image" src="https://github.com/user-attachments/assets/45b7b047-1538-4ef1-b5f2-3fe258a3b51f" />

DELETE TASK:
<img width="1920" height="1080" alt="image" src="https://github.com/user-attachments/assets/6de5981f-d022-4970-8930-2cdc7ae6aea6" />

UPDATE STATUS:
<img width="1920" height="1080" alt="image" src="https://github.com/user-attachments/assets/f3cfb262-10b4-405c-94e8-94ebcf759516" />



