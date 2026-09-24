# Setup Instructions (Detailed)

This repo contains only the app-specific files you need (model, controller,
migration, routes, views) — not a full fresh Laravel install with vendor/
dependencies. Follow these steps to turn it into a running project.

## 1. Create a fresh Laravel project
```
composer create-project laravel/laravel task-manager
cd task-manager
```

## 2. Copy in these files
Copy each file from this repo into the matching path in your new project,
overwriting where needed:

- `routes/web.php` → replace the existing file
- `app/Models/Task.php` → new file
- `app/Http/Controllers/TaskController.php` → new file
- `database/migrations/2026_09_24_000000_create_tasks_table.php` → new file
- `resources/views/layouts/app.blade.php` → new file
- `resources/views/tasks/index.blade.php` → new file
- `resources/views/tasks/create.blade.php` → new file
- `resources/views/tasks/edit.blade.php` → new file

## 3. Configure the database
Open `.env` and set:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=task_manager
DB_USERNAME=root
DB_PASSWORD=
```
Create the `task_manager` database in MySQL (e.g. via phpMyAdmin or
`CREATE DATABASE task_manager;` in the MySQL CLI).

## 4. Run the migration
```
php artisan migrate
```
This creates the `tasks` table.

## 5. Serve the app
```
php artisan serve
```
Visit `http://127.0.0.1:8000` — it will redirect to the task list.

## 6. Push to GitHub
```
git init
git add .
git commit -m "Personal Task Manager - initial commit"
git branch -M main
git remote add origin <your-repo-url>
git push -u origin main
```
Make sure the repository is set to **Public** before submitting the link.

## How each feature maps to the code
- **Add Task** → `TaskController@create` (form) + `TaskController@store` (save)
- **View Tasks** → `TaskController@index` + `tasks/index.blade.php`
- **Edit Task** → `TaskController@edit` (form) + `TaskController@update` (save)
- **Delete Task** → `TaskController@destroy`
- **Update Status** → `TaskController@updateStatus`, triggered by the
  "Mark as Completed/Pending" button on the task list
