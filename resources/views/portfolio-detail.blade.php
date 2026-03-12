@extends('layout')

@section('title', $portfolio->title . ' - HalloEO')

@section('styles')
<style>
/* ═══════════════════════════════════════════════
   PORTFOLIO DETAIL — HalloEO
   Mengikuti design system home & portfolio index
═══════════════════════════════════════════════ */

/* ── Hero ── */
.detail-hero {
    padding: 8rem 2rem 5rem;
    background: var(--dark);
    text-align: center;
    position: relative;
    overflow: hidden;
}

.detail-hero::before {
    content: '';
    position: absolute;
    inset: 0;
    background:
        radial-gradient(ellipse 65% 70% at 15% 50%, rgba(168,216,234,.08) 0%, transparent 60%),
        radial-gradient(ellipse 55% 65% at 85% 50%, rgba(184,224,210,.07) 0%, transparent 60%);
    pointer-events: none;
}

.detail-hero::after {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--blue-deep), var(--green-deep), var(--gold));
}

.detail-hero-inner {
    position: relative;
    z-index: 1;
    max-width: 760px;
    margin: 0 auto;
}

/* Breadcrumb */
.breadcrumb {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: rgba(255,255,255,.06);
    border: 1px solid rgba(255,255,255,.1);
    border-radius: var(--r-full);
    padding: 0.45rem 1.1rem;
    font-size: 0.82rem;
    color: rgba(255,255,255,.55);
    margin-bottom: 1.5rem;
    flex-wrap: wrap;
    justify-content: center;
}

.breadcrumb a {
    color: rgba(255,255,255,.6);
    text-decoration: none;
    transition: color var(--t-base);
}

.breadcrumb a:hover { color: var(--blue); }

.breadcrumb .sep { opacity: .35; }

/* Detail category badge */
.detail-category {
    display: inline-flex;
    align-items: center;
    gap: 0.35rem;
    background: var(--blue-light);
    color: var(--blue-deep);
    padding: 0.32rem 0.9rem;
    border-radius: var(--r-full);
    font-size: 0.76rem;
    font-weight: 700;
    letter-spacing: 0.06em;
    text-transform: uppercase;
    margin-bottom: 1rem;
    animation: fade-up .7s cubic-bezier(0,0,.2,1) both;
}

.detail-title {
    font-family: var(--font-display);
    font-size: clamp(2rem, 5vw, 3.6rem);
    font-weight: 800;
    color: var(--white);
    letter-spacing: -0.025em;
    line-height: 1.15;
    margin-bottom: 1.5rem;
    animation: fade-up .7s cubic-bezier(0,0,.2,1) .1s both;
}

.detail-title em {
    font-style: normal;
    background: linear-gradient(135deg, var(--blue) 0%, var(--green) 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.detail-meta {
    display: flex;
    justify-content: center;
    gap: 1rem;
    flex-wrap: wrap;
    animation: fade-up .7s cubic-bezier(0,0,.2,1) .2s both;
}

.detail-meta-item {
    display: inline-flex;
    align-items: center;
    gap: 0.45rem;
    background: rgba(255,255,255,.07);
    border: 1px solid rgba(255,255,255,.1);
    border-radius: var(--r-full);
    padding: 0.45rem 1rem;
    font-size: 0.85rem;
    color: rgba(255,255,255,.75);
}

.detail-meta-item i { color: var(--blue); font-size: 0.8rem; }

@keyframes fade-up {
    from { opacity: 0; transform: translateY(18px); }
    to   { opacity: 1; transform: translateY(0); }
}

/* ── Container ── */
.detail-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 4rem 2rem 6rem;
}

/* ── Main image ── */
.detail-image-section { margin-bottom: 2.5rem; }

.main-image {
    width: 100%;
    aspect-ratio: 16 / 7;
    object-fit: cover;
    border-radius: var(--r-xl);
    box-shadow: var(--shadow-xl);
    display: block;
    animation: fade-up .8s cubic-bezier(0,0,.2,1) both;
}

/* ── Card base ── */
.detail-card {
    background: var(--white);
    border: 1.5px solid var(--surface-alt);
    border-radius: var(--r-xl);
    padding: 2.5rem;
    box-shadow: var(--shadow-sm);
}

/* ── Section heading ── */
.section-heading {
    font-family: var(--font-display);
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--dark);
    margin-bottom: 1.5rem;
    padding-bottom: 1rem;
    border-bottom: 2px solid var(--surface-alt);
    display: flex;
    align-items: center;
    gap: 0.6rem;
}

.section-heading i {
    color: var(--blue-deep);
    font-size: 1.1rem;
}

/* ── Description ── */
.detail-description {
    color: var(--dark-mid);
    line-height: 1.9;
    font-size: 1.05rem;
    margin-bottom: 2rem;
    opacity: .9;
}

/* ── Specs grid ── */
.detail-specs {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
    gap: 1.1rem;
}

.spec-item {
    background: var(--surface);
    border: 1.5px solid var(--surface-alt);
    padding: 1.4rem 1.2rem;
    border-radius: var(--r-lg);
    text-align: center;
    transition: transform var(--t-base), box-shadow var(--t-base), border-color var(--t-base);
}

.spec-item:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-md);
    border-color: var(--blue-light);
}

.spec-icon {
    font-size: 1.6rem;
    color: var(--blue-deep);
    margin-bottom: 0.6rem;
    display: block;
}

.spec-label {
    font-size: 0.76rem;
    font-weight: 600;
    letter-spacing: 0.06em;
    text-transform: uppercase;
    color: var(--muted);
    margin-bottom: 0.35rem;
}

.spec-value {
    font-family: var(--font-display);
    font-size: 1.05rem;
    font-weight: 700;
    color: var(--dark);
}

/* ── Share section ── */
.share-section {
    background: var(--surface);
    border: 1.5px solid var(--surface-alt);
    border-radius: var(--r-lg);
    padding: 1.5rem;
    margin-top: 2rem;
}

.share-section h4 {
    font-family: var(--font-display);
    font-size: 1rem;
    font-weight: 700;
    color: var(--dark);
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.share-section h4 i { color: var(--blue-deep); }

.share-buttons {
    display: flex;
    gap: 0.65rem;
    flex-wrap: wrap;
}

.share-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.45rem;
    padding: 0.6rem 1.2rem;
    border-radius: var(--r-full);
    text-decoration: none;
    font-weight: 600;
    font-size: 0.88rem;
    color: var(--white);
    transition: transform var(--t-base), box-shadow var(--t-base), opacity var(--t-base);
}

.share-btn:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
    opacity: .9;
    color: var(--white);
    text-decoration: none;
}

.share-btn.facebook  { background: #1877F2; }
.share-btn.twitter   { background: #1DA1F2; }
.share-btn.whatsapp  { background: #25D366; }
.share-btn.linkedin  { background: #0A66C2; }

/* ── Gallery section ── */
.gallery-section { margin-top: 2.5rem; }

.gallery-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
    gap: 1.1rem;
    margin-top: 1.5rem;
}

.gallery-item {
    position: relative;
    border-radius: var(--r-lg);
    overflow: hidden;
    aspect-ratio: 1 / 1;
    border: 1.5px solid var(--surface-alt);
    background: var(--surface);
    transition: transform var(--t-base), box-shadow var(--t-base);
    cursor: pointer;
}

.gallery-item:hover {
    transform: translateY(-4px) scale(1.02);
    box-shadow: var(--shadow-lg);
}

.gallery-media {
    width: 100%; height: 100%;
    object-fit: cover;
    display: block;
    transition: transform var(--t-slow);
}

.gallery-item:hover .gallery-media { transform: scale(1.06); }

.gallery-video-wrapper {
    width: 100%; height: 100%;
    position: relative;
}

.gallery-video-wrapper video {
    width: 100%; height: 100%;
    object-fit: cover;
}

/* ── CTA box ── */
.cta-box {
    background: var(--dark);
    border-radius: var(--r-xl);
    padding: 3rem 2.5rem;
    text-align: center;
    margin-top: 3rem;
    position: relative;
    overflow: hidden;
}

.cta-box::before {
    content: '';
    position: absolute;
    inset: 0;
    background:
        radial-gradient(ellipse 70% 80% at 20% 50%, rgba(168,216,234,.08) 0%, transparent 60%),
        radial-gradient(ellipse 60% 70% at 80% 50%, rgba(184,224,210,.07) 0%, transparent 60%);
    pointer-events: none;
}

.cta-box::after {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 3px;
    background: linear-gradient(90deg, var(--blue-deep), var(--green-deep));
}

.cta-box h3 {
    font-family: var(--font-display);
    font-size: clamp(1.6rem, 3vw, 2.2rem);
    font-weight: 800;
    color: var(--white);
    margin-bottom: 0.85rem;
    position: relative;
}

.cta-box p {
    font-size: 1.05rem;
    color: rgba(255,255,255,.6);
    margin-bottom: 2rem;
    max-width: 460px;
    margin-left: auto;
    margin-right: auto;
    line-height: 1.75;
    position: relative;
}

.cta-btns {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
    position: relative;
}

.btn-cta-primary {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.9rem 2.2rem;
    background: var(--grad-cool);
    color: var(--white);
    border-radius: var(--r-full);
    font-family: var(--font-body);
    font-weight: 700;
    font-size: 1rem;
    text-decoration: none;
    box-shadow: var(--glow-blue);
    transition: transform var(--t-base), box-shadow var(--t-base);
}

.btn-cta-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 14px 36px rgba(74,143,171,.42);
    color: var(--white);
    text-decoration: none;
}

.btn-cta-secondary {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.9rem 2.2rem;
    background: rgba(255,255,255,.07);
    color: rgba(255,255,255,.8);
    border: 1.5px solid rgba(255,255,255,.2);
    border-radius: var(--r-full);
    font-family: var(--font-body);
    font-weight: 600;
    font-size: 1rem;
    text-decoration: none;
    transition: all var(--t-base);
}

.btn-cta-secondary:hover {
    border-color: rgba(255,255,255,.5);
    color: var(--white);
    background: rgba(255,255,255,.12);
    transform: translateY(-3px);
    text-decoration: none;
}

/* ── Related projects ── */
.related-section { margin-top: 5rem; }

.related-section .section-title {
    margin-bottom: 2.5rem;
}

.related-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 1.5rem;
}

.related-card {
    background: var(--white);
    border: 1.5px solid var(--surface-alt);
    border-radius: var(--r-xl);
    overflow: hidden;
    box-shadow: var(--shadow-sm);
    text-decoration: none;
    color: inherit;
    display: flex;
    flex-direction: column;
    transition: transform var(--t-slow), box-shadow var(--t-slow), border-color var(--t-base);
}

.related-card:hover {
    transform: translateY(-7px);
    box-shadow: var(--shadow-lg);
    border-color: var(--blue-light);
    text-decoration: none;
    color: inherit;
}

.related-image-wrapper {
    aspect-ratio: 4 / 3;
    overflow: hidden;
}

.related-image {
    width: 100%; height: 100%;
    object-fit: cover;
    display: block;
    transition: transform var(--t-slow);
}

.related-card:hover .related-image { transform: scale(1.07); }

.related-info { padding: 1.4rem; flex: 1; }

.related-category {
    display: inline-flex;
    align-items: center;
    gap: 0.3rem;
    background: var(--blue-light);
    color: var(--blue-deep);
    padding: 0.25rem 0.8rem;
    border-radius: var(--r-full);
    font-size: 0.73rem;
    font-weight: 700;
    letter-spacing: 0.06em;
    text-transform: uppercase;
    margin-bottom: 0.7rem;
}

.related-title {
    font-family: var(--font-display);
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--dark);
    margin-bottom: 0.4rem;
    line-height: 1.3;
}

.related-desc {
    color: var(--muted);
    font-size: 0.88rem;
    line-height: 1.6;
    margin: 0;
}

/* ── Back button ── */
.back-wrap {
    text-align: center;
    margin-top: 4rem;
}

.btn-back {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.85rem 2rem;
    background: var(--white);
    border: 1.5px solid var(--surface-alt);
    border-radius: var(--r-full);
    color: var(--dark-mid);
    font-family: var(--font-body);
    font-weight: 600;
    font-size: 0.97rem;
    text-decoration: none;
    box-shadow: var(--shadow-sm);
    transition: all var(--t-base);
}

.btn-back:hover {
    border-color: var(--blue-mid);
    color: var(--blue-deep);
    background: var(--blue-light);
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
    text-decoration: none;
}

/* ── Responsive ── */
@media (max-width: 768px) {
    .detail-hero { padding: 6rem 1.25rem 3.5rem; }
    .detail-meta { gap: 0.6rem; }
    .detail-container { padding: 2.5rem 1.25rem 4rem; }
    .main-image { aspect-ratio: 4 / 3; border-radius: var(--r-lg); }
    .detail-card { padding: 1.5rem; }
    .gallery-grid { grid-template-columns: repeat(2, 1fr); }
    .related-grid { grid-template-columns: 1fr; }
    .cta-btns { flex-direction: column; align-items: center; }
    .btn-cta-primary, .btn-cta-secondary { width: 100%; max-width: 300px; justify-content: center; }
}
</style>
@endsection

@section('content')

{{-- ── Hero ── --}}
<section class="detail-hero">
    <div class="detail-hero-inner">

        {{-- Breadcrumb --}}
        <div class="breadcrumb">
            <a href="{{ route('home') }}"><i class="fas fa-home"></i> Home</a>
            <span class="sep">/</span>
            <a href="{{ route('portfolio.index') }}">Portofolio</a>
            <span class="sep">/</span>
            <span>{{ Str::limit($portfolio->title, 30) }}</span>
        </div>

        <span class="detail-category">
            <i class="fas fa-tag"></i> {{ ucfirst($portfolio->category) }}
        </span>

        <h1 class="detail-title">{{ $portfolio->title }}</h1>

        <div class="detail-meta">
            @if($portfolio->client_name)
            <span class="detail-meta-item">
                <i class="fas fa-user"></i> {{ $portfolio->client_name }}
            </span>
            @endif
            @if($portfolio->project_date)
            <span class="detail-meta-item">
                <i class="fas fa-calendar-alt"></i> {{ $portfolio->project_date->format('F Y') }}
            </span>
            @endif
            <span class="detail-meta-item">
                <i class="fas fa-check-circle"></i> Selesai
            </span>
        </div>

    </div>
</section>

{{-- ── Content ── --}}
<div class="detail-container">

    {{-- Main Image --}}
    <div class="detail-image-section">
        <img
            src="{{ asset($portfolio->image_path) }}"
            alt="{{ $portfolio->title }}"
            class="main-image"
            width="1200" height="525"
            onerror="this.src='https://via.placeholder.com/1200x525/A8D8EA/FFFFFF?text={{ urlencode($portfolio->title) }}'"
        >
    </div>

    {{-- Detail Info --}}
    <div class="detail-card">
        <h2 class="section-heading">
            <i class="fas fa-info-circle"></i> Detail Proyek
        </h2>

        <div class="detail-description">
            {!! nl2br(e($portfolio->description)) !!}
        </div>

        {{-- Specs --}}
        <div class="detail-specs">
            <div class="spec-item">
                <i class="fas fa-layer-group spec-icon"></i>
                <div class="spec-label">Kategori</div>
                <div class="spec-value">{{ ucfirst($portfolio->category) }}</div>
            </div>

            @if($portfolio->project_date)
            <div class="spec-item">
                <i class="fas fa-calendar-alt spec-icon"></i>
                <div class="spec-label">Tanggal</div>
                <div class="spec-value">{{ $portfolio->project_date->format('M Y') }}</div>
            </div>
            @endif

            @if($portfolio->client_name)
            <div class="spec-item">
                <i class="fas fa-building spec-icon"></i>
                <div class="spec-label">Klien</div>
                <div class="spec-value">{{ $portfolio->client_name }}</div>
            </div>
            @endif

            <div class="spec-item">
                <i class="fas fa-check-circle spec-icon"></i>
                <div class="spec-label">Status</div>
                <div class="spec-value">Selesai</div>
            </div>
        </div>

        {{-- Share --}}
        <div class="share-section">
            <h4><i class="fas fa-share-alt"></i> Bagikan Portofolio Ini</h4>
            <div class="share-buttons">
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                   target="_blank" rel="noopener" class="share-btn facebook">
                    <i class="fab fa-facebook-f"></i> Facebook
                </a>
                <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($portfolio->title) }}"
                   target="_blank" rel="noopener" class="share-btn twitter">
                    <i class="fab fa-twitter"></i> Twitter
                </a>
                <a href="https://wa.me/?text={{ urlencode($portfolio->title . ' - ' . url()->current()) }}"
                   target="_blank" rel="noopener" class="share-btn whatsapp">
                    <i class="fab fa-whatsapp"></i> WhatsApp
                </a>
                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}"
                   target="_blank" rel="noopener" class="share-btn linkedin">
                    <i class="fab fa-linkedin-in"></i> LinkedIn
                </a>
            </div>
        </div>
    </div>

    {{-- Gallery --}}
    @if(isset($portfolio->galleries) && $portfolio->galleries->count() > 0)
    <div class="detail-card gallery-section">
        <h2 class="section-heading">
            <i class="fas fa-images"></i> Galeri Proyek
        </h2>
        <div class="gallery-grid">
            @foreach($portfolio->galleries as $gallery)
            <div class="gallery-item">
                @if($gallery->type == 'video')
                    <div class="gallery-video-wrapper">
                        <video controls class="gallery-media">
                            <source src="{{ asset($gallery->file_path) }}" type="video/mp4">
                        </video>
                    </div>
                @else
                    <img
                        src="{{ asset($gallery->file_path) }}"
                        alt="Galeri {{ $portfolio->title }}"
                        class="gallery-media"
                        loading="lazy"
                    >
                @endif
            </div>
            @endforeach
        </div>
    </div>
    @endif

    {{-- CTA Box --}}
    <div class="cta-box">
        <h3>Tertarik dengan Proyek Serupa?</h3>
        <p>Hubungi kami sekarang untuk konsultasi gratis dan wujudkan proyek dekorasi impian Anda!</p>
        <div class="cta-btns">
            <a href="{{ route('contact') }}" class="btn-cta-primary">
                <i class="fas fa-phone"></i> Hubungi Kami
            </a>
            <a href="{{ route('services') }}" class="btn-cta-secondary">
                <i class="fas fa-list"></i> Lihat Layanan
            </a>
        </div>
    </div>

    {{-- Related Projects --}}
    @if(isset($relatedPortfolios) && $relatedPortfolios->count() > 0)
    <div class="related-section">
        <div class="section-title">
            <span class="section-eyebrow">Lihat Juga</span>
            <h2>Proyek Terkait</h2>
            <p>Karya lainnya dalam kategori yang sama</p>
        </div>
        <div class="related-grid">
            @foreach($relatedPortfolios as $related)
            <a href="{{ route('portfolio.show', $related->id) }}" class="related-card">
                <div class="related-image-wrapper">
                    <img
                        src="{{ asset($related->image_path) }}"
                        alt="{{ $related->title }}"
                        class="related-image"
                        loading="lazy"
                        onerror="this.src='https://via.placeholder.com/400x300/A8D8EA/FFFFFF?text={{ urlencode($related->title) }}'"
                    >
                </div>
                <div class="related-info">
                    <span class="related-category">
                        <i class="fas fa-tag"></i> {{ ucfirst($related->category) }}
                    </span>
                    <h3 class="related-title">{{ $related->title }}</h3>
                    <p class="related-desc">{{ Str::limit($related->description, 80) }}</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
    @endif

    {{-- Back button --}}
    <div class="back-wrap">
        <a href="{{ route('portfolio.index') }}" class="btn-back">
            <i class="fas fa-arrow-left"></i> Kembali ke Portofolio
        </a>
    </div>

</div>
@endsection