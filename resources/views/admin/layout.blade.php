<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $pageTitle ?? 'Admin DoubleTap' }}</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background:
                radial-gradient(circle at top right, rgba(255, 49, 49, 0.13), transparent 32%),
                radial-gradient(circle at left center, rgba(255, 49, 49, 0.06), transparent 28%),
                #050505;
            color: #f8fafc;
            font-family: 'Space Grotesk', Arial, sans-serif;
        }

        .admin-wrapper {
            width: 100%;
            min-height: 100vh;
            padding: 38px 8% 60px;
        }

        .admin-topbar {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 24px;
            margin-bottom: 24px;
        }

        .admin-kicker {
            color: #ff3131;
            font-weight: 800;
            margin: 0 0 10px;
            letter-spacing: 0.16em;
            text-transform: uppercase;
            font-size: 14px;
        }

        .admin-title {
            font-family: 'Syne', 'Space Grotesk', Arial, sans-serif;
            font-size: clamp(38px, 5vw, 64px);
            line-height: 1;
            font-weight: 800;
            margin: 0;
            letter-spacing: -0.04em;
        }

        .admin-subtitle {
            color: #9ca3af;
            margin: 14px 0 0;
            max-width: 640px;
            line-height: 1.7;
            font-size: 16px;
        }

        .admin-menu {
            display: flex;
            gap: 12px;
            margin-bottom: 26px;
            flex-wrap: wrap;
        }

        .admin-menu a,
        .admin-btn {
            padding: 12px 20px;
            border-radius: 999px;
            background: rgba(20, 20, 20, 0.95);
            border: 1px solid #262626;
            color: #fff;
            text-decoration: none;
            cursor: pointer;
            font-weight: 700;
            font-size: 15px;
            transition: 0.2s ease;
            display: inline-block;
        }

        .admin-menu a:hover,
        .admin-btn:hover {
            transform: translateY(-2px);
            border-color: #ff3131;
        }

        .admin-btn-primary {
            background: #ff3131;
            border-color: #ff3131;
            box-shadow: 0 12px 28px rgba(255, 49, 49, 0.2);
        }

        .admin-btn-secondary {
            background: #181818;
        }

        .admin-btn-danger {
            background: #991b1b;
            border-color: #b91c1c;
        }

        .admin-btn-logout {
            background: #7f1d1d;
            border: 1px solid #ef4444;
            color: #fff;
        }

        .admin-btn-logout:hover {
            background: #dc2626;
            border-color: #dc2626;
        }

        .admin-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
            margin-bottom: 24px;
        }

        .admin-stat {
            position: relative;
            overflow: hidden;
            background: linear-gradient(145deg, rgba(20, 20, 20, 0.98), rgba(9, 9, 9, 0.98));
            border: 1px solid #252525;
            border-radius: 24px;
            padding: 26px;
            min-height: 150px;
        }

        .admin-stat::after {
            content: "";
            position: absolute;
            width: 120px;
            height: 120px;
            right: -35px;
            top: -40px;
            border-radius: 999px;
            background: rgba(255, 49, 49, 0.08);
        }

        .admin-stat h3 {
            margin: 0 0 18px;
            color: #aab3c2;
            font-size: 15px;
            font-weight: 800;
        }

        .admin-stat p {
            margin: 0;
            font-size: 48px;
            line-height: 1;
            font-weight: 800;
            color: #ff3131;
        }

        .admin-stat small {
            display: block;
            margin-top: 12px;
            color: #8b8b8b;
        }

        .admin-card {
            background: linear-gradient(145deg, rgba(18, 18, 18, 0.98), rgba(9, 9, 9, 0.98));
            border: 1px solid #252525;
            border-radius: 26px;
            padding: 28px;
            margin-bottom: 24px;
            box-shadow: 0 18px 50px rgba(0, 0, 0, 0.28);
        }

        .admin-card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 18px;
            margin-bottom: 22px;
        }

        .admin-card h2 {
            margin: 0;
            font-size: 30px;
            letter-spacing: -0.03em;
        }

        .admin-table-wrap {
            width: 100%;
            overflow-x: auto;
        }

        .admin-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 760px;
        }

        .admin-table th,
        .admin-table td {
            padding: 16px;
            border-bottom: 1px solid #242424;
            text-align: left;
        }

        .admin-table th {
            color: #9ca3af;
            font-size: 14px;
            font-weight: 800;
        }

        .admin-table td {
            color: #f8fafc;
        }

        .admin-table tbody tr:hover {
            background: rgba(255, 255, 255, 0.025);
        }

        .admin-actions {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .admin-form {
            display: grid;
            gap: 18px;
        }

        .admin-form label {
            display: block;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .admin-form input,
        .admin-form select {
            width: 100%;
            padding: 14px 16px;
            border-radius: 14px;
            border: 1px solid #333;
            background: #080808;
            color: #fff;
            outline: none;
        }

        .admin-form input:focus,
        .admin-form select:focus {
            border-color: #ff3131;
            box-shadow: 0 0 0 3px rgba(255, 49, 49, 0.12);
        }

        .admin-alert-success {
            background: rgba(34, 197, 94, 0.12);
            border: 1px solid rgba(34, 197, 94, 0.35);
            color: #86efac;
            padding: 14px 18px;
            border-radius: 14px;
            margin-bottom: 20px;
        }

        .admin-alert-error {
            background: rgba(239, 68, 68, 0.12);
            border: 1px solid rgba(239, 68, 68, 0.35);
            color: #fca5a5;
            padding: 14px 18px;
            border-radius: 14px;
            margin-bottom: 20px;
        }

        @media (max-width: 1000px) {
            .admin-wrapper {
                padding: 32px 22px 50px;
            }

            .admin-topbar {
                flex-direction: column;
            }

            .admin-grid {
                grid-template-columns: 1fr;
            }

            .admin-card-header {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
</head>
<body>

<div class="admin-wrapper">
    <div class="admin-topbar">
        <div>
            <p class="admin-kicker">ADMIN PANEL</p>
            <h1 class="admin-title">{{ $pageTitle ?? 'Dashboard Admin' }}</h1>
            <p class="admin-subtitle">
                Kelola data klien, paket layanan, dan pesan konsultasi DoubleTap Agency dari satu halaman.
            </p>
        </div>

        <form action="{{ route('admin.logout') }}" method="POST" style="margin: 0;">
            @csrf
            <button type="submit" class="admin-btn admin-btn-logout">
                Logout
            </button>
        </form>
    </div>

    @if(session('admin_logged_in'))
        <div class="admin-menu">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a href="{{ route('admin.clients.index') }}">Kelola Klien</a>
            <a href="{{ route('admin.clients.create') }}">Tambah Klien</a>
        </div>
    @endif

    @yield('content')
</div>

</body>
</html>