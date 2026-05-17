<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="noindex, nofollow">
    <link rel="icon" type="image/png" href="{{ asset('images/logohalloeo.png') }}">
    <title>@yield('title', 'Admin Panel') - HalloEO</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        *, *::before, *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --font-sans: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;

            --brand-cream: #FFF8EF;
            --brand-mist: #F2F8F7;
            --brand-teal: #0F766E;
            --brand-teal-dark: #0B4F4A;
            --brand-teal-deep: #072A27;
            --brand-teal-soft: #DDF3EF;
            --brand-gold: #C59A3B;
            --brand-gold-dark: #8C6520;
            --brand-gold-soft: #FFF2CF;
            --brand-coral: #B65F58;
            --brand-coral-dark: #8D3E38;
            --brand-coral-soft: #FBE8E5;

            --ink: #17211F;
            --ink-soft: #40514E;
            --muted: #6C7A78;
            --line: #E0E9E6;
            --line-strong: #D3E0DC;
            --surface: #FFFFFF;
            --surface-soft: #F7FAF9;
            --body-bg: #F3F7F5;

            --success: #15803D;
            --success-soft: #DCFCE7;
            --warning: #B7791F;
            --warning-soft: #FEF3C7;
            --danger: #B42318;
            --danger-soft: #FEE4E2;
            --info: #0369A1;
            --info-soft: #E0F2FE;

            --shadow-xs: 0 1px 2px rgba(15, 23, 42, 0.05);
            --shadow-sm: 0 10px 30px rgba(10, 42, 38, 0.07);
            --shadow-md: 0 20px 58px rgba(10, 42, 38, 0.12);
            --radius-sm: 10px;
            --radius-md: 16px;
            --radius-lg: 22px;
            --sidebar-width: 280px;

            /* Variabel lama dipertahankan agar inline-style view lama tetap kompatibel. */
            --pastel-blue: var(--brand-teal);
            --pastel-green: #2E8F7F;
            --dark-pastel-red: var(--brand-coral);
            --dark: var(--ink);
            --light: var(--surface-soft);
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: var(--font-sans);
            background:
                radial-gradient(circle at top left, rgba(221, 243, 239, 0.85), transparent 32rem),
                radial-gradient(circle at bottom right, rgba(255, 242, 207, 0.7), transparent 30rem),
                linear-gradient(180deg, #F9FCFB 0%, var(--body-bg) 100%);
            color: var(--ink);
            min-height: 100vh;
            line-height: 1.6;
        }

        body.sidebar-open {
            overflow: hidden;
        }

        a {
            color: inherit;
        }

        button,
        input,
        textarea,
        select {
            font: inherit;
        }

        img,
        video {
            max-width: 100%;
        }

        .sidebar-overlay {
            position: fixed;
            inset: 0;
            background: rgba(7, 42, 39, 0.46);
            backdrop-filter: blur(2px);
            z-index: 998;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.2s ease, visibility 0.2s ease;
        }

        .sidebar-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background:
                linear-gradient(180deg, rgba(255, 248, 239, 0.08) 0%, rgba(255,255,255,0) 30%),
                linear-gradient(180deg, #0B3F3A 0%, var(--brand-teal-deep) 100%);
            padding: 1.25rem 0.95rem;
            z-index: 1000;
            overflow-y: auto;
            border-right: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 18px 0 52px rgba(8, 43, 40, 0.2);
        }

        .sidebar::-webkit-scrollbar { width: 6px; }
        .sidebar::-webkit-scrollbar-track { background: transparent; }
        .sidebar::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.18); border-radius: 999px; }

        .sidebar-logo {
            margin-bottom: 1.35rem;
            padding: 0.65rem 0.6rem 1rem;
            border-bottom: 1px solid rgba(255,255,255,0.11);
        }

        .brand-block {
            display: flex;
            align-items: center;
            gap: 0.82rem;
        }

        .brand-mark {
            width: 50px;
            height: 50px;
            border-radius: 16px;
            background: rgba(255,255,255,0.12);
            border: 1px solid rgba(255,255,255,0.15);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            box-shadow: inset 0 1px 0 rgba(255,255,255,0.12);
            flex: 0 0 auto;
        }

        .brand-mark img {
            width: 78%;
            height: auto;
            object-fit: contain;
        }

        .brand-name {
            color: #FFFFFF;
            font-size: 1.32rem;
            font-weight: 800;
            letter-spacing: -0.05em;
            line-height: 1.05;
        }

        .brand-subtitle {
            display: block;
            margin-top: 0.22rem;
            color: rgba(255,255,255,0.58);
            font-size: 0.72rem;
            font-weight: 750;
            letter-spacing: 0.1em;
            text-transform: uppercase;
        }

        .sidebar-group-label {
            padding: 0.95rem 0.75rem 0.45rem;
            color: rgba(255,255,255,0.48);
            font-size: 0.68rem;
            font-weight: 800;
            letter-spacing: 0.14em;
            text-transform: uppercase;
        }

        .sidebar-menu {
            list-style: none;
            display: grid;
            gap: 0.25rem;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            min-height: 46px;
            padding: 0.74rem 0.78rem;
            color: rgba(255,255,255,0.76);
            text-decoration: none;
            border-radius: 14px;
            transition: background 0.18s ease, color 0.18s ease, transform 0.18s ease;
            font-size: 0.92rem;
            font-weight: 650;
            position: relative;
        }

        .sidebar-menu a i {
            width: 22px;
            text-align: center;
            color: rgba(255,255,255,0.62);
            font-size: 1rem;
            flex: 0 0 auto;
        }

        .sidebar-menu a:hover {
            background: rgba(255,255,255,0.08);
            color: #FFFFFF;
            transform: translateX(2px);
        }

        .sidebar-menu a:hover i {
            color: #FFFFFF;
        }

        .sidebar-menu a.active {
            background: rgba(255,255,255,0.14);
            color: #FFFFFF;
            box-shadow: inset 0 0 0 1px rgba(255,255,255,0.12);
        }

        .sidebar-menu a.active::before {
            content: '';
            position: absolute;
            left: -0.25rem;
            width: 4px;
            height: 58%;
            border-radius: 999px;
            background: linear-gradient(180deg, var(--brand-gold), #F8D983);
        }

        .sidebar-menu a.active i {
            color: #F8D983;
        }

        .message-count {
            margin-left: auto;
            min-width: 1.55rem;
            height: 1.55rem;
            padding: 0 0.45rem;
            border-radius: 999px;
            background: linear-gradient(135deg, #F8D983, var(--brand-gold));
            color: #35240C;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 0.72rem;
            font-weight: 800;
            box-shadow: 0 8px 18px rgba(197, 154, 59, 0.22);
        }

        .menu-divider {
            height: 1px;
            background: rgba(255,255,255,0.1);
            margin: 0.55rem 0.35rem;
        }

        .sidebar-footnote {
            margin: 1.25rem 0.35rem 0;
            padding: 0.9rem;
            border-radius: 16px;
            background: rgba(255,255,255,0.08);
            border: 1px solid rgba(255,255,255,0.1);
            color: rgba(255,255,255,0.68);
            font-size: 0.78rem;
            line-height: 1.55;
        }

        .main-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
        }

        .topbar {
            position: sticky;
            top: 0;
            z-index: 900;
            min-height: 76px;
            padding: 1rem 2rem;
            background: rgba(255, 255, 255, 0.88);
            border-bottom: 1px solid rgba(224, 233, 230, 0.88);
            backdrop-filter: blur(16px);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
        }

        .topbar-title {
            min-width: 0;
        }

        .topbar-eyebrow {
            display: flex;
            align-items: center;
            gap: 0.45rem;
            margin-bottom: 0.18rem;
            color: var(--muted);
            font-size: 0.74rem;
            font-weight: 800;
            letter-spacing: 0.09em;
            text-transform: uppercase;
        }

        .topbar-title h2 {
            color: var(--ink);
            font-size: clamp(1.34rem, 2.2vw, 1.85rem);
            font-weight: 800;
            line-height: 1.15;
            letter-spacing: -0.055em;
        }

        .topbar-actions {
            display: flex;
            gap: 0.7rem;
            align-items: center;
            flex-wrap: wrap;
            justify-content: flex-end;
        }

        .admin-profile-pill {
            display: inline-flex;
            align-items: center;
            gap: 0.65rem;
            padding: 0.5rem 0.78rem 0.5rem 0.5rem;
            border: 1px solid var(--line);
            background: var(--surface);
            border-radius: 999px;
            color: var(--ink-soft);
            box-shadow: var(--shadow-xs);
        }

        .admin-avatar {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--brand-teal), var(--brand-gold));
            color: #FFFFFF;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
        }

        .admin-profile-pill span:last-child {
            font-size: 0.88rem;
            font-weight: 750;
            max-width: 160px;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }

        .mobile-menu-btn {
            display: none;
            width: 42px;
            height: 42px;
            border: 1px solid var(--line);
            border-radius: 12px;
            background: var(--surface);
            color: var(--ink);
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .btn {
            padding: 0.72rem 1.08rem;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 750;
            font-size: 0.9rem;
            line-height: 1;
            transition: transform 0.18s ease, box-shadow 0.18s ease, background 0.18s ease, border-color 0.18s ease, color 0.18s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.52rem;
            border: 1px solid transparent;
            cursor: pointer;
            min-height: 42px;
            white-space: nowrap;
        }

        .btn:hover {
            transform: translateY(-1px);
            box-shadow: var(--shadow-sm);
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--brand-teal-dark), var(--brand-teal));
            color: #FFFFFF;
            border-color: rgba(15, 118, 110, 0.2);
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, var(--brand-teal-deep), var(--brand-teal));
        }

        .btn-danger {
            background: var(--danger-soft);
            color: var(--danger);
            border-color: rgba(180, 35, 24, 0.14);
        }

        .btn-danger:hover {
            background: #FFDAD6;
        }

        .btn-secondary {
            background: var(--surface);
            color: var(--ink-soft);
            border-color: var(--line);
        }

        .btn-secondary:hover {
            background: var(--surface-soft);
        }

        .btn-muted {
            background: #E9F0EE;
            color: var(--ink-soft);
            border-color: #D8E3DF;
        }

        .btn-warning {
            background: var(--brand-gold-soft);
            color: var(--brand-gold-dark);
            border-color: rgba(197, 154, 59, 0.18);
        }

        .btn-success {
            background: var(--success-soft);
            color: var(--success);
            border-color: rgba(21, 128, 61, 0.14);
        }

        .btn-sm {
            padding: 0.52rem 0.76rem;
            min-height: 36px;
            font-size: 0.82rem;
            border-radius: 10px;
        }

        .content {
            width: min(100%, 1360px);
            margin: 0 auto;
            padding: clamp(1.15rem, 3vw, 2rem);
        }

        .alert {
            padding: 1rem 1.1rem;
            border-radius: 16px;
            margin-bottom: 1.25rem;
            display: flex;
            align-items: flex-start;
            gap: 0.8rem;
            border: 1px solid transparent;
            box-shadow: var(--shadow-xs);
            font-weight: 650;
        }

        .alert i {
            margin-top: 0.15rem;
        }

        .alert-success {
            background: var(--success-soft);
            color: var(--success);
            border-color: rgba(21, 128, 61, 0.14);
        }

        .alert-error {
            background: var(--danger-soft);
            color: var(--danger);
            border-color: rgba(180, 35, 24, 0.14);
        }

        .card {
            background: var(--surface);
            border: 1px solid rgba(224, 233, 230, 0.92);
            border-radius: var(--radius-lg);
            padding: clamp(1rem, 2vw, 1.45rem);
            box-shadow: var(--shadow-sm);
            margin-bottom: 1.35rem;
        }

        .card-header {
            margin-bottom: 1.15rem;
            padding-bottom: 0.95rem;
            border-bottom: 1px solid var(--line);
        }

        .card-header h3,
        h3[style*="Playfair"] {
            font-family: var(--font-sans) !important;
            color: var(--ink) !important;
            font-weight: 800 !important;
            letter-spacing: -0.04em;
        }

        .card-header p,
        p[style*="#7f8c8d"] {
            color: var(--muted) !important;
        }

        .table-responsive {
            overflow-x: auto;
            border-radius: 16px;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            min-width: 720px;
        }

        table th {
            background: var(--surface-soft);
            color: var(--ink-soft);
            padding: 0.88rem 1rem;
            text-align: left;
            font-size: 0.74rem;
            font-weight: 800;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            border-bottom: 1px solid var(--line);
        }

        table td {
            padding: 1rem;
            border-bottom: 1px solid var(--line);
            color: var(--ink-soft);
            vertical-align: middle;
        }

        table tbody tr:last-child td {
            border-bottom: none;
        }

        table tr:hover {
            background: #FAFDFC;
        }

        .form-group {
            margin-bottom: 1.15rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.48rem;
            font-weight: 750;
            color: var(--ink);
            font-size: 0.93rem;
        }

        .form-group input,
        .form-group textarea,
        .form-group select,
        .form-control {
            width: 100%;
            min-height: 46px;
            padding: 0.82rem 0.92rem;
            border: 1px solid var(--line);
            border-radius: 13px;
            background: #FFFFFF;
            color: var(--ink);
            outline: none;
            transition: border-color 0.18s ease, box-shadow 0.18s ease, background 0.18s ease;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus,
        .form-control:focus {
            border-color: rgba(15, 118, 110, 0.55);
            box-shadow: 0 0 0 4px rgba(15, 118, 110, 0.12);
            background: #FFFFFF;
        }

        .form-group input::placeholder,
        .form-group textarea::placeholder {
            color: #9AA7A4;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 130px;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.35rem;
            padding: 0.32rem 0.72rem;
            border-radius: 999px;
            font-size: 0.78rem;
            font-weight: 800;
            line-height: 1;
        }

        .badge-success {
            background: var(--success-soft);
            color: var(--success);
        }

        .badge-warning {
            background: var(--warning-soft);
            color: var(--warning);
        }

        .badge-primary {
            background: var(--brand-teal-soft);
            color: var(--brand-teal-dark);
        }

        .badge-danger {
            background: var(--danger-soft);
            color: var(--danger);
        }

        .section-toolbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.25rem;
            flex-wrap: wrap;
        }

        .section-toolbar h3 {
            color: var(--ink);
            font-size: 1.42rem;
            font-weight: 800;
            letter-spacing: -0.05em;
        }

        .section-toolbar p {
            color: var(--muted);
            margin-top: 0.2rem;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 1.2rem;
            margin-bottom: 1.35rem;
        }

        .stat-card {
            position: relative;
            overflow: hidden;
            min-height: 170px;
            border-radius: 24px;
            padding: 1.35rem;
            color: #FFFFFF;
            box-shadow: var(--shadow-sm);
        }

        .stat-card::before {
            content: '';
            position: absolute;
            width: 180px;
            height: 180px;
            right: -72px;
            top: -76px;
            border-radius: 50%;
            background: rgba(255,255,255,0.16);
        }

        .stat-card::after {
            content: '';
            position: absolute;
            width: 80px;
            height: 80px;
            right: 26px;
            bottom: -32px;
            border-radius: 50%;
            background: rgba(255,255,255,0.1);
        }

        .stat-card.teal { background: linear-gradient(135deg, var(--brand-teal-dark), var(--brand-teal)); }
        .stat-card.gold { background: linear-gradient(135deg, var(--brand-gold-dark), var(--brand-gold)); }
        .stat-card.coral { background: linear-gradient(135deg, var(--brand-coral-dark), var(--brand-coral)); }
        .stat-card.ink { background: linear-gradient(135deg, #22312F, #40514E); }

        .stat-card-content {
            position: relative;
            z-index: 1;
            display: grid;
            gap: 1rem;
            height: 100%;
        }

        .stat-card-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 1rem;
        }

        .stat-label {
            color: rgba(255,255,255,0.78);
            font-size: 0.86rem;
            font-weight: 750;
        }

        .stat-value {
            margin-top: 0.25rem;
            font-size: clamp(2.1rem, 4vw, 3.1rem);
            font-weight: 800;
            line-height: 1;
            letter-spacing: -0.06em;
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 16px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: rgba(255,255,255,0.14);
            color: rgba(255,255,255,0.92);
            font-size: 1.15rem;
        }

        .stat-footer {
            margin-top: auto;
            color: rgba(255,255,255,0.82);
            font-weight: 750;
            font-size: 0.88rem;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            width: fit-content;
        }

        .stat-footer:hover {
            color: #FFFFFF;
        }

        .dashboard-two-col {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 1.25rem;
        }

        .quick-action-grid {
            display: flex;
            gap: 0.85rem;
            flex-wrap: wrap;
        }

        .empty-state {
            text-align: center;
            padding: 2.4rem 1rem;
            color: var(--muted);
        }

        .empty-state i {
            font-size: 2.4rem;
            color: #B8C8C4;
            margin-bottom: 0.8rem;
        }

        @media (max-width: 1180px) {
            .dashboard-grid,
            .dashboard-two-col {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 900px) {
            .sidebar {
                transform: translateX(-105%);
                transition: transform 0.22s ease;
                width: min(86vw, var(--sidebar-width));
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .mobile-menu-btn {
                display: inline-flex;
            }

            .topbar {
                padding: 0.85rem 1rem;
            }

            .admin-profile-pill span:last-child {
                display: none;
            }
        }

        @media (max-width: 620px) {
            .topbar {
                align-items: flex-start;
                flex-wrap: wrap;
            }

            .topbar-title {
                order: 2;
                width: 100%;
            }

            .topbar-actions {
                margin-left: auto;
            }

            .btn {
                padding-inline: 0.82rem;
            }

            .card,
            .stat-card {
                border-radius: 18px;
                padding: 1rem;
            }
        }

        @yield('styles')
    </style>
</head>
<body>
    @php
        $newMessagesCount = \App\Models\ContactMessage::new()->count();
        $adminName = auth()->user()->name ?? 'Admin';
        $adminInitial = strtoupper(substr($adminName, 0, 1));
    @endphp

    <div class="sidebar-overlay" id="sidebarOverlay" aria-hidden="true"></div>

    <aside class="sidebar" id="adminSidebar" aria-label="Navigasi admin">
        <div class="sidebar-logo">
            <div class="brand-block">
                <div class="brand-mark">
                    <img src="{{ asset('images/logohalloeo.png') }}" alt="Logo HalloEO">
                </div>
                <div>
                    <div class="brand-name">HalloEO</div>
                    <span class="brand-subtitle">Admin Workspace</span>
                </div>
            </div>
        </div>

        <p class="sidebar-group-label">Kelola Konten</p>
        <ul class="sidebar-menu">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-gauge-high"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.portfolio.index') }}" class="{{ request()->routeIs('admin.portfolio.*') ? 'active' : '' }}">
                    <i class="fas fa-layer-group"></i>
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
                <a href="{{ route('admin.galleries.index') }}" class="{{ request()->routeIs('admin.galleries.*') ? 'active' : '' }}">
                    <i class="fas fa-photo-film"></i>
                    <span>Galeri</span>
                </a>
            </li>
        </ul>

        <p class="sidebar-group-label">Interaksi</p>
        <ul class="sidebar-menu">
            <li>
                <a href="{{ route('admin.testimonials.index') }}" class="{{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">
                    <i class="fas fa-star-half-stroke"></i>
                    <span>Testimonial</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.messages.index') }}" class="{{ request()->routeIs('admin.messages.*') ? 'active' : '' }}">
                    <i class="fas fa-envelope-open-text"></i>
                    <span>Pesan</span>
                    @if($newMessagesCount > 0)
                        <span class="message-count">{{ $newMessagesCount }}</span>
                    @endif
                </a>
            </li>
            <li class="menu-divider"></li>
            <li>
                <a href="{{ route('home') }}" target="_blank" rel="noopener">
                    <i class="fas fa-globe"></i>
                    <span>Lihat Website</span>
                    <i class="fas fa-arrow-up-right-from-square" style="font-size:0.72rem; margin-left:auto; color:rgba(255,255,255,0.45);"></i>
                </a>
            </li>
        </ul>

        <div class="sidebar-footnote">
            <strong style="color: rgba(255,255,255,0.9);">Alur kerja</strong><br>
            Cek pesan dan testimonial baru, lalu perbarui portfolio agar pengunjung mendapat informasi terbaru.
        </div>
    </aside>

    <main class="main-content">
        <header class="topbar">
            <button type="button" class="mobile-menu-btn" id="sidebarToggle" aria-label="Buka menu admin" aria-controls="adminSidebar" aria-expanded="false">
                <i class="fas fa-bars"></i>
            </button>

            <div class="topbar-title">
                <div class="topbar-eyebrow">
                    <i class="fas fa-briefcase"></i>
                    HalloEO Management
                </div>
                <h2>@yield('page-title', 'Dashboard')</h2>
            </div>

            <div class="topbar-actions">
                <a href="{{ route('home') }}" target="_blank" rel="noopener" class="btn btn-secondary">
                    <i class="fas fa-up-right-from-square"></i>
                    Website
                </a>
                <div class="admin-profile-pill" title="{{ $adminName }}">
                    <span class="admin-avatar">{{ $adminInitial }}</span>
                    <span>{{ $adminName }}</span>
                </div>
                <form action="{{ route('admin.logout') }}" method="POST" style="margin: 0;">
                    @csrf
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-right-from-bracket"></i>
                        Logout
                    </button>
                </form>
            </div>
        </header>

        <section class="content">
            @if(session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-circle-check"></i>
                    <div>{{ session('success') }}</div>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-error">
                    <i class="fas fa-triangle-exclamation"></i>
                    <div>{{ session('error') }}</div>
                </div>
            @endif

            @yield('content')
        </section>
    </main>

    <script>
        const sidebar = document.getElementById('adminSidebar');
        const overlay = document.getElementById('sidebarOverlay');
        const toggle = document.getElementById('sidebarToggle');

        function closeSidebar() {
            sidebar?.classList.remove('active');
            overlay?.classList.remove('active');
            document.body.classList.remove('sidebar-open');
            toggle?.setAttribute('aria-expanded', 'false');
        }

        function openSidebar() {
            sidebar?.classList.add('active');
            overlay?.classList.add('active');
            document.body.classList.add('sidebar-open');
            toggle?.setAttribute('aria-expanded', 'true');
        }

        toggle?.addEventListener('click', function () {
            sidebar?.classList.contains('active') ? closeSidebar() : openSidebar();
        });

        overlay?.addEventListener('click', closeSidebar);

        window.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') {
                closeSidebar();
            }
        });
    </script>
    @yield('scripts')
</body>
</html>
