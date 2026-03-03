@extends('layout')

@section('title', $portfolio->title . ' - HalloEO')

@section('styles')
<style>
    .detail-hero {
        padding: 8rem 2rem 4rem;
        background: linear-gradient(135deg, var(--pastel-blue), var(--pastel-green));
        text-align: center;
        color: var(--white);
    }

    .breadcrumb {
        display: flex;
        justify-content: center;
        gap: 1rem;
        margin-bottom: 2rem;
        font-size: 1rem;
        opacity: 0.9;
    }

    .breadcrumb a {
        color: var(--white);
        text-decoration: none;
        transition: opacity 0.3s ease;
    }

    .breadcrumb a:hover {
        opacity: 0.7;
    }

    .detail-category {
        display: inline-block;
        background: rgba(255, 255, 255, 0.3);
        padding: 0.6rem 1.5rem;
        border-radius: 25px;
        font-weight: 600;
        margin-bottom: 1rem;
    }

    .detail-title {
        font-family: 'Playfair Display', sans-serif;
        font-size: 3.5rem;
        margin-bottom: 1rem;
        animation: fadeInUp 0.8s ease-out;
    }

    .detail-meta {
        display: flex;
        justify-content: center;
        gap: 2rem;
        flex-wrap: wrap;
        opacity: 0.95;
        animation: fadeInUp 0.8s ease-out 0.2s backwards;
    }

    .detail-meta span {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .detail-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 4rem 2rem;
    }

    .detail-content {
        display: grid;
        grid-template-columns: 1fr;
        gap: 3rem;
    }

    .detail-image-section {
        width: 100%;
    }

    .main-image {
        width: 100%;
        height: 600px;
        object-fit: cover;
        border-radius: 30px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        animation: fadeIn 1s ease-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    .detail-info-section {
        background: var(--white);
        padding: 3rem;
        border-radius: 30px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
    }

    .section-heading {
        font-family: 'Playfair Display', sans-serif;
        font-size: 2rem;
        color: var(--dark);
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 3px solid var(--pastel-blue);
    }


    .detail-description {
        color: var(--dark);
        line-height: 2;
        font-size: 1.15rem;
        margin-bottom: 2rem;
    }

    .detail-specs {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
        margin-top: 2rem;
    }

    .spec-item {
        background: var(--light);
        padding: 1.5rem;
        border-radius: 15px;
        text-align: center;
        transition: all 0.3s ease;
    }

    .spec-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .spec-icon {
        font-size: 2.5rem;
        background: linear-gradient(135deg, var(--pastel-blue), var(--pastel-green));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 0.5rem;
    }

    .spec-label {
        font-size: 0.9rem;
        color: var(--dark);
        opacity: 0.6;
        margin-bottom: 0.3rem;
    }

    .spec-value {
        font-family: 'Playfair Display', sans-serif;
        font-size: 1.2rem;
        color: var(--dark);
        font-weight: 600;
    }

    .cta-box {
        background: linear-gradient(135deg, var(--pastel-blue), var(--pastel-green));
        padding: 2.5rem;
        border-radius: 25px;
        text-align: center;
        margin-top: 3rem;
        color: var(--white);
    }

    .cta-box h3 {
        font-family: 'Playfair Display', sans-serif;
        font-size: 2rem;
        margin-bottom: 1rem;
    }

    .cta-box p {
        margin-bottom: 2rem;
        opacity: 0.95;
        font-size: 1.1rem;
    }

    .cta-buttons {
        display: flex;
        gap: 1rem;
        justify-content: center;
        flex-wrap: wrap;
    }

    .btn-cta {
        padding: 1rem 2.5rem;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 600;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.8rem;
    }

    .btn-cta-primary {
        background: var(--white);
        color: var(--deep-blue);
    }

    .btn-cta-secondary {
        background: transparent;
        color: var(--white);
        border: 2px solid var(--white);
    }

    .btn-cta:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    }

    .related-section {
        margin-top: 6rem;
    }

    .related-section h2 {
        font-family: 'Playfair Display', sans-serif;
        font-size: 2.5rem;
        color: var(--dark);
        text-align: center;
        margin-bottom: 3rem;
    }

    .related-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
    }

    .related-card {
        background: var(--white);
        border-radius: 25px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        transition: all 0.4s ease;
        cursor: pointer;
        text-decoration: none;
        color: inherit;
        display: block;
    }

    .related-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.2);
    }

    .related-image-wrapper {
        width: 100%;
        height: 300px; 
        overflow: hidden;
    }

    .related-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .related-card:hover .related-image {
        transform: scale(1.1);
    }

    .related-info {
        padding: 1.5rem;
    }

    .related-category {
        display: inline-block;
        background: linear-gradient(135deg, var(--pastel-blue), var(--pastel-green));
        color: var(--white);
        padding: 0.4rem 1rem;
        border-radius: 15px;
        font-size: 0.85rem;
        font-weight: 600;
        margin-bottom: 0.8rem;
    }

    .related-title {
        font-family: 'Playfair Display', sans-serif;
        font-size: 1.4rem;
        color: var(--dark);
        margin-bottom: 0.5rem;
    }

    .share-section {
        background: var(--light);
        padding: 2rem;
        border-radius: 20px;
        margin-top: 2rem;
    }

    .share-section h4 {
        font-family: 'Playfair Display', sans-serif;
        font-size: 1.3rem;
        color: var(--dark);
        margin-bottom: 1rem;
    }

    .share-buttons {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .share-btn {
        padding: 0.8rem 1.5rem;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 600;
        color: var(--white);
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
    }

    .share-btn.facebook {
        background: #1877F2;
    }

    .share-btn.twitter {
        background: #1DA1F2;
    }

    .share-btn.whatsapp {
        background: #25D366;
    }

    .share-btn.linkedin {
        background: #0A66C2;
    }

    .share-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    @media (max-width: 768px) {
        .detail-title {
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .main-image {
            height: 280px;
            border-radius: 12px; 
        }

        .detail-info-section {
            padding: 1.5rem 1.2rem;
        }

        .detail-meta {
            flex-direction: column;
            align-items: flex-start; 
            gap: 0.8rem;
        }

       
        .cta-buttons {
            flex-direction: column;
            gap: 1rem;
            margin-top: 1.5rem;
        }

        .btn-cta {
            width: 100%;
            justify-content: center;
            padding: 1rem; 
        }
    }
</style>
@endsection

@section('content')
<!-- Hero Section -->
<section class="detail-hero">
    <div class="breadcrumb">
        <a href="{{ route('home') }}"><i class="fas fa-home"></i> Home</a>
        <span>/</span>
        <a href="{{ route('portfolio.index') }}">Portofolio</a>
        <span>/</span>
        <span>{{ $portfolio->title }}</span>
    </div>
    
    <span class="detail-category">
        <i class="fas fa-tag"></i> {{ ucfirst($portfolio->category) }}
    </span>
    <h1 class="detail-title">{{ $portfolio->title }}</h1>
    
    <div class="detail-meta">
        @if($portfolio->client_name)
        <span>
            <i class="fas fa-user"></i>
            <strong>Client:</strong> {{ $portfolio->client_name }}
        </span>
        @endif
        @if($portfolio->project_date)
        <span>
            <i class="fas fa-calendar"></i>
            <strong>Date:</strong> {{ $portfolio->project_date->format('F Y') }}
        </span>
        @endif
        <span>
            <i class="fas fa-eye"></i>
            <strong>Category:</strong> {{ ucfirst($portfolio->category) }}
        </span>
    </div>
</section>

<!-- Detail Content -->
<div class="detail-container">
    <div class="detail-content">
        <!-- Main Image -->
        <div class="detail-image-section">
            <img src="{{ asset($portfolio->image_path) }}" 
                alt="{{ $portfolio->title }}" 
                class="main-image"
                onerror="this.src='https://via.placeholder.com/1200x600/A8D8EA/FFFFFF?text={{ urlencode($portfolio->title) }}'">
        </div>

        <!-- Detail Info -->
        <div class="detail-info-section">
            <h2 class="section-heading">
                <i class="fas fa-info-circle"></i> Detail Proyek
            </h2>
            
            <div class="detail-description">
                {!! nl2br(e($portfolio->description)) !!}
            </div>

            <!-- Specifications -->
            <div class="detail-specs">
                <div class="spec-item">
                    <div class="spec-icon">
                        <i class="fas fa-layer-group"></i>
                    </div>
                    <div class="spec-label">Kategori</div>
                    <div class="spec-value">{{ ucfirst($portfolio->category) }}</div>
                </div>

                @if($portfolio->project_date)
                <div class="spec-item">
                    <div class="spec-icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <div class="spec-label">Tanggal</div>
                    <div class="spec-value">{{ $portfolio->project_date->format('M Y') }}</div>
                </div>
                @endif

                @if($portfolio->client_name)
                <div class="spec-item">
                    <div class="spec-icon">
                        <i class="fas fa-building"></i>
                    </div>
                    <div class="spec-label">Klien</div>
                    <div class="spec-value">{{ $portfolio->client_name }}</div>
                </div>
                @endif

                <div class="spec-item">
                    <div class="spec-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="spec-label">Status</div>
                    <div class="spec-value">Completed</div>
                </div>
            </div>

            <!-- Share Section -->
            <div class="share-section">
                <h4><i class="fas fa-share-alt"></i> Bagikan Portfolio Ini</h4>
                <div class="share-buttons">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" 
                       target="_blank" 
                       class="share-btn facebook">
                        <i class="fab fa-facebook-f"></i> Facebook
                    </a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($portfolio->title) }}" 
                       target="_blank" 
                       class="share-btn twitter">
                        <i class="fab fa-twitter"></i> Twitter
                    </a>
                    <a href="https://wa.me/?text={{ urlencode($portfolio->title . ' - ' . url()->current()) }}" 
                       target="_blank" 
                       class="share-btn whatsapp">
                        <i class="fab fa-whatsapp"></i> WhatsApp
                    </a>
                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}" 
                       target="_blank" 
                       class="share-btn linkedin">
                        <i class="fab fa-linkedin-in"></i> LinkedIn
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Box -->
    <div class="cta-box">
        <h3><i class="fas fa-rocket"></i> Tertarik dengan Proyek Serupa?</h3>
        <p>Hubungi kami sekarang untuk konsultasi gratis dan wujudkan proyek dekorasi impian Anda!</p>
        <div class="cta-buttons">
            <a href="{{ route('contact') }}" class="btn-cta btn-cta-primary">
                <i class="fas fa-phone"></i> Hubungi Kami
            </a>
            <a href="{{ route('services') }}" class="btn-cta btn-cta-secondary">
                <i class="fas fa-list"></i> Lihat Layanan
            </a>
        </div>
    </div>

    <!-- Related Projects -->
    @if($relatedPortfolios->count() > 0)
    <div class="related-section">
        <h2><i class="fas fa-images"></i> Proyek Terkait</h2>
        <div class="related-grid">
            @foreach($relatedPortfolios as $related)
            <a href="{{ route('portfolio.show', $related->id) }}" class="related-card">
                <div class="related-image-wrapper">
                    <img src="{{ asset($related->image_path) }}"
                        alt="{{ $related->title }}"
                        class="related-image"
                        onerror="this.src='https://via.placeholder.com/400x300/A8D8EA/FFFFFF?text={{ urlencode($related->title) }}'">
                </div>
                <div class="related-info">
                    <span class="related-category">
                        <i class="fas fa-tag"></i> {{ ucfirst($related->category) }}
                    </span>
                    <h3 class="related-title">{{ $related->title }}</h3>
                    <p style="color: var(--dark); opacity: 0.7;">
                        {{ Str::limit($related->description, 80) }}
                    </p>
                </div>

            </a>
            @endforeach
        </div>
    </div>
    @endif

    <!-- Back to Portfolio Button -->
    <div style="text-align: center; margin-top: 4rem;">
        <a href="{{ route('portfolio.index') }}" class="btn btn-primary" style="background: linear-gradient(135deg, var(--pastel-blue), var(--pastel-green)); color: white; padding: 1rem 2.5rem; border-radius: 50px; text-decoration: none; display: inline-flex; align-items: center; gap: 0.8rem; font-weight: 600; transition: all 0.3s ease;">
            <i class="fas fa-arrow-left"></i> Kembali ke Portofolio
        </a>
    </div>
</div>
@endsection