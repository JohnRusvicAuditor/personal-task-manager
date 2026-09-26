<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Personal Task Manager')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700;900&family=Rajdhani:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --bg-deep: #0a0118;
            --bg-mid: #150a2e;
            --card: #1a0f38;
            --card-border: #3d2a6b;
            --text: #f0eaff;
            --text-muted: #a89ecb;
            --neon-pink: #ff2ea6;
            --neon-purple: #9d4edd;
            --neon-cyan: #00f0ff;
            --neon-green: #39ff88;
            --neon-orange: #ff8c42;
            --radius: 14px;
        }

        body {
            font-family: 'Rajdhani', sans-serif;
            color: var(--text);
            min-height: 100vh;
            background:
                linear-gradient(rgba(10,1,24,0.55), rgba(10,1,24,0.75)),
                repeating-linear-gradient(0deg, transparent, transparent 39px, rgba(157,78,221,0.18) 40px),
                repeating-linear-gradient(90deg, transparent, transparent 39px, rgba(157,78,221,0.18) 40px),
                radial-gradient(circle at 15% 15%, rgba(255,46,166,0.35), transparent 45%),
                radial-gradient(circle at 85% 85%, rgba(0,240,255,0.25), transparent 45%),
                linear-gradient(180deg, var(--bg-deep), var(--bg-mid));
            background-attachment: fixed;
        }

        header.top {
            background: rgba(21,10,46,0.7);
            backdrop-filter: blur(8px);
            padding: 22px 40px;
            border-bottom: 1px solid var(--neon-purple);
            box-shadow: 0 2px 24px rgba(157,78,221,0.35);
        }

        header.top .row {
            max-width: 1000px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header.top .brand {
            font-family: 'Orbitron', sans-serif;
            font-weight: 900;
            font-size: 1.3rem;
            letter-spacing: 0.05em;
            color: var(--neon-cyan);
            text-shadow: 0 0 10px rgba(0,240,255,0.7), 0 0 20px rgba(0,240,255,0.4);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        header.top a.nav-add {
            background: linear-gradient(135deg, var(--neon-pink), var(--neon-purple));
            color: #fff;
            text-decoration: none;
            font-weight: 700;
            font-family: 'Orbitron', sans-serif;
            font-size: 0.8rem;
            letter-spacing: 0.05em;
            padding: 12px 22px;
            border-radius: 8px;
            text-transform: uppercase;
            box-shadow: 0 0 16px rgba(255,46,166,0.5);
            transition: box-shadow 0.2s ease, transform 0.2s ease;
        }

        header.top a.nav-add:hover {
            box-shadow: 0 0 26px rgba(255,46,166,0.85);
            transform: translateY(-2px);
        }

        .container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 0 24px;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
            margin-bottom: 24px;
        }

        .stat-card {
            background: var(--card);
            border-radius: var(--radius);
            padding: 22px 24px;
            border: 1px solid var(--card-border);
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 3px;
        }

        .stat-card.total::before { background: var(--neon-cyan); box-shadow: 0 0 10px var(--neon-cyan); }
        .stat-card.pending::before { background: var(--neon-orange); box-shadow: 0 0 10px var(--neon-orange); }
        .stat-card.completed::before { background: var(--neon-green); box-shadow: 0 0 10px var(--neon-green); }

        .stat-card .label {
            font-family: 'Orbitron', sans-serif;
            font-size: 0.68rem;
            font-weight: 700;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.08em;
            margin-bottom: 8px;
        }

        .stat-card .value {
            font-family: 'Orbitron', sans-serif;
            font-size: 2rem;
            font-weight: 900;
        }

        .stat-card.total .value { color: var(--neon-cyan); text-shadow: 0 0 12px rgba(0,240,255,0.6); }
        .stat-card.pending .value { color: var(--neon-orange); text-shadow: 0 0 12px rgba(255,140,66,0.6); }
        .stat-card.completed .value { color: var(--neon-green); text-shadow: 0 0 12px rgba(57,255,136,0.6); }

        .card {
            background: var(--card);
            border-radius: var(--radius);
            padding: 32px;
            margin-bottom: 24px;
            border: 1px solid var(--card-border);
            box-shadow: 0 0 40px rgba(157,78,221,0.15);
        }

        h1 {
            font-family: 'Orbitron', sans-serif;
            font-size: 1.3rem;
            font-weight: 700;
            letter-spacing: 0.03em;
            color: var(--text);
        }

        table { width: 100%; border-collapse: collapse; }

        th, td {
            text-align: left;
            padding: 16px 12px;
            border-bottom: 1px solid var(--card-border);
            vertical-align: middle;
        }

        th {
            font-family: 'Orbitron', sans-serif;
            color: var(--neon-purple);
            font-size: 0.68rem;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            font-weight: 700;
        }

        tbody tr { transition: background 0.15s ease; }
        tbody tr:hover { background: rgba(157,78,221,0.1); }
        tbody tr:last-child td { border-bottom: none; }
        td strong { color: var(--text); font-weight: 600; }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
            border-radius: 999px;
            font-family: 'Orbitron', sans-serif;
            font-size: 0.68rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.03em;
        }

        .badge::before { content: ''; width: 6px; height: 6px; border-radius: 50%; }

        .badge-pending {
            background: rgba(255,140,66,0.15);
            color: var(--neon-orange);
            border: 1px solid rgba(255,140,66,0.4);
        }
        .badge-pending::before { background: var(--neon-orange); box-shadow: 0 0 6px var(--neon-orange); }

        .badge-completed {
            background: rgba(57,255,136,0.15);
            color: var(--neon-green);
            border: 1px solid rgba(57,255,136,0.4);
        }
        .badge-completed::before { background: var(--neon-green); box-shadow: 0 0 6px var(--neon-green); }

        .btn {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 8px;
            border: none;
            font-family: 'Rajdhani', sans-serif;
            font-size: 0.85rem;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
            color: #fff;
            transition: opacity 0.15s ease, transform 0.15s ease, box-shadow 0.15s ease;
        }

        .btn:hover { transform: translateY(-1px); }

        .btn-primary { background: var(--neon-cyan); color: #0a0118; }
        .btn-primary:hover { box-shadow: 0 0 14px rgba(0,240,255,0.6); }

        .btn-edit { background: var(--neon-orange); color: #2a1000; }
        .btn-edit:hover { box-shadow: 0 0 14px rgba(255,140,66,0.6); }

        .btn-delete { background: rgba(255,46,166,0.2); color: var(--neon-pink); border: 1px solid var(--neon-pink); }
        .btn-delete:hover { box-shadow: 0 0 14px rgba(255,46,166,0.5); }

        .btn-toggle { background: rgba(157,78,221,0.25); color: #d8b4fe; border: 1px solid var(--neon-purple); }
        .btn-toggle:hover { box-shadow: 0 0 14px rgba(157,78,221,0.5); }

        .btn-add {
            background: linear-gradient(135deg, var(--neon-pink), var(--neon-purple));
            padding: 12px 22px;
            font-family: 'Orbitron', sans-serif;
            font-size: 0.8rem;
            text-transform: uppercase;
            border-radius: 8px;
        }

        .actions { display: flex; gap: 8px; flex-wrap: wrap; }
        .actions form { display: inline-block; }

        input[type=text], textarea, select, input[type=date] {
            width: 100%;
            padding: 12px 14px;
            margin-bottom: 20px;
            border: 1.5px solid var(--card-border);
            border-radius: 8px;
            font-size: 0.95rem;
            font-family: 'Rajdhani', sans-serif;
            color: var(--text);
            background: rgba(10,1,24,0.5);
            transition: border-color 0.15s ease, box-shadow 0.15s ease;
        }

        input:focus, textarea:focus, select:focus {
            outline: none;
            border-color: var(--neon-cyan);
            box-shadow: 0 0 0 3px rgba(0,240,255,0.2);
        }

        select option { background: var(--card); color: var(--text); }

        label {
            font-weight: 700;
            font-size: 0.85rem;
            margin-bottom: 8px;
            display: block;
            color: var(--neon-purple);
            text-transform: uppercase;
            letter-spacing: 0.03em;
            font-family: 'Orbitron', sans-serif;
            font-size: 0.7rem;
        }

        .alert {
            background: rgba(57,255,136,0.12);
            color: var(--neon-green);
            padding: 14px 18px;
            border-radius: var(--radius);
            margin-bottom: 20px;
            font-weight: 600;
            font-size: 0.9rem;
            border: 1px solid rgba(57,255,136,0.4);
        }

        .error-list {
            background: rgba(255,46,166,0.12);
            color: var(--neon-pink);
            padding: 14px 18px;
            border-radius: var(--radius);
            margin-bottom: 20px;
            border: 1px solid rgba(255,46,166,0.4);
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
    <header class="top">
        <div class="row">
            <div class="brand">
                ⚡ Personal Task
            </div>
            <a href="{{ route('tasks.create') }}" class="nav-add">+ New Task</a>
        </div>
    </header>

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