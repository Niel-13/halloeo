@extends('layout')

@section('title', 'HalloEO - Dekorasi & Maskot Styrofoam Profesional')

@section('styles')
<style>
    /* Hero Section - Background Gambar */
    .hero {
        min-height: 90vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(rgba(44, 62, 80, 0.7), rgba(44, 62, 80, 0.8)), url('{{ asset("images/bg-home.jpeg") }}') center/cover no-repeat;
        position: relative;
        overflow: hidden;
    }

    .hero::before {
        content: '';
        position: absolute;
        width: 600px;
        height: 600px;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 50%;
        top: -200px;
        right: -200px;
        animation: pulse 8s ease-in-out infinite;
    }

    @keyframes pulse {
        0%, 100% { transform: scale(1); opacity: 0.5; }
        50% { transform: scale(1.2); opacity: 0.3; }
    }

    .hero-content {
        max-width: 1400px;
        margin: 0 auto;
        padding: 2rem;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 4rem;
        align-items: center;
        position: relative;
        z-index: 1;
    }

    .hero-text h1 {
        font-family: 'Playfair Display', sans-serif;
        font-size: 4rem;
        font-weight: 700;
        color: var(--white);
        margin-bottom: 1.5rem;
        line-height: 1.2;
        text-shadow: 2px 2px 20px rgba(0, 0, 0, 0.3);
        animation: slideInLeft 1s ease-out;
    }

    @keyframes slideInLeft {
        from { opacity: 0; transform: translateX(-50px); }
        to { opacity: 1; transform: translateX(0); }
    }

    .hero-text p {
        font-size: 1.3rem;
        color: var(--white);
        margin-bottom: 2rem;
        line-height: 1.8;
        opacity: 0.95;
        animation: slideInLeft 1s ease-out 0.2s backwards;
    }

    .hero-buttons {
        display: flex;
        gap: 1.5rem;
        flex-wrap: wrap;
        animation: slideInLeft 1s ease-out 0.4s backwards;
    }

    .btn {
        padding: 1rem 2.5rem;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 600;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        display: inline-block;
        cursor: pointer;
        border: none;
    }

    .btn-primary {
        background: var(--white);
        color: var(--deep-blue);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
    }

    .btn-outline {
        background: transparent;
        color: var(--white);
        border: 2px solid var(--white);
    }

    .btn-outline:hover {
        background: var(--white);
        color: var(--deep-blue);
        transform: translateY(-3px);
    }

    .hero-image {
        position: relative;
        animation: slideInRight 1s ease-out;
    }

    @keyframes slideInRight {
        from { opacity: 0; transform: translateX(50px); }
        to { opacity: 1; transform: translateX(0); }
    }

    .hero-image-container {
        position: relative;
        width: 100%;
        height: 500px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .floating-img {
        width: 90%;
        height: 90%;
        object-fit: contain;
        filter: drop-shadow(0 20px 40px rgba(0, 0, 0, 0.2));
        animation: float 6s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-20px); }
    }

    /* Features Section */
    .features {
        padding: 6rem 2rem;
        background: var(--white);
    }

    .section-title {
        text-align: center;
        margin-bottom: 4rem;
    }

    .section-title h2 {
        font-family: 'Playfair Display', sans-serif;
        font-size: 3rem;
        color: var(--dark);
        margin-bottom: 1rem;
    }

    .section-title p {
        font-size: 1.2rem;
        color: var(--dark);
        opacity: 0.7;
    }

    .features-grid {
        max-width: 1400px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2.5rem;
    }

    .feature-card {
        background: linear-gradient(135deg, var(--pastel-blue), var(--pastel-green));
        padding: 2.5rem;
        border-radius: 30px;
        text-align: center;
        transition: all 0.4s ease;
        position: relative;
        overflow: hidden;
    }

    .feature-card::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.2), transparent);
        opacity: 0;
        transition: opacity 0.4s ease;
    }

    .feature-card:hover::before { opacity: 1; }
    .feature-card:hover { transform: translateY(-10px); box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15); }

    .feature-icon {
        font-size: 4rem;
        color: var(--white);
        margin-bottom: 1.5rem;
        display: inline-block;
        transition: transform 0.4s ease;
    }

    .feature-card:hover .feature-icon { transform: rotateY(360deg); }

    .feature-card h3 {
        font-family: 'Playfair Display', sans-serif;
        font-size: 1.8rem;
        color: var(--white);
        margin-bottom: 1rem;
    }

    .feature-card p {
        color: var(--white);
        opacity: 0.95;
        line-height: 1.8;
        font-size: 1.05rem;
    }

    /* Portfolio Section */
    .portfolio-section {
        padding: 6rem 2rem;
        background: var(--light);
    }

    .portfolio-grid {
        max-width: 1400px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 2rem;
    }

    .portfolio-card {
        background: var(--white);
        border-radius: 25px;
        overflow: hidden;
        transition: all 0.4s ease;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .portfolio-card:hover { transform: translateY(-10px); box-shadow: 0 20px 50px rgba(0, 0, 0, 0.2); }

    .portfolio-img {
        width: 100%;
        height: 300px;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .portfolio-card:hover .portfolio-img { transform: scale(1.1); }

    .portfolio-info { padding: 2rem; }

    .portfolio-category {
        display: inline-block;
        background: linear-gradient(135deg, var(--pastel-blue), var(--pastel-green));
        color: var(--white);
        padding: 0.5rem 1.5rem;
        border-radius: 20px;
        font-size: 0.9rem;
        font-weight: 600;
        margin-bottom: 1rem;
    }

    .portfolio-info h3 {
        font-family: 'Playfair Display', sans-serif;
        font-size: 1.6rem;
        color: var(--dark);
        margin-bottom: 0.8rem;
    }

    .portfolio-info p { color: var(--dark); opacity: 0.7; line-height: 1.6; }

    .portfolio-item {
        background: var(--white);
        border-radius: 25px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        transition: all 0.4s ease;
        cursor: pointer;
        animation: fadeInScale 0.6s ease-out backwards;
    }

    .gallery-section {
        padding: 6rem 2rem;
        background: var(--white);
    }

    .gallery-wrapper {
        position: relative;
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 4rem; 
    }


    .gallery-grid {
        width: 100%; 
        display: flex !important;
        flex-wrap: nowrap !important;
        overflow-x: auto;
        gap: 1.5rem;
        padding: 1rem 0 2rem 0;
        scroll-behavior: smooth;
        -ms-overflow-style: none;
        scrollbar-width: none;
        align-items: center; 
    }
    
    .gallery-grid::-webkit-scrollbar {
        display: none;
    }

    .gallery-item {
        position: relative;
        border-radius: 20px;
        overflow: hidden;
        cursor: pointer;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        width: 280px !important; 
        height: 280px !important;
        flex: 0 0 280px !important; 
    }

    .gallery-btn {
        position: absolute;
        top: 45%; 
        transform: translateY(-50%);
        background: var(--white);
        color: var(--pastel-blue);
        border: none;
        width: 55px;
        height: 55px;
        border-radius: 50%;
        font-size: 1.5rem;
        cursor: pointer;
        box-shadow: 0 5px 20px rgba(0,0,0,0.15);
        z-index: 10;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .prev-btn { left: 10px; }
    .next-btn { right: 10px; }

    .gallery-btn:hover {
        background: linear-gradient(135deg, var(--pastel-blue), var(--pastel-green));
        color: var(--white);
        transform: translateY(-50%) scale(1.1);
    }

    .prev-btn { left: 0; }
    .next-btn { right: 0; }
    
    @media (max-width: 768px) {
        .gallery-btn { display: none; }
        .gallery-wrapper { padding: 0 1rem; }
    }

    .gallery-item img, 
    .gallery-item video {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .gallery-item:hover img, 
    .gallery-item:hover video {
        transform: scale(1.1);
    }

    .gallery-overlay {
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: rgba(0,0,0,0.3);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .gallery-item:hover .gallery-overlay {
        opacity: 1;
    }

    .play-icon {
        font-size: 4rem;
        color: white;
        filter: drop-shadow(0 2px 10px rgba(0,0,0,0.3));
    }

    /* Lightbox Modal CSS */
    .lightbox {
        display: none;
        position: fixed;
        z-index: 9999;
        top: 0; left: 0; width: 100%; height: 100%;
        background: rgba(0, 0, 0, 0.9);
        align-items: center;
        justify-content: center;
        padding: 2rem;
    }

    .lightbox.active { display: flex; animation: fadeIn 0.3s ease; }

    .lightbox-content-wrapper {
        position: relative;
        max-width: 900px;
        width: 100%;
        display: flex;
        justify-content: center;
    }

    .lightbox-content-wrapper img, 
    .lightbox-content-wrapper video {
        max-width: 100%;
        max-height: 85vh;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.5);
    }

    .lightbox-close {
        position: absolute;
        top: -40px;
        right: 0;
        color: white;
        font-size: 2.5rem;
        cursor: pointer;
        transition: color 0.3s;
    }

    .lightbox-close:hover { color: var(--pastel-blue); }

    @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }


    .testimonials {
        background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
        padding: 5rem 0 6rem 0; 
        position: relative;
        overflow: hidden; 
    }

    .testimonials .section-title {
        padding: 0 2rem; 
    }

    .testimonials .section-title h2,
    .testimonials .section-title p {
        color: var(--dark); 
    }

    .testimonials-scroll-wrapper {
        display: flex;
        gap: 2rem;
        padding: 1rem 2rem 3rem 2rem; 
        overflow-x: auto;
        overflow-y: hidden; 
        scroll-snap-type: x mandatory; 
        scroll-behavior: smooth;
        -ms-overflow-style: none; 
        scrollbar-width: none;
        animation: slideInCards 1.5s ease-out;
    }


    .testimonials-scroll-wrapper::-webkit-scrollbar {
        display: none;
    }

    @keyframes slideInCards {
        from { transform: translateX(50px); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }

    .testimonial-card {
        flex: 0 0 auto; 
        width: 350px;
        scroll-snap-align: center; 
        background: var(--white);
        padding: 2.5rem;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        position: relative;
        display: flex;
        flex-direction: column; 
        transition: transform 0.4s ease, box-shadow 0.4s ease;
        margin-top: 15px; 
    }

    .testimonial-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.1);
    }

    .testimonial-card::before {
        content: '\201C'; 
        position: absolute;
        top: -20px;
        right: 25px;
        font-size: 6rem;
        line-height: 1;
        font-family: var(--font-heading);
        color: var(--primary);
        opacity: 0.2;
    }

    .testimonial-header {
        display: flex;
        align-items: center;
        gap: 1.2rem;
        margin-bottom: 1.5rem;
        position: relative;
        z-index: 2;
    }

    .testimonial-avatar {
        width: 60px;
        height: 60px;
        flex-shrink: 0; 
        border-radius: 50%;
        background: var(--pastel-blue);
        color: var(--white);
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 1.5rem;
    }

    .testimonial-info h4 {
        font-family: var(--font-heading);
        font-size: 1.2rem;
        margin-bottom: 0.2rem;
        color: var(--dark);
    }

    .testimonial-info p {
        font-size: 0.9rem;
        color: rgba(44, 62, 80, 0.6);
        margin: 0;
    }

    .stars {
        color: #FFB800;
        font-size: 1rem;
        margin-bottom: 1.2rem;
    }

    .testimonial-message {
        color: var(--dark);
        line-height: 1.6;
        font-size: 1rem;
        opacity: 0.8;
        display: -webkit-box;
        -webkit-line-clamp: 3; 
        -webkit-box-orient: vertical;
        overflow: hidden;
        margin-bottom: 1rem; 
        flex-grow: 1;
    }


    .read-more-toggle {
        display: none; 
    }

    .read-more-label {
        font-size: 0.9rem;
        font-weight: 600;
        color: var(--pastel-blue);
        cursor: pointer;
        display: inline-block;
        transition: color 0.3s ease;
        align-self: flex-start; 
    }

    .read-more-label:hover {
        color: var(--accent);
    }


    .read-more-toggle:checked ~ .testimonial-message {
        -webkit-line-clamp: unset;
    }


    .read-more-toggle:checked ~ .read-more-label::after {
        content: 'Tutup';
    }
    .read-more-label::after {
        content: 'Baca selengkapnya';
    }

    /* Media Query Khusus Testimonial Tablet/Mobile */
    @media (max-width: 768px) {
        .testimonials-scroll-wrapper {
            padding: 1rem 1rem 3rem 1rem;
            gap: 1.5rem;
            scroll-snap-type: x mandatory;
        }
        .testimonial-card {
            width: 85vw; /* Lebar card mengambil 85% layar di HP, jadi kartu sebelahnya 'ngintip' sedikit */
            max-width: 320px; /* Tapi tidak lebih dari 320px */
            padding: 2rem;
            scroll-snap-align: center;
        }
    }

    /* Testimonial Form Section */
    .testimonial-form-section {
        padding: 6rem 2rem;
        background: var(--white);
    }

    .form-container {
        max-width: 800px;
        margin: 0 auto;
        background: linear-gradient(135deg, var(--pastel-blue), var(--pastel-green));
        padding: 3rem;
        border-radius: 30px;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
    }

    .form-group {
        margin-bottom: 2rem;
    }

    .form-group label {
        display: block;
        color: var(--white);
        font-weight: 600;
        margin-bottom: 0.8rem;
        font-size: 1.1rem;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 1rem 1.5rem;
        border: none;
        border-radius: 15px;
        font-size: 1rem;
        font-family: 'Outfit', sans-serif;
        background: rgba(255, 255, 255, 0.9);
        transition: all 0.3s ease;
    }

    .form-group input:focus,
    .form-group textarea:focus {
        outline: none;
        background: var(--white);
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    }

    .form-group textarea {
        resize: vertical;
        min-height: 150px;
    }

    .rating-input {
        display: flex;
        gap: 0.5rem;
    }

    .rating-input input[type="radio"] {
        display: none;
    }

    .rating-input label {
        font-size: 2rem;
        color: rgba(255, 255, 255, 0.4);
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .rating-input input[type="radio"]:checked ~ label,
    .rating-input label:hover,
    .rating-input label:hover ~ label {
        color: #FFD700;
        transform: scale(1.2);
    }

    .btn-submit {
        width: 100%;
        padding: 1.2rem;
        background: var(--white);
        color: var(--deep-blue);
        border: none;
        border-radius: 15px;
        font-size: 1.2rem;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s ease;
        font-family: 'Playfair Display', sans-serif;
    }

    .btn-submit:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    .alert {
        padding: 1.5rem;
        border-radius: 15px;
        margin-bottom: 2rem;
        background: rgba(255, 255, 255, 0.9);
        color: var(--dark);
        font-weight: 500;
    }

    /* CTA Section */
    .cta-section {
        padding: 6rem 2rem;
        background: linear-gradient(135deg, var(--dark-pastel-red), var(--pastel-blue));
        text-align: center;
        color: var(--white);
    }

    .cta-section h2 {
        font-family: 'Playfair Display', sans-serif;
        font-size: 3rem;
        margin-bottom: 1.5rem;
    }

    .cta-section p {
        font-size: 1.3rem;
        margin-bottom: 2.5rem;
        opacity: 0.95;
    }

    @media (max-width: 768px) {
        /* Hero Section - Dibuat lebih padat dan tombol responsif */
        .hero { min-height: auto; padding-top: 6rem; padding-bottom: 3rem; }
        .hero-content { grid-template-columns: 1fr; text-align: center; gap: 2rem; padding: 1rem; }
        .hero-text h1 { font-size: 2.2rem; margin-bottom: 1rem; }
        .hero-text p { font-size: 1.05rem; margin-bottom: 1.5rem; }
        .hero-buttons { flex-direction: column; width: 100%; gap: 1rem; }
        .hero-buttons .btn { width: 100%; justify-content: center; }
        .hero-image-container { height: 280px; }

        /* General Sections - Mengurangi padding raksasa menjadi ramah jempol */
        .features, .portfolio-section, .gallery-section, .testimonials, .testimonial-form-section, .cta-section {
            padding: 3rem 1.2rem; 
        }
        .section-title { margin-bottom: 2rem; }
        .section-title h2 { font-size: 1.8rem; }
        .section-title p { font-size: 1rem; }

        /* Grids & Cards - Jarak antar elemen diperkecil */
        .features-grid, .portfolio-grid, .testimonials-grid { 
            grid-template-columns: 1fr; 
            gap: 1.2rem; 
        }
        .feature-card, .testimonial-card, .portfolio-info { padding: 1.5rem; }
        .feature-card h3, .portfolio-info h3 { font-size: 1.3rem; }
        
        /* Gallery (Swipeable UX Hint) */
        .gallery-wrapper { padding: 0; }
        .gallery-btn { display: none; } /* Sembunyikan panah, paksa user swipe natural */
        .gallery-grid { padding: 0.5rem 1rem; gap: 1rem; }
        .gallery-item { 
            /* Lebar 240px memastikan gambar sebelahnya "ngintip" sedikit sebagai kode untuk di-swipe */
            width: 240px !important; 
            height: 240px !important; 
            flex: 0 0 240px !important; 
        }

        /* Form Testimoni - Mencegah form terlihat sesak di layar kecil */
        .form-container { padding: 1.5rem; border-radius: 20px; }
        .form-group label { font-size: 0.95rem; }
        .form-group input, .form-group textarea { padding: 0.8rem 1.2rem; font-size: 0.95rem; }
        .rating-input label { font-size: 1.5rem; } /* Bintang sedikit diperkecil */
        .btn-submit { font-size: 1.1rem; padding: 1rem; }
        
        /* CTA Section */
        .cta-section h2 { font-size: 1.8rem; }
        .cta-section p { font-size: 1.05rem; margin-bottom: 1.5rem; }
    }
</style>
@endsection

@section('content')
<section class="hero">
    <div class="hero-content">
        <div class="hero-text">
            <h1>Wujudkan Dekorasi Impian Anda!</h1>
            <p>HalloEO adalah spesialis pembuatan dekorasi dan maskot dari styrofoam yang profesional, kreatif, dan berkualitas tinggi untuk berbagai kebutuhan event Anda.</p>
            <div class="hero-buttons">
                <a href="{{ route('portfolio.index') }}" class="btn btn-primary">
                    <i class="fas fa-images"></i> Lihat Portofolio
                </a>
                <a href="{{ route('contact') }}" class="btn btn-outline">
                    <i class="fas fa-phone"></i> Hubungi Kami
                </a>
            </div>
        </div>
        <div class="hero-image">
            <div class="hero-image-container">
                <svg class="floating-img" viewBox="0 0 400 400" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" style="stop-color:#A8D8EA;stop-opacity:1" />
                            <stop offset="100%" style="stop-color:#B8E0D2;stop-opacity:1" />
                        </linearGradient>
                    </defs>
                    <rect x="50" y="100" width="120" height="200" rx="20" fill="url(#grad1)" opacity="0.8"/>
                    <circle cx="230" cy="150" r="80" fill="#D88A8A" opacity="0.7"/>
                    <polygon points="280,250 350,300 280,350 210,300" fill="#A8D8EA" opacity="0.6"/>
                    <rect x="100" y="50" width="80" height="80" rx="40" fill="#B8E0D2" opacity="0.5"/>
                </svg>
            </div>
        </div>
    </div>
</section>

<section class="features">
    <div class="section-title">
        <h2>Mengapa Memilih Kami?</h2>
        <p>Keunggulan layanan kami untuk proyek dekorasi Anda</p>
    </div>
    <div class="features-grid">
        <div class="feature-card">
            <i class="fas fa-lightbulb feature-icon"></i>
            <h3>Desain Kreatif</h3>
            <p>Tim desainer berpengalaman siap mewujudkan ide kreatif Anda menjadi karya nyata yang memukau</p>
        </div>
        <div class="feature-card">
            <i class="fas fa-star feature-icon"></i>
            <h3>Kualitas Premium</h3>
            <p>Menggunakan bahan styrofoam berkualitas tinggi dengan finishing yang rapi dan detail sempurna</p>
        </div>
        <div class="feature-card">
            <i class="fas fa-clock feature-icon"></i>
            <h3>Pengerjaan Cepat</h3>
            <p>Proses produksi yang efisien tanpa mengorbankan kualitas, tepat waktu untuk event Anda</p>
        </div>
        <div class="feature-card">
            <i class="fas fa-hand-holding-usd feature-icon"></i>
            <h3>Harga Kompetitif</h3>
            <p>Harga terjangkau dengan kualitas terbaik, tersedia berbagai paket sesuai budget Anda</p>
        </div>
    </div>
</section>

<section class="portfolio-section">
    <div class="section-title">
        <h2>Portofolio Kami</h2>
        <p>Lihat hasil karya terbaik kami</p>
    </div>
    <div class="portfolio-grid">
    @forelse($featuredPortfolios ?? [] as $portfolio)
    <div class="portfolio-card" onclick="window.location='{{ route('portfolio.show', $portfolio->id) }}'" style="cursor: pointer;">
        <img src="{{ asset($portfolio->image_path) }}" alt="{{ $portfolio->title }}" class="portfolio-img" onerror="this.src='https://via.placeholder.com/400x300/A8D8EA/FFFFFF?text=HalloEO'">
        
        <div class="portfolio-info">
            <span class="portfolio-category">{{ ucfirst($portfolio->category) }}</span>
            <h3>{{ $portfolio->title }}</h3>
            <p>{{ Str::limit($portfolio->description, 100) }}</p>
        </div>
    </div>
    @empty
    <div class="portfolio-card">
        <img src="https://via.placeholder.com/400x300/A8D8EA/FFFFFF?text=Dekorasi+Pernikahan" alt="Sample" class="portfolio-img">
        <div class="portfolio-info">
            <span class="portfolio-category">Dekorasi</span>
            <h3>Dekorasi Pernikahan Elegant</h3>
            <p>Dekorasi pernikahan dengan tema elegant dan modern menggunakan styrofoam berkualitas premium</p>
        </div>
    </div>
    @endforelse
    </div>
    <div style="text-align: center; margin-top: 3rem;">
        <a href="{{ route('portfolio.index') }}" class="btn btn-primary" style="background: linear-gradient(135deg, var(--pastel-blue), var(--pastel-green)); color: white;">
            <i class="fas fa-arrow-right"></i> Lihat Semua Portofolio
        </a>
    </div>
</section>

<section class="gallery-section">
    <div class="section-title">
        <h2>Galeri HalloEO</h2>
        <p>Momen dan proses kreatif di balik layar HalloEO</p>
    </div>
    
    <div class="gallery-wrapper">
        <button class="gallery-btn prev-btn" onclick="slideGallery(-1)">
            <i class="fas fa-chevron-left"></i>
        </button>

        <div class="gallery-grid" id="galleryGrid">
            @forelse($galleries ?? [] as $gallery)
                <div class="gallery-item" onclick="openLightbox('{{ asset($gallery->file_path) }}', '{{ $gallery->type }}')">
                    @if($gallery->type == 'video')
                        <video src="{{ asset($gallery->file_path) }}" muted loop playsinline></video>
                        <div class="gallery-overlay">
                            <i class="fas fa-play-circle play-icon"></i>
                        </div>
                    @else
                        <img src="{{ asset($gallery->file_path) }}" alt="Galeri HalloEO">
                        <div class="gallery-overlay">
                            <i class="fas fa-expand play-icon" style="font-size: 2.5rem;"></i>
                        </div>
                    @endif
                </div>
            @empty
                <div style="text-align: center; width: 100%; padding: 2rem;">
                    <p>Galeri masih kosong.</p>
                </div>
            @endforelse
        </div>

        <button class="gallery-btn next-btn" onclick="slideGallery(1)">
            <i class="fas fa-chevron-right"></i>
        </button>
    </div>
</section>

<div class="lightbox" id="lightbox">
    <div class="lightbox-content-wrapper">
        <span class="lightbox-close" onclick="closeLightbox()">&times;</span>
        <div id="lightbox-container"></div>
    </div>
</div>

<section class="testimonials">
    <div class="section-title">
        <h2 style="color: black;">Kata Mereka Tentang Kami</h2>
        <p style="color: black;">Testimoni dari klien yang puas dengan layanan kami</p>
    </div>
    <div class="testimonials-scroll-wrapper">
    @forelse($testimonials as $index => $testimonial)
    <div class="testimonial-card">
        <div class="testimonial-header">
            <div class="testimonial-avatar">
                {{ strtoupper(substr($testimonial->name, 0, 1)) }}
            </div>
            <div class="testimonial-info">
                <h4>{{ $testimonial->name }}</h4>
                <p>{{ $testimonial->company ?? 'Klien HalloEO' }}</p>
            </div>
        </div>
        
        <div class="stars">
            @for($i = 0; $i < $testimonial->rating; $i++)
                <i class="fas fa-star"></i>
            @endfor
        </div>

        <input type="checkbox" class="read-more-toggle" id="read-more-{{ $index }}">
        
        <p class="testimonial-message">{{ $testimonial->message }}</p>
        
        @if(strlen($testimonial->message) > 120) {{-- Opsional: Hanya muncul jika pesan panjang --}}
            <label for="read-more-{{ $index }}" class="read-more-label"></label>
        @endif
    </div>
    @empty
    @endforelse
</div>
</section>

<section class="testimonial-form-section">
    <div class="section-title">
        <h2>Berikan Testimoni Anda</h2>
        <p>Bagikan pengalaman Anda menggunakan layanan kami</p>
    </div>
    <div class="form-container">
        @if(session('success'))
        <div class="alert">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
        @endif

        <form action="{{ route('testimonial.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nama Lengkap *</label>
                <input type="text" id="name" name="name" required placeholder="Masukkan nama Anda">
                @error('name')
                    <span style="color: #D88A8A; font-size: 0.9rem;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="company">Perusahaan/Instansi (Opsional)</label>
                <input type="text" id="company" name="company" placeholder="Masukkan nama perusahaan">
            </div>

            <div class="form-group">
                <label>Rating *</label>
                <div class="rating-input">
                    <input type="radio" name="rating" id="star5" value="5" required>
                    <label for="star5"><i class="fas fa-star"></i></label>
                    <input type="radio" name="rating" id="star4" value="4">
                    <label for="star4"><i class="fas fa-star"></i></label>
                    <input type="radio" name="rating" id="star3" value="3">
                    <label for="star3"><i class="fas fa-star"></i></label>
                    <input type="radio" name="rating" id="star2" value="2">
                    <label for="star2"><i class="fas fa-star"></i></label>
                    <input type="radio" name="rating" id="star1" value="1">
                    <label for="star1"><i class="fas fa-star"></i></label>
                </div>
            </div>

            <div class="form-group">
                <label for="message">Testimoni Anda *</label>
                <textarea id="message" name="message" required placeholder="Ceritakan pengalaman Anda..."></textarea>
                @error('message')
                    <span style="color: #D88A8A; font-size: 0.9rem;">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn-submit">
                <i class="fas fa-paper-plane"></i> Kirim Testimoni
            </button>
        </form>
    </div>
</section>

<section class="cta-section">
    <h2>Siap Mewujudkan Proyek Anda?</h2>
    <p>Hubungi kami sekarang untuk konsultasi gratis dan penawaran terbaik!</p>
    <a href="{{ route('contact') }}" class="btn btn-primary">
        <i class="fas fa-comments"></i> Mulai Konsultasi
    </a>
</section>
@endsection

@section('scripts')
<script>
    // Rating stars interaction
    const ratingInputs = document.querySelectorAll('.rating-input input[type="radio"]');
    const ratingLabels = document.querySelectorAll('.rating-input label');

    ratingLabels.forEach((label, index) => {
        label.addEventListener('click', () => {
            ratingInputs[index].checked = true;
        });
    });

    const lightbox = document.getElementById('lightbox');
    const lightboxContainer = document.getElementById('lightbox-container');

    function openLightbox(src, type) {
        lightbox.classList.add('active');
        
        if(type === 'video') {
            lightboxContainer.innerHTML = `<video src="${src}" controls autoplay style="width: 100%; max-height: 85vh; border-radius: 10px;"></video>`;
        } else {
            lightboxContainer.innerHTML = `<img src="${src}" style="width: 100%; max-height: 85vh; border-radius: 10px; object-fit: contain;">`;
        }
        
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox() {
        lightbox.classList.remove('active');
        lightboxContainer.innerHTML = ''; 
        document.body.style.overflow = 'auto';
    }

    function slideGallery(direction) {
        const container = document.getElementById('galleryGrid');
        const scrollAmount = 320; 
        
        container.scrollLeft += direction * scrollAmount;
    }

    lightbox.addEventListener('click', (e) => {
        if(e.target === lightbox || e.target.classList.contains('lightbox-content-wrapper')) {
            closeLightbox();
        }
    });

    document.addEventListener('keydown', (e) => {
        if(e.key === "Escape" && lightbox.classList.contains('active')) {
            closeLightbox();
        }
    });
</script>
@endsection