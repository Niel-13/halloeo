<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Wujudkan Acara Impian: Dekorasi Memukau & Maskot Kustom | [Nama Tim Kreatif Anda]</title>
    <meta name="description" content="Jadikan setiap acara tak terlupakan dengan dekorasi kustom dan maskot yang menghidupkan merek Anda. Dari pesta perusahaan hingga peluncuran produk, kami menciptakan pengalaman visual yang unik.">
    <meta name="keywords" content="dekorasi acara korporat, dekorasi pesta kantor, pembuatan maskot kustom, desain maskot ramah, katering dekoratif acara, hiburan acara unik, identitas maskot merek, instalasi dekorasi kustom, layanan kreatif acara">
    <meta property="og:title" content="Dekorasi & Maskot Kustom untuk Acara Perusahaan Anda" />
    <meta property="og:description" content="Hidupkan merek Anda dengan dekorasi acara menawan dan maskot kustom interaktif. Solusi kreatif untuk katering, dekorasi, dan hiburan." />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://www.nama-tim-anda.com/dekorasi-maskot" />
    <meta property="og:image" content="https://www.nama-tim-anda.com/images/dekorasi-maskot-portfolio.jpg" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Hias Acara Anda dengan Dekorasi Kustom & Maskot Lucu" />
    <meta name="twitter:description" content="Hadirkan pengalaman visual unik dengan dekorasi acara korporat & maskot merek kustom. Coba konsultasi desain!" />
    <meta name="twitter:image" content="https://www.nama-tim-anda.com/images/dekorasi-maskot-portfolio.jpg" />
    <link rel="icon" type="image/png" href="{{ asset('images/logohalloeo.png') }}?v={{ time() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'HalloEO - Dekorasi & Maskot Styrofoam Profesional')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
    /* ── Font Fallback (CLS fix) ── */
    @font-face {
        font-family: 'Playfair Display-Fallback';
        src: local('Georgia'), local('Times New Roman');
        ascent-override: 94%;
        descent-override: 26%;
        line-gap-override: 0%;
        size-adjust: 98%;
    }

    /* ── Design Tokens ── */
    :root {
        --blue:        #A8D8EA;
        --blue-deep:   #5A9DB8;
        --blue-muted:  #D4EDF6;
        --green:       #B8E0D2;
        --green-deep:  #5FA38E;
        --red-pastel:  #D88A8A;
        --red-deep:    #B85C5C;
        --gold:        #C9A96E;
        --dark:        #1E2B38;
        --dark-mid:    #2C3E50;
        --muted:       #6B7C8E;
        --light:       #F5F7FA;
        --white:       #FFFFFF;
        --surface:     #FAFBFC;

        --shadow-sm:   0 1px 3px rgba(30,43,56,.06), 0 1px 2px rgba(30,43,56,.04);
        --shadow-md:   0 4px 16px rgba(30,43,56,.08), 0 2px 6px rgba(30,43,56,.05);
        --shadow-lg:   0 12px 40px rgba(30,43,56,.12), 0 4px 12px rgba(30,43,56,.08);
        --shadow-xl:   0 24px 64px rgba(30,43,56,.15);

        --radius-sm:   6px;
        --radius-md:   12px;
        --radius-lg:   20px;
        --radius-xl:   32px;

        --nav-h:       72px;
        --transition:  0.3s cubic-bezier(.4,0,.2,1);
    }

    /* ── Reset ── */
    *, *::before, *::after {
        margin: 0; padding: 0;
        box-sizing: border-box;
    }

    html { scroll-behavior: smooth; }

    body {
        font-family: 'Outfit', sans-serif;
        background: var(--surface);
        color: var(--dark);
        overflow-x: hidden;
        line-height: 1.6;
        -webkit-font-smoothing: antialiased;
    }

    /* ══════════════════════════════
        NAVBAR
    ══════════════════════════════ */
    .navbar {
        position: fixed;
        top: 0; left: 0;
        width: 100%;
        height: var(--nav-h);
        z-index: 1000;
        transition: background var(--transition), box-shadow var(--transition);
    }

    /* Thin top accent line */
    .navbar::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 3px;
        background: linear-gradient(90deg, var(--blue-deep), var(--green-deep), var(--gold));
    }

    .navbar.transparent {
        background: rgba(255,255,255,0);
    }

    .navbar.scrolled {
        background: rgba(255,255,255,0.97);
        box-shadow: var(--shadow-md);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
    }

    .nav-container {
        max-width: 1360px;
        height: 100%;
        margin: 0 auto;
        padding: 0 2.5rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    /* Logo */
    .logo {
        display: flex;
        align-items: center;
        gap: 0.6rem;
        text-decoration: none;
        transition: transform var(--transition);
    }

    .logo:hover { transform: translateY(-1px); }

    .logo-img {
        width: 42px;
        height: 42px;
        object-fit: contain;
        border-radius: 10px;
    }

    /* Nav links */
    .nav-links {
        display: flex;
        align-items: center;
        gap: 0.25rem;
        list-style: none;
    }

    .nav-links a {
        display: block;
        padding: 0.5rem 1rem;
        text-decoration: none;
        color: var(--dark-mid);
        font-weight: 500;
        font-size: 0.95rem;
        letter-spacing: 0.01em;
        border-radius: var(--radius-sm);
        transition: color var(--transition), background var(--transition);
        position: relative;
    }

    .nav-links a::after {
        content: '';
        position: absolute;
        bottom: 2px; left: 50%;
        transform: translateX(-50%) scaleX(0);
        width: calc(100% - 2rem);
        height: 2px;
        background: linear-gradient(90deg, var(--blue-deep), var(--green-deep));
        border-radius: 2px;
        transition: transform var(--transition);
    }

    .nav-links a:hover {
        color: var(--blue-deep);
        background: var(--blue-muted);
    }

    .nav-links a:hover::after,
    .nav-links a.active::after { transform: translateX(-50%) scaleX(1); }

    .nav-links a.active {
        color: var(--blue-deep);
        font-weight: 600;
    }

    /* CTA Button */
    .nav-cta {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        padding: 0.55rem 1.3rem;
        background: linear-gradient(135deg, var(--blue-deep), var(--green-deep));
        color: var(--white) !important;
        border-radius: 100px;
        font-weight: 600;
        font-size: 0.9rem;
        letter-spacing: 0.02em;
        box-shadow: 0 4px 14px rgba(90,157,184,.35);
        transition: box-shadow var(--transition), transform var(--transition) !important;
    }

    .nav-cta:hover {
        background: linear-gradient(135deg, var(--blue-deep), var(--green-deep)) !important;
        transform: translateY(-2px) !important;
        box-shadow: 0 8px 22px rgba(90,157,184,.45) !important;
    }

    .nav-cta::after { display: none !important; }

    /* Mobile toggle */
    .mobile-menu-btn {
        display: none;
        background: none;
        border: 1.5px solid rgba(90,157,184,.3);
        border-radius: var(--radius-sm);
        width: 40px; height: 40px;
        color: var(--blue-deep);
        font-size: 1.2rem;
        cursor: pointer;
        transition: all var(--transition);
    }

    .mobile-menu-btn:hover {
        background: var(--blue-muted);
        border-color: var(--blue-deep);
    }

    /* ══════════════════════════════
        MAIN CONTENT
    ══════════════════════════════ */
    .main-content {
        margin-top: var(--nav-h);
        min-height: calc(100vh - var(--nav-h));
    }

    .wa-float {
        position: fixed;
        bottom: 2rem;
        right: 2rem;
        z-index: 999;
        width: 56px;
        height: 56px;
        background: #25D366;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 1.6rem;
        box-shadow: 0 8px 24px rgba(37,211,102,.4);
        text-decoration: none;
        transition: transform 0.3s cubic-bezier(.4,0,.2,1), box-shadow 0.3s ease;
        animation: wa-pop-in 0.5s cubic-bezier(.4,0,.2,1) 1s both;
    }

    .wa-float:hover {
        transform: scale(1.12) translateY(-3px);
        box-shadow: 0 14px 36px rgba(37,211,102,.5);
        color: #fff;
    }

    /* Pulse ring */
    .wa-float::before {
        content: '';
        position: absolute;
        inset: 0;
        border-radius: 50%;
        background: #25D366;
        animation: wa-pulse 2.5s ease-out infinite;
        z-index: -1;
    }

    @keyframes wa-pulse {
        0%   { transform: scale(1);   opacity: 0.6; }
        70%  { transform: scale(1.6); opacity: 0; }
        100% { transform: scale(1.6); opacity: 0; }
    }

    @keyframes wa-pop-in {
        from { opacity: 0; transform: scale(0.5) translateY(20px); }
        to   { opacity: 1; transform: scale(1)   translateY(0); }
    }

    /* Tooltip */
    .wa-tooltip {
        position: absolute;
        right: calc(100% + 12px);
        top: 50%;
        transform: translateY(-50%) translateX(6px);
        background: var(--dark, #1E2B38);
        color: #fff;
        font-family: var(--font-body, 'Outfit', sans-serif);
        font-size: 0.78rem;
        font-weight: 600;
        white-space: nowrap;
        padding: 0.45rem 0.9rem;
        border-radius: 8px;
        pointer-events: none;
        opacity: 0;
        transition: opacity 0.2s ease, transform 0.2s ease;
    }

    /* Tooltip arrow */
    .wa-tooltip::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 100%;
        transform: translateY(-50%);
        border: 5px solid transparent;
        border-left-color: var(--dark, #1E2B38);
    }

    .wa-float:hover .wa-tooltip {
        opacity: 1;
        transform: translateY(-50%) translateX(0);
    }

    @media (max-width: 768px) {
        .wa-float {
            bottom: 1.25rem;
            right: 1.25rem;
            width: 50px;
            height: 50px;
            font-size: 1.4rem;
        }

        .wa-tooltip { display: none; }
    }

    /* ══════════════════════════════
        FOOTER
    ══════════════════════════════ */
    .footer {
        background: #1E2B38;
        color: rgba(255,255,255,.75);
        padding: 5rem 2.5rem 2.5rem;
        margin-top: 6rem;
        position: relative;
        overflow: hidden;
    }

    .footer::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--deep-blue), var(--deep-green), #C9A96E);
    }

    .footer-content {
        max-width: 1360px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1.8fr repeat(3, 1fr);
        gap: 3rem;
    }

    /* Brand column */
    .footer-logo {
        font-family: 'Playfair Display', serif;
        font-size: 1.6rem;
        font-weight: 700;
        color: #fff;                  
        text-decoration: none;
        display: inline-block;
        margin-bottom: 1rem;
    }

    .footer-brand p {
        font-size: 0.9rem;
        line-height: 1.8;
        color: rgba(255,255,255,.5);
        max-width: 280px;
    }

    /* Section headings */
    .footer-section h4 {
        font-family: 'Playfair Display', serif;
        font-size: 1rem;
        font-weight: 600;
        color: #fff;
        margin-bottom: 1.25rem;
        letter-spacing: 0.01em;
    }

    /* Link lists */
    .footer-section ul {
        list-style: none;
        display: flex;
        flex-direction: column;
        gap: 0.6rem;
    }

    .footer-section ul a {
        text-decoration: none;
        color: rgba(255,255,255,.5);
        font-size: 0.9rem;
        display: inline-flex;
        align-items: center;
        gap: 0;
        transition: color 0.3s ease, padding-left 0.3s ease;
    }

    .footer-section ul a::before {
        content: '';
        width: 0;
        height: 1.5px;
        background: var(--pastel-blue);
        transition: width 0.3s ease;
        display: inline-block;
        margin-right: 0;
    }

    .footer-section ul a:hover {
        color: var(--pastel-blue);
        padding-left: 6px;
    }

    .footer-section ul a:hover::before { width: 12px; margin-right: 6px; }

    /* Contact items */
    .footer-contact-item {
        display: flex;
        align-items: flex-start;
        gap: 0.75rem;
        margin-bottom: 0.85rem;
        font-size: 0.9rem;
        color: rgba(255,255,255,.5);
    }

    .footer-contact-item i {
        color: var(--pastel-blue);
        margin-top: 3px;
        flex-shrink: 0;
        font-size: 0.85rem;
        width: 16px;
        text-align: center;
    }

    /* Social icons */
    .social-links {
        display: flex;
        gap: 0.65rem;
        margin-top: 1.5rem;
    }

    .social-links a {
        width: 38px; height: 38px;
        border: 1px solid rgba(255,255,255,.12);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: rgba(255,255,255,.5);
        font-size: 1rem;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .social-links a:hover {
        background: var(--deep-blue);
        border-color: var(--deep-blue);
        color: #fff;
        transform: translateY(-3px);
        box-shadow: 0 6px 16px rgba(90,157,184,.35);
    }

    /* Divider & bottom bar */
    .footer-divider {
        max-width: 1360px;
        margin: 3rem auto 0;
        border: none;
        border-top: 1px solid rgba(255,255,255,.08);
    }

    .footer-bottom {
        max-width: 1360px;
        margin: 0 auto;
        padding-top: 1.5rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
        font-size: 0.85rem;
        color: rgba(255,255,255,.3);
    }

    .footer-bottom-links {
        display: flex;
        gap: 1.5rem;
    }

    .footer-bottom-links a {
        color: rgba(255,255,255,.3);
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .footer-bottom-links a:hover { color: var(--pastel-blue); }

    /* Responsive */
    @media (max-width: 1024px) {
        .footer-content { grid-template-columns: 1fr 1fr; }
    }

    @media (max-width: 768px) {
        .footer { padding: 3.5rem 1.5rem 2rem; }
        .footer-content { grid-template-columns: 1fr; gap: 2.5rem; }
        .footer-bottom { flex-direction: column; gap: 1rem; text-align: center; }
    }

    /* ══════════════════════════════
        FLOATING SHAPES (bg deco)
    ══════════════════════════════ */
    .floating-shapes {
        position: fixed;
        inset: 0;
        z-index: -1;
        overflow: hidden;
        pointer-events: none;
    }

    .shape {
        position: absolute;
        opacity: 0.045;
        animation: float-shape 24s ease-in-out infinite;
        will-change: transform;
    }

    .shape:nth-child(1) {
        top: 8%; left: 6%;
        width: 220px; height: 220px;
        background: radial-gradient(circle, var(--blue), transparent 70%);
        border-radius: 50%;
        animation-duration: 20s;
    }

    .shape:nth-child(2) {
        top: 55%; right: 6%;
        width: 280px; height: 280px;
        background: radial-gradient(circle, var(--green), transparent 70%);
        border-radius: 50%;
        animation-delay: 7s; animation-duration: 26s;
    }

    .shape:nth-child(3) {
        bottom: 12%; left: 45%;
        width: 200px; height: 200px;
        background: radial-gradient(circle, var(--gold), transparent 70%);
        border-radius: 50%;
        animation-delay: 14s; animation-duration: 22s;
    }

    @keyframes float-shape {
        0%, 100% { transform: translate(0, 0); }
        33%       { transform: translate(28px, -24px); }
        66%       { transform: translate(-18px, 18px); }
    }

    /* ══════════════════════════════
        RESPONSIVE
    ══════════════════════════════ */
    @media (max-width: 1024px) {
        .footer-content {
            grid-template-columns: 1fr 1fr;
        }
    }

    @media (max-width: 768px) {
        :root { --nav-h: 64px; }

        .nav-links {
            position: fixed;
            top: var(--nav-h); left: 0;
            width: 100%;
            height: calc(100dvh - var(--nav-h));
            background: rgba(255,255,255,.98);
            backdrop-filter: blur(16px);
            flex-direction: column;
            align-items: stretch;
            padding: 1.5rem;
            gap: 0.25rem;
            transform: translateX(-100%);
            transition: transform var(--transition);
            overflow-y: auto;
        }

        .nav-links.active { transform: translateX(0); }

        .nav-links a {
            padding: 0.85rem 1rem;
            font-size: 1.05rem;
        }

        .nav-cta {
            margin-top: 0.5rem;
            justify-content: center;
            padding: 0.9rem 1.5rem;
        }

        .mobile-menu-btn { display: flex; align-items: center; justify-content: center; }

        .nav-container { padding: 0 1.25rem; }

        .footer { padding: 3.5rem 1.5rem 2rem; }

        .footer-content {
            grid-template-columns: 1fr;
            gap: 2.5rem;
        }

        .footer-bottom {
            flex-direction: column;
            gap: 1rem;
            text-align: center;
        }
    }
</style>
@yield('styles')
</head>
<body>
    <div class="floating-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <!-- Navbar -->
    <nav class="navbar scrolled" id="navbar">
        <div class="nav-container">
            <a href="{{ route('home') }}" class="logo" style="display: inline-flex; align-items: center; text-decoration: none; height: 65px;">  
            <img 
                src="{{ asset('images/logohalloeo.png') }}" 
                alt="Logo HalloEO" 
                width="200" 
                height="60" 
                style="max-height: 100%; width: auto; object-fit: contain;">                
            </a>
            <ul class="nav-links" id="navLinks">
                <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
                <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">Tentang Kami</a></li>
                <li><a href="{{ route('services') }}" class="{{ request()->routeIs('services') ? 'active' : '' }}">Layanan Kami</a></li>
                <li><a href="{{ route('portfolio.index') }}" class="{{ request()->routeIs('portfolio.*') ? 'active' : '' }}">Portofolio</a></li>
                <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}" class="nav-cta">Kontak</a></li>
            </ul>
            <button class="mobile-menu-btn" id="mobileMenuBtn" aria-label="Toggle menu">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="main-content">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">

            {{-- Brand --}}
            <div class="footer-section footer-brand">
                <a href="{{ route('home') }}" class="footer-logo">HalloEO</a>
                <p>Spesialis pembuatan dekorasi dan maskot dari styrofoam untuk berbagai acara dan kebutuhan promosi Anda.</p>
                <div class="social-links">
                    <a href="https://facebook.com/share/1AoDq8dKsG/" target="_blank" rel="noopener" aria-label="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://instagram.com/halloeo_official/" target="_blank" rel="noopener" aria-label="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://wa.me/6285731112023" target="_blank" rel="noopener" aria-label="WhatsApp">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                    <a href="https://tiktok.com/@halloeo_official" target="_blank" rel="noopener" aria-label="TikTok">
                        <i class="fa-brands fa-tiktok"></i>
                    </a>
                </div>
            </div>

            {{-- Layanan --}}
            <div class="footer-section">
                <h4>Layanan</h4>
                <ul>
                    @foreach($footerServices as $service)
                        <li>
                            <a href="{{ $service->slug ? route('services.show', $service->slug) : '#' }}">
                                {{ $service->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Link Cepat --}}
            <div class="footer-section">
                <h4>Link Cepat</h4>
                <ul>
                    <li><a href="{{ route('about') }}">Tentang Kami</a></li>
                    <li><a href="{{ route('portfolio.index') }}">Portofolio</a></li>
                    <li><a href="{{ route('contact') }}">Kontak</a></li>
                </ul>
            </div>

            {{-- Kontak --}}
            <div class="footer-section">
                <h4>Kontak</h4>
                <div class="footer-contact-item">
                    <i class="fas fa-phone"></i>
                    <span>+62 857-3111-2023</span>
                </div>
                <div class="footer-contact-item">
                    <i class="fas fa-envelope"></i>
                    <span>infohalloeo@gmail.com</span>
                </div>
                <div class="footer-contact-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>Bekasi, Indonesia</span>
                </div>
            </div>

        </div>

        <hr class="footer-divider">

        <div class="footer-bottom">
            <span>&copy; {{ date('Y') }} HalloEO. All Rights Reserved.</span>
        </div>
    </footer>

    <a href="https://wa.me/6285731112023" 
    class="wa-float" 
    target="_blank" 
    rel="noopener"
    aria-label="Chat WhatsApp">
        <i class="fab fa-whatsapp"></i>
        <span class="wa-tooltip">Chat via WhatsApp</span>
    </a>

    <script>
        // Mobile Menu Toggle
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const navLinks = document.getElementById('navLinks');

        mobileMenuBtn.addEventListener('click', () => {
            navLinks.classList.toggle('active');
            const icon = mobileMenuBtn.querySelector('i');
            icon.classList.toggle('fa-bars');
            icon.classList.toggle('fa-times');
        });

        // Navbar Scroll Effect
        window.addEventListener('scroll', () => {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', (e) => {
            if (!e.target.closest('.nav-container')) {
                navLinks.classList.remove('active');
                const icon = mobileMenuBtn.querySelector('i');
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
        });
    </script>
    @yield('scripts')
</body>
</html>