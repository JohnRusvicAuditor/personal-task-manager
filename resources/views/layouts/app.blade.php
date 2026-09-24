<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Personal Task Manager')</title>
    <style>
        * { box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
            color: #2d3436;
        }
        nav {
            background: #2c3e50;
            padding: 16px 32px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        nav a {
            color: #fff;
            text-decoration: none;
            font-weight: 600;
        }
        nav .brand { font-size: 1.2rem; }
        .container {
            max-width: 900px;
            margin: 32px auto;
            padding: 0 20px;
        }
        .card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            padding: 24px;
            margin-bottom: 24px;
        }
        h1 { margin-top: 0; }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            text-align: left;
            padding: 12px 10px;
            border-bottom: 1px solid #eee;
            vertical-align: top;
        }
        th { color: #636e72; font-size: 0.85rem; text-transform: uppercase; }
        .badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            color: #fff;
        }
        .badge-pending { background: #e67e22; }
        .badge-completed { background: #27ae60; }
        .btn {
            display: inline-block;
            padding: 6px 14px;
            border-radius: 6px;
            border: none;
            font-size: 0.85rem;
            cursor: pointer;
            text-decoration: none;
            color: #fff;
        }
        .btn-primary { background: #2980b9; }
        .btn-edit { background: #f39c12; }
        .btn-delete { background: #e74c3c; }
        .btn-toggle { background: #8e44ad; }
        .btn-add {
            background: #27ae60;
            padding: 10px 20px;
            font-size: 1rem;
        }
        .actions form, .actions a { display: inline-block; margin-right: 4px; }
        input[type=text], textarea, select, input[type=date] {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            border: 1px solid #dcdde1;
            border-radius: 6px;
            font-size: 1rem;
        }
        label { font-weight: 600; margin-bottom: 6px; display: block; }
        .alert {
            background: #d4efdf;
            color: #1e8449;
            padding: 12px 16px;
            border-radius: 6px;
            margin-bottom: 20px;
        }
        .error-list {
            background: #fdecea;
            color: #c0392b;
            padding: 12px 16px;
            border-radius: 6px;
            margin-bottom: 20px;
        }
        .empty-state {
            text-align: center;
            color: #95a5a6;
            padding: 40px 0;
        }
        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
        }
    </style>
</head>
<body>
    <nav>
        <a href="{{ route('tasks.index') }}" class="brand">📝 Personal Task Manager</a>
        <a href="{{ route('tasks.create') }}">+ Add Task</a>
    </nav>

    <div class="container">
        @if (session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="error-list">
                <ul style="margin:0; padding-left: 18px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>
