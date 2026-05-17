<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <link rel="icon" type="image/png" href="{{ asset('images/logohalloeo.png') }}">
    <title>Admin Login - HalloEO</title>
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
            --brand-teal: #0F766E;
            --brand-teal-dark: #0B4F4A;
            --brand-teal-soft: #DDF3EF;
            --brand-gold: #C59A3B;
            --brand-gold-soft: #FFF3D1;
            --brand-coral: #B65F58;
            --ink: #17211F;
            --ink-soft: #40514E;
            --muted: #6B7A78;
            --line: #E0E9E6;
            --surface: #FFFFFF;
            --surface-soft: #F6FAF8;
            --danger: #B42318;
            --danger-soft: #FEE4E2;
            --success: #15803D;
            --success-soft: #DCFCE7;
            --shadow-lg: 0 30px 90px rgba(10, 42, 38, 0.16);
            --shadow-sm: 0 10px 30px rgba(10, 42, 38, 0.08);
        }

        body {
            min-height: 100vh;
            font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            color: var(--ink);
            background:
                radial-gradient(circle at top left, rgba(221, 243, 239, 0.9), transparent 34rem),
                radial-gradient(circle at bottom right, rgba(255, 243, 209, 0.88), transparent 30rem),
                linear-gradient(135deg, #F8FBFA 0%, #F1F6F4 100%);
        }

        a {
            color: inherit;
        }

        button,
        input {
            font: inherit;
        }

        .login-shell {
            min-height: 100vh;
            display: grid;
            grid-template-columns: minmax(340px, 0.95fr) minmax(380px, 1.05fr);
            align-items: stretch;
        }

        .brand-panel {
            position: relative;
            overflow: hidden;
            padding: clamp(2rem, 5vw, 4.5rem);
            background:
                linear-gradient(180deg, rgba(255,255,255,0.08), rgba(255,255,255,0)),
                linear-gradient(150deg, #0B3F3A 0%, #072A27 100%);
            color: #FFFFFF;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            gap: 3rem;
        }

        .brand-panel::before,
        .brand-panel::after {
            content: '';
            position: absolute;
            border-radius: 999px;
            pointer-events: none;
        }

        .brand-panel::before {
            width: 26rem;
            height: 26rem;
            right: -11rem;
            top: -8rem;
            background: rgba(197, 154, 59, 0.18);
        }

        .brand-panel::after {
            width: 22rem;
            height: 22rem;
            left: -10rem;
            bottom: -9rem;
            background: rgba(221, 243, 239, 0.12);
        }

        .brand-inner {
            position: relative;
            z-index: 1;
        }

        .brand-lockup {
            display: flex;
            align-items: center;
            gap: 0.9rem;
            margin-bottom: clamp(3rem, 9vw, 6.5rem);
        }

        .brand-mark {
            width: 58px;
            height: 58px;
            border-radius: 18px;
            background: rgba(255,255,255,0.12);
            border: 1px solid rgba(255,255,255,0.16);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            box-shadow: inset 0 1px 0 rgba(255,255,255,0.16);
        }

        .brand-mark img {
            width: 78%;
            height: auto;
            object-fit: contain;
        }

        .brand-name {
            font-size: 1.45rem;
            font-weight: 800;
            letter-spacing: -0.04em;
            line-height: 1;
        }

        .brand-subtitle {
            display: block;
            margin-top: 0.28rem;
            color: rgba(255,255,255,0.62);
            font-size: 0.78rem;
            font-weight: 700;
            letter-spacing: 0.11em;
            text-transform: uppercase;
        }

        .brand-copy {
            max-width: 34rem;
        }

        .brand-copy .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.42rem 0.72rem;
            border: 1px solid rgba(255,255,255,0.16);
            border-radius: 999px;
            background: rgba(255,255,255,0.08);
            color: rgba(255,255,255,0.78);
            font-size: 0.76rem;
            font-weight: 800;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            margin-bottom: 1.2rem;
        }

        .brand-copy h1 {
            font-size: clamp(2.2rem, 4vw, 4.1rem);
            line-height: 0.98;
            letter-spacing: -0.07em;
            margin-bottom: 1.3rem;
        }

        .brand-copy p {
            color: rgba(255,255,255,0.72);
            font-size: clamp(1rem, 1.45vw, 1.1rem);
            line-height: 1.75;
            max-width: 31rem;
        }

        .brand-metrics {
            position: relative;
            z-index: 1;
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 0.85rem;
        }

        .metric-item {
            padding: 1rem;
            border-radius: 18px;
            background: rgba(255,255,255,0.08);
            border: 1px solid rgba(255,255,255,0.12);
            backdrop-filter: blur(14px);
        }

        .metric-item strong {
            display: block;
            font-size: 1rem;
            margin-bottom: 0.2rem;
        }

        .metric-item span {
            color: rgba(255,255,255,0.62);
            font-size: 0.8rem;
            line-height: 1.45;
        }

        .form-panel {
            padding: clamp(1.25rem, 4vw, 3.5rem);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            width: min(100%, 460px);
            background: rgba(255,255,255,0.86);
            border: 1px solid rgba(224, 233, 230, 0.9);
            border-radius: 28px;
            padding: clamp(1.45rem, 4vw, 2.25rem);
            box-shadow: var(--shadow-lg);
            backdrop-filter: blur(18px);
        }

        .login-header {
            margin-bottom: 1.6rem;
        }

        .login-header .kicker {
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            padding: 0.35rem 0.62rem;
            border-radius: 999px;
            background: var(--brand-teal-soft);
            color: var(--brand-teal-dark);
            font-size: 0.76rem;
            font-weight: 800;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            margin-bottom: 0.95rem;
        }

        .login-header h2 {
            font-size: clamp(1.65rem, 3vw, 2.2rem);
            line-height: 1.12;
            letter-spacing: -0.055em;
            margin-bottom: 0.55rem;
            color: var(--ink);
        }

        .login-header p {
            color: var(--muted);
            line-height: 1.65;
        }

        .alert {
            padding: 0.95rem 1rem;
            border-radius: 16px;
            margin-bottom: 1rem;
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            font-weight: 650;
            font-size: 0.92rem;
            border: 1px solid transparent;
        }

        .alert i {
            margin-top: 0.15rem;
        }

        .alert-success {
            background: var(--success-soft);
            color: var(--success);
            border-color: rgba(21, 128, 61, 0.16);
        }

        .alert-error {
            background: var(--danger-soft);
            color: var(--danger);
            border-color: rgba(180, 35, 24, 0.16);
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-group label {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 0.75rem;
            margin-bottom: 0.5rem;
            color: var(--ink);
            font-weight: 750;
            font-size: 0.92rem;
        }

        .input-wrap {
            position: relative;
        }

        .input-wrap .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #91A19E;
            pointer-events: none;
        }

        .form-control {
            width: 100%;
            min-height: 50px;
            padding: 0.88rem 1rem 0.88rem 2.75rem;
            border: 1px solid var(--line);
            border-radius: 15px;
            background: #FFFFFF;
            color: var(--ink);
            outline: none;
            transition: border-color 0.18s ease, box-shadow 0.18s ease, background 0.18s ease;
        }

        .form-control:focus {
            border-color: rgba(15, 118, 110, 0.55);
            box-shadow: 0 0 0 4px rgba(15, 118, 110, 0.12);
        }

        .form-control::placeholder {
            color: #98A6A3;
        }

        .password-toggle {
            position: absolute;
            right: 0.45rem;
            top: 50%;
            transform: translateY(-50%);
            width: 40px;
            height: 40px;
            border: 0;
            border-radius: 12px;
            background: transparent;
            color: var(--muted);
            cursor: pointer;
        }

        .password-toggle:hover {
            background: var(--surface-soft);
            color: var(--brand-teal-dark);
        }

        .btn-login {
            width: 100%;
            min-height: 52px;
            margin-top: 0.5rem;
            border: 0;
            border-radius: 15px;
            background: linear-gradient(135deg, var(--brand-teal-dark), var(--brand-teal));
            color: #FFFFFF;
            font-size: 0.98rem;
            font-weight: 800;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.65rem;
            box-shadow: 0 18px 34px rgba(15, 118, 110, 0.24);
            transition: transform 0.18s ease, box-shadow 0.18s ease;
        }

        .btn-login:hover {
            transform: translateY(-1px);
            box-shadow: 0 22px 42px rgba(15, 118, 110, 0.28);
        }

        .login-footer {
            margin-top: 1.35rem;
            padding-top: 1.15rem;
            border-top: 1px solid var(--line);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            flex-wrap: wrap;
            color: var(--muted);
            font-size: 0.9rem;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            color: var(--brand-teal-dark);
            text-decoration: none;
            font-weight: 750;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        @media (max-width: 920px) {
            .login-shell {
                grid-template-columns: 1fr;
            }

            .brand-panel {
                min-height: auto;
                padding: 1.4rem;
                gap: 1.25rem;
            }

            .brand-lockup {
                margin-bottom: 1.8rem;
            }

            .brand-copy h1 {
                max-width: 34rem;
            }

            .metric-item {
                display: none;
            }

            .form-panel {
                padding: 1.25rem;
                align-items: flex-start;
            }
        }

        @media (max-width: 520px) {
            .brand-copy h1 {
                font-size: 2rem;
            }

            .brand-copy p {
                font-size: 0.96rem;
            }

            .login-card {
                border-radius: 22px;
            }
        }
    </style>
</head>
<body>
    <main class="login-shell">
        <section class="brand-panel" aria-label="Informasi HalloEO">
            <div class="brand-inner">
                <div class="brand-lockup">
                    <div class="brand-mark">
                        <img src="{{ asset('images/logohalloeo.png') }}" alt="Logo HalloEO">
                    </div>
                    <div>
                        <div class="brand-name">HalloEO</div>
                        <span class="brand-subtitle">Admin Workspace</span>
                    </div>
                </div>

                <div class="brand-copy">
                    <h1>Panel Admin HalloEO</h1>
                    <p>Panel ini dirancang agar admin dapat memperbarui portfolio, layanan, pesan, dan testimonial secara rapi tanpa tampilan yang berlebihan.</p>
                </div>
            </div>

            <!-- <div class="brand-metrics" aria-label="Prinsip kerja admin">
                <div class="metric-item">
                    <strong>Fokus</strong>
                    <span>Konten penting terlihat jelas.</span>
                </div>
                <div class="metric-item">
                    <strong>Rapi</strong>
                    <span>Navigasi dibuat konsisten.</span>
                </div>
                <div class="metric-item">
                    <strong>Nyaman</strong>
                    <span>Kontras warna lebih ramah mata.</span>
                </div>
            </div> -->
        </section>

        <section class="form-panel">
            <div class="login-card">
                <div class="login-header">
                    <span class="kicker"><i class="fas fa-lock"></i> Admin Login</span>
                    <h2>Masuk ke panel HalloEO</h2>
                    <p>Gunakan akun admin untuk mengatur konten website dan meninjau pesan masuk.</p>
                </div>

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

                <form action="{{ route('admin.login.post') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="username">Username</label>
                        <div class="input-wrap">
                            <i class="fas fa-user input-icon"></i>
                            <input type="text" id="username" name="username" class="form-control" required autofocus autocomplete="username" placeholder="Masukkan username admin">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-wrap">
                            <i class="fas fa-key input-icon"></i>
                            <input type="password" id="password" name="password" class="form-control" required autocomplete="current-password" placeholder="Masukkan password">
                            <button type="button" class="password-toggle" id="passwordToggle" aria-label="Tampilkan password">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>

                    <button type="submit" class="btn-login">
                        <i class="fas fa-arrow-right-to-bracket"></i>
                        Masuk ke Admin Panel
                    </button>
                </form>

                <div class="login-footer">
                    <span>Area internal HalloEO</span>
                    <a href="{{ route('home') }}" class="back-link">
                        <i class="fas fa-arrow-left"></i>
                        Kembali ke website
                    </a>
                </div>
            </div>
        </section>
    </main>

    <script>
        const passwordInput = document.getElementById('password');
        const passwordToggle = document.getElementById('passwordToggle');

        passwordToggle?.addEventListener('click', function () {
            const isPassword = passwordInput.type === 'password';
            passwordInput.type = isPassword ? 'text' : 'password';
            this.setAttribute('aria-label', isPassword ? 'Sembunyikan password' : 'Tampilkan password');
            this.innerHTML = isPassword ? '<i class="fas fa-eye-slash"></i>' : '<i class="fas fa-eye"></i>';
        });
    </script>
</body>
</html>
