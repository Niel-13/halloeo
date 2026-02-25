@extends('layout')

@section('title', 'HalloEO - Dekorasi & Maskot Styrofoam Profesional')

@section('styles')
<style>
    /* Hero Section */
    .hero {
        min-height: 90vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, var(--pastel-blue) 0%, var(--pastel-green) 50%, var(--dark-pastel-red) 100%);
        position: relative;
        overflow: hidden;
    }

    .hero::before {
        content: '';
        position: absolute;
        width: 600px;
        height: 600px;
        background: rgba(255, 255, 255, 0.1);
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
        font-family: 'Fredoka', sans-serif;
        font-size: 4rem;
        font-weight: 700;
        color: var(--white);
        margin-bottom: 1.5rem;
        line-height: 1.2;
        text-shadow: 2px 2px 20px rgba(0, 0, 0, 0.1);
        animation: slideInLeft 1s ease-out;
    }

    @keyframes slideInLeft {
        from {
            opacity: 0;
            transform: translateX(-50px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
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
        from {
            opacity: 0;
            transform: translateX(50px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
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
        font-family: 'Fredoka', sans-serif;
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

    .feature-card:hover::before {
        opacity: 1;
    }

    .feature-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
    }

    .feature-icon {
        font-size: 4rem;
        color: var(--white);
        margin-bottom: 1.5rem;
        display: inline-block;
        transition: transform 0.4s ease;
    }

    .feature-card:hover .feature-icon {
        transform: rotateY(360deg);
    }

    .feature-card h3 {
        font-family: 'Fredoka', sans-serif;
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

    .portfolio-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.2);
    }

    .portfolio-img {
        width: 100%;
        height: 300px;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .portfolio-card:hover .portfolio-img {
        transform: scale(1.1);
    }

    .portfolio-info {
        padding: 2rem;
    }

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
        font-family: 'Fredoka', sans-serif;
        font-size: 1.6rem;
        color: var(--dark);
        margin-bottom: 0.8rem;
    }

    .portfolio-info p {
        color: var(--dark);
        opacity: 0.7;
        line-height: 1.6;
    }

    /* Testimonials Section */
    .testimonials {
        padding: 6rem 2rem;
        background: linear-gradient(135deg, var(--pastel-blue) 0%, var(--pastel-green) 100%);
        position: relative;
    }

    .testimonials-grid {
        max-width: 1400px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 2rem;
    }

    .testimonial-card {
        background: var(--white);
        padding: 2.5rem;
        border-radius: 25px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        transition: all 0.4s ease;
        position: relative;
    }

    .testimonial-card::before {
        content: '"';
        position: absolute;
        top: -20px;
        left: 30px;
        font-size: 8rem;
        font-family: 'Fredoka', sans-serif;
        color: var(--pastel-blue);
        opacity: 0.2;
        line-height: 1;
    }

    .testimonial-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 50px rgba(0, 0, 0, 0.15);
    }

    .testimonial-header {
        display: flex;
        align-items: center;
        gap: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .testimonial-avatar {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--pastel-blue), var(--pastel-green));
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        color: var(--white);
        font-weight: 600;
    }

    .testimonial-info h4 {
        font-family: 'Fredoka', sans-serif;
        font-size: 1.3rem;
        color: var(--dark);
        margin-bottom: 0.3rem;
    }

    .testimonial-info p {
        color: var(--dark);
        opacity: 0.6;
        font-size: 0.95rem;
    }

    .stars {
        color: #FFD700;
        font-size: 1.2rem;
        margin-bottom: 1rem;
    }

    .testimonial-message {
        color: var(--dark);
        line-height: 1.8;
        font-size: 1.05rem;
        opacity: 0.8;
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
        font-family: 'Fredoka', sans-serif;
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
        font-family: 'Fredoka', sans-serif;
        font-size: 3rem;
        margin-bottom: 1.5rem;
    }

    .cta-section p {
        font-size: 1.3rem;
        margin-bottom: 2.5rem;
        opacity: 0.95;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .hero-content {
            grid-template-columns: 1fr;
            text-align: center;
        }

        .hero-text h1 {
            font-size: 2.5rem;
        }

        .hero-buttons {
            justify-content: center;
        }

        .hero-image-container {
            height: 350px;
        }

        .section-title h2 {
            font-size: 2rem;
        }

        .portfolio-grid,
        .testimonials-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection

@section('content')
<!-- Hero Section -->
<section class="hero">
    <div class="hero-content">
        <div class="hero-text">
            <h1>Wujudkan Dekorasi Impian Anda!</h1>
            <p>HalloEO adalah spesialis pembuatan dekorasi dan maskot dari styrofoam yang profesional, kreatif, dan berkualitas tinggi untuk berbagai kebutuhan event Anda.</p>
            <div class="hero-buttons">
                <a href="{{ route('portfolio.index') }}" class="btn btn-primary">
                    </i> Lihat Portofolio
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

<!-- Features Section -->
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

<!-- Portfolio Section -->
<section class="portfolio-section">
    <div class="section-title">
        <h2>Portofolio Kami</h2>
        <p>Lihat hasil karya terbaik kami</p>
    </div>
    <div class="portfolio-grid">
        @forelse($featuredPortfolios as $portfolio)
        <div class="portfolio-card">
            <img src="{{ asset('storage/' . $portfolio->image_path) }}" alt="{{ $portfolio->title }}" class="portfolio-img" onerror="this.src='https://via.placeholder.com/400x300/A8D8EA/FFFFFF?text=HalloEO'">
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

<!-- Testimonials Section -->
<section class="testimonials">
    <div class="section-title">
        <h2 style="color: white;">Kata Mereka Tentang Kami</h2>
        <p style="color: white;">Testimoni dari klien yang puas dengan layanan kami</p>
    </div>
    <div class="testimonials-grid">
        @forelse($testimonials as $testimonial)
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
            <p class="testimonial-message">{{ $testimonial->message }}</p>
        </div>
        @empty
        <div class="testimonial-card">
            <div class="testimonial-header">
                <div class="testimonial-avatar">S</div>
                <div class="testimonial-info">
                    <h4>Sarah Wijaya</h4>
                    <p>Event Organizer</p>
                </div>
            </div>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <p class="testimonial-message">Sangat puas dengan hasil dekorasi dari HalloEO! Tim yang profesional dan hasil yang memuaskan. Highly recommended!</p>
        </div>
        @endforelse
    </div>
</section>

<!-- Testimonial Form Section -->
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

<!-- CTA Section -->
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
</script>
@endsection