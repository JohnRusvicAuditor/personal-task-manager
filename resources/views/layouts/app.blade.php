<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Personal Task Manager')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --bg: #f5f6fa;
            --card: #ffffff;
            --text: #1a1d29;
            --text-muted: #6b7280;
            --border: #e5e7eb;
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --primary-light: #eef2ff;
            --success: #10b981;
            --success-light: #d1fae5;
            --warning: #f59e0b;
            --warning-light: #fef3c7;
            --danger: #ef4444;
            --danger-light: #fee2e2;
            --purple: #8b5cf6;
            --purple-light: #ede9fe;
            --radius: 12px;
            --shadow-sm: 0 1px 2px rgba(0,0,0,0.04);
            --shadow: 0 4px 12px rgba(0,0,0,0.06);
            --shadow-lg: 0 10px 30px rgba(0,0,0,0.08);
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
        }

        nav {
            background: var(--card);
            padding: 18px 32px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid var(--border);
            position: sticky;
            top: 0;
            z-index: 10;
        }

        nav .brand {
            color: var(--text);
            text-decoration: none;
            font-weight: 800;
            font-size: 1.25rem;
            display: flex;
            align-items: center;
            gap: 8px;
            letter-spacing: -0.02em;
        }

        nav a.nav-add {
            background: var(--primary);
            color: #fff;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            padding: 10px 18px;
            border-radius: 8px;
            transition: background 0.15s ease, transform 0.15s ease;
        }

        nav a.nav-add:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
        }

        .container {
            max-width: 960px;
            margin: 40px auto;
            padding: 0 24px;
        }

        .card {
            background: var(--card);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            padding: 32px;
            margin-bottom: 24px;
            border: 1px solid var(--border);
        }

        h1 {
            font-size: 1.75rem;
            font-weight: 800;
            letter-spacing: -0.02em;
            margin: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            text-align: left;
            padding: 16px 12px;
            border-bottom: 1px solid var(--border);
            vertical-align: middle;
        }

        th {
            color: var(--text-muted);
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            font-weight: 700;
        }

        tbody tr {
            transition: background 0.12s ease;
        }

        tbody tr:hover {
            background: #fafafb;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
            border-radius: 999px;
            font-size: 0.78rem;
            font-weight: 700;
        }

        .badge::before {
            content: '';
            width: 6px;
            height: 6px;
            border-radius: 50%;
        }

        .badge-pending {
            background: var(--warning-light);
            color: #92400e;
        }
        .badge-pending::before { background: var(--warning); }

        .badge-completed {
            background: var(--success-light);
            color: #065f46;
        }
        .badge-completed::before { background: var(--success); }

        .btn {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 8px;
            border: none;
            font-size: 0.82rem;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            color: #fff;
            transition: opacity 0.15s ease, transform 0.15s ease;
        }

        .btn:hover { opacity: 0.88; transform: translateY(-1px); }

        .btn-primary { background: var(--primary); }
        .btn-edit { background: var(--warning); color: #78350f; }
        .btn-delete { background: var(--danger-light); color: #991b1b; }
        .btn-toggle { background: var(--purple-light); color: #5b21b6; }

        .btn-add {
            background: var(--primary);
            padding: 12px 22px;
            font-size: 0.95rem;
            border-radius: 10px;
        }

        .actions {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .actions form { display: inline-block; }

        input[type=text], textarea, select, input[type=date] {
            width: 100%;
            padding: 12px 14px;
            margin-bottom: 20px;
            border: 1.5px solid var(--border);
            border-radius: 8px;
            font-size: 0.95rem;
            font-family: inherit;
            color: var(--text);
            background: var(--card);
            transition: border-color 0.15s ease, box-shadow 0.15s ease;
        }

        input:focus, textarea:focus, select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px var(--primary-light);
        }

        label {
            font-weight: 600;
            font-size: 0.85rem;
            color: var(--text);
            margin-bottom: 8px;
            display: block;
        }

        .alert {
            background: var(--success-light);
            color: #065f46;
            padding: 14px 18px;
            border-radius: var(--radius);
            margin-bottom: 20px;
            font-weight: 500;
            font-size: 0.9rem;
            border: 1px solid #a7f3d0;
        }

        .error-list {
            background: var(--danger-light);
            color: #991b1b;
            padding: 14px 18px;
            border-radius: var(--radius);
            margin-bottom: 20px;
            border: 1px solid #fecaca;
        }

        .empty-state {
            text-align: center;
            color: var(--text-muted);
            padding: 60px 0;
            font-size: 0.95rem;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 28px;
        }
    </style>
</head>
<body>
    <nav>
        <a href="{{ route('tasks.index') }}" class="brand">📝 Personal Task Manager</a>
        <a href="{{ route('tasks.create') }}" class="nav-add">+ Add Task</a>
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