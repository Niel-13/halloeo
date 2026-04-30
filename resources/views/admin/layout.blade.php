<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="{{ asset('images/logohalloeo.png') }}?v={{ time() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel') - HalloEO</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --pastel-blue: #A8D8EA;
            --pastel-green: #B8E0D2;
            --dark-pastel-red: #D88A8A;
            --dark: #2C3E50;
            --light: #F8F9FA;
            --sidebar-width: 260px;

            /* Sidebar color tokens — gelap agar teks putih terbaca */
            --sidebar-bg-top:    #1A2E3D;
            --sidebar-bg-bot:    #16312A;
            --sidebar-accent:    #5AB5D4;   /* biru teal untuk ikon & highlight */
            --sidebar-accent2:   #4AA88E;   /* hijau untuk gradient aksen */
            --sidebar-text:      rgba(255,255,255,0.88);
            --sidebar-text-muted:rgba(255,255,255,0.50);
            --sidebar-hover-bg:  rgba(255,255,255,0.08);
            --sidebar-active-bg: rgba(90,181,212,0.18);
        }

        body {
            font-family: 'Outfit', sans-serif;
            background: var(--light);
            color: var(--dark);
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            /* FIX: gradient gelap navy-teal agar teks putih terbaca jelas */
            background: linear-gradient(180deg, var(--sidebar-bg-top) 0%, var(--sidebar-bg-bot) 100%);
            padding: 2rem 0;
            z-index: 1000;
            overflow-y: auto;
            /* Aksen tipis di sisi kanan */
            border-right: 1px solid rgba(255,255,255,0.06);
            box-shadow: 4px 0 24px rgba(0,0,0,0.25);
        }

        /* Scrollbar sidebar */
        .sidebar::-webkit-scrollbar { width: 4px; }
        .sidebar::-webkit-scrollbar-track { background: transparent; }
        .sidebar::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.15); border-radius: 4px; }

        .sidebar-logo {
            text-align: center;
            margin-bottom: 2rem;
            padding: 0 1.5rem 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }

        .sidebar-logo h1 {
            font-family: 'Playfair Display', sans-serif;
            color: #ffffff;
            font-size: 1.8rem;
        }

        /* Label "Admin Panel" di bawah logo */
        .sidebar-logo .admin-badge {
            display: inline-block;
            margin-top: 0.4rem;
            padding: 0.2rem 0.8rem;
            background: linear-gradient(90deg, var(--sidebar-accent), var(--sidebar-accent2));
            border-radius: 20px;
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: #fff;
        }

        /* Grup label menu */
        .sidebar-group-label {
            padding: 1.2rem 1.5rem 0.4rem;
            font-size: 0.65rem;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--sidebar-text-muted);
        }

        .sidebar-menu {
            list-style: none;
            font-family: 'Outfit', sans-serif;
            padding: 0 0.75rem;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 0.85rem;
            padding: 0.8rem 0.85rem;
            /* FIX: warna teks off-white, bukan putih murni (lebih lembut) */
            color: var(--sidebar-text);
            text-decoration: none;
            border-radius: 10px;
            margin-bottom: 2px;
            transition: all 0.22s ease;
            font-size: 0.92rem;
            font-weight: 500;
            position: relative;
        }

        /* Ikon — diberi warna aksen pastel */
        .sidebar-menu a i {
            width: 20px;
            text-align: center;
            font-size: 1rem;
            color: var(--sidebar-accent);
            transition: color 0.22s ease;
            flex-shrink: 0;
        }

        .sidebar-menu a:hover {
            background: var(--sidebar-hover-bg);
            color: #ffffff;
        }

        .sidebar-menu a:hover i {
            color: #ffffff;
        }

        /* Active state — highlight terang */
        .sidebar-menu a.active {
            background: var(--sidebar-active-bg);
            color: #ffffff;
            font-weight: 600;
            /* Garis aksen kiri */
            border-left: 3px solid var(--sidebar-accent);
            padding-left: calc(0.85rem - 3px);
        }

        .sidebar-menu a.active i {
            color: var(--sidebar-accent);
        }

        /* Separator antar grup */
        .sidebar-menu .menu-divider {
            height: 1px;
            background: rgba(255,255,255,0.07);
            margin: 0.5rem 0;
        }

        /* Main Content */
        .main-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
        }

        /* Top Bar */
        .topbar {
            background: white;
            padding: 1.5rem 2rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .topbar-title h2 {
            font-family: 'Playfair Display', sans-serif;
            color: var(--dark);
        }

        .topbar-actions {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .btn {
            padding: 0.7rem 1.5rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            border: none;
            cursor: pointer;
            font-family: 'Outfit', sans-serif;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--pastel-blue), var(--pastel-green));
            color: white;
        }

        .btn-danger {
            background: var(--dark-pastel-red);
            color: white;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        /* Content Area */
        .content {
            padding: 2rem;
        }

        /* Alerts */
        .alert {
            padding: 1rem 1.5rem;
            border-radius: 10px;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border-left: 4px solid #28a745;
        }

        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border-left: 4px solid #dc3545;
        }

        /* Cards */
        .card {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            margin-bottom: 1.5rem;
        }

        .card-header {
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid var(--light);
        }

        .card-header h3 {
            font-family: 'Playfair Display', sans-serif;
            color: var(--dark);
        }

        /* Table */
        .table-responsive {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th {
            background: var(--light);
            padding: 1rem;
            text-align: left;
            font-weight: 600;
            border-bottom: 2px solid var(--pastel-blue);
        }

        table td {
            padding: 1rem;
            border-bottom: 1px solid var(--light);
        }

        table tr:hover {
            background: var(--light);
        }

        /* Form */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--dark);
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 0.8rem;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-family: 'Outfit', sans-serif;
            font-size: 1rem;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: var(--pastel-blue);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }

        /* Badge */
        .badge {
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .badge-success {
            background: #d4edda;
            color: #155724;
        }

        .badge-warning {
            background: #fff3cd;
            color: #856404;
        }

        .badge-primary {
            background: var(--pastel-blue);
            color: white;
        }

        /* Mobile */
        @media (max-width: 768px) {
            .sidebar {
                width: 0;
                transform: translateX(-100%);
            }

            .main-content {
                margin-left: 0;
            }

            .topbar {
                padding: 1rem;
            }

            .content {
                padding: 1rem;
            }
        }

        @yield('styles')
    </style>
</head>
<body>
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-logo">
            <div style="width: 64px; height: 64px; margin: 0 auto 0.85rem; background: rgba(255,255,255,0.1); border-radius: 14px; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                <img src="{{ asset('images/logohalloeo.png') }}" alt="Logo HalloEO" style="width: 80%; height: auto; object-fit: contain;">
            </div>
            <h1 style="font-family: 'Playfair Display', sans-serif; color: #ffffff; font-size: 1.4rem; letter-spacing: 0.5px;">HalloEO</h1>
            <span class="admin-badge">Admin Panel</span>
        </div>

        <p class="sidebar-group-label">Menu Utama</p>
        <ul class="sidebar-menu">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-gauge-high"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.portfolio.index') }}" class="{{ request()->routeIs('admin.portfolio.*') ? 'active' : '' }}">
                    <i class="fas fa-images"></i>
                    <span>Portfolio</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.services.index') }}" class="{{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                    <i class="fas fa-concierge-bell"></i>
                    <span>Layanan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.testimonials.index') }}" class="{{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">
                    <i class="fas fa-star"></i>
                    <span>Testimonials</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.galleries.index') }}" class="{{ request()->routeIs('admin.galleries.*') ? 'active' : '' }}">
                    <i class="fas fa-photo-film"></i>
                    <span>Galeri</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.messages.index') }}" class="{{ request()->routeIs('admin.messages.*') ? 'active' : '' }}">
                    <i class="fas fa-envelope"></i>
                    <span>Pesan Pengunjung</span>
                    @if(\App\Models\ContactMessage::new()->count() > 0)
                    <span style="background: linear-gradient(135deg,#f59e0b,#ef4444); color: white; padding: 0.15rem 0.55rem; border-radius: 20px; font-size: 0.72rem; font-weight: 700; margin-left: auto;">
                        {{ \App\Models\ContactMessage::new()->count() }}
                    </span>
                    @endif
                </a>
            </li>
            <li class="menu-divider"></li>
            <li>
                <a href="{{ route('home') }}" target="_blank">
                    <i class="fas fa-globe"></i>
                    <span>Lihat Website</span>
                    <i class="fas fa-arrow-up-right-from-square" style="font-size:0.7rem; margin-left:auto; color:var(--sidebar-text-muted);"></i>
                </a>
            </li>
        </ul>
    </aside>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Bar -->
        <div class="topbar">
            <div class="topbar-title">
                <h2>@yield('page-title', 'Dashboard')</h2>
            </div>
            <div class="topbar-actions">
                <form action="{{ route('admin.logout') }}" method="POST" style="margin: 0;">
                    @csrf
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </div>

        <!-- Content -->
        <div class="content">
            @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-error">
                <i class="fas fa-exclamation-circle"></i>
                {{ session('error') }}
            </div>
            @endif

            @yield('content')
        </div>
    </div>

    @yield('scripts')
</body>
</html>