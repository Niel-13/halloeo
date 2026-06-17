@extends('layout')

@section('title', $portfolio->title . ' - Portofolio HalloEO')
@section('description', Str::limit(strip_tags($portfolio->description), 155))

@push('preload')
<link rel="preload" as="image" href="{{ asset($portfolio->image_path) }}" fetchpriority="high">
@endpush

@section('styles')
<style>

/* ── Full-bleed Hero Image ── */
.detail-cover {
    width: 100%;
    height: min(760px, calc(100vh - var(--nav-h)));
    position: relative;
    overflow: hidden;
}

.detail-cover-img {
    width: 100%; height: 100%;
    object-fit: cover;
    display: block;
    transform-origin: center;
    animation: cover-zoom 12s ease-out forwards;
}

@keyframes cover-zoom {
    from { transform: scale(1.08); }
    to   { transform: scale(1.0); }
}

/* Dark gradient overlay */
.detail-cover-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(
        to bottom,
        rgba(36,59,54,.15) 0%,
        rgba(36,59,54,.10) 40%,
        rgba(36,59,54,.75) 80%,
        rgba(36,59,54,.92) 100%
    );
}

/* Top accent */
.detail-cover::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 3px;
    background: linear-gradient(90deg, var(--blue-deep), var(--green-deep), var(--gold));
    z-index: 10;
}

/* Content pinned to bottom of cover */
.detail-cover-content {
    position: absolute;
    bottom: 0; left: 0; right: 0;
    z-index: 5;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 2.5rem 3.5rem;
}

/* Breadcrumb */
.breadcrumb {
    display: inline-flex;
    align-items: center;
    gap: 0.45rem;
    font-size: 0.8rem;
    color: rgba(255,255,255,.5);
    margin-bottom: 1.25rem;
    flex-wrap: wrap;
}

.breadcrumb a {
    color: rgba(255,255,255,.6);
    text-decoration: none;
    transition: color var(--t-base);
}

.breadcrumb a:hover { color: var(--blue); }
.breadcrumb .sep { opacity: .3; }

/* Category pill */
.detail-category {
    display: inline-flex;
    align-items: center;
    gap: 0.3rem;
    background: rgba(168,216,234,.18);
    border: 1px solid rgba(168,216,234,.35);
    color: var(--blue);
    padding: 0.3rem 0.9rem;
    border-radius: var(--r-full);
    font-size: 0.73rem;
    font-weight: 700;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    margin-bottom: 0.9rem;
    animation: fade-up .6s cubic-bezier(0,0,.2,1) .1s both;
    backdrop-filter: blur(8px);
}

.detail-title {
    font-family: var(--font-display);
    font-size: clamp(2.2rem, 5.5vw, 4.5rem);
    font-weight: 800;
    color: var(--white);
    letter-spacing: -0.03em;
    line-height: 1.1;
    margin-bottom: 1.4rem;
    max-width: 820px;
    text-shadow: 0 2px 24px rgba(0,0,0,.3);
    animation: fade-up .7s cubic-bezier(0,0,.2,1) .18s both;
}

.detail-meta-row {
    display: flex;
    align-items: center;
    gap: 0.6rem;
    flex-wrap: wrap;
    animation: fade-up .7s cubic-bezier(0,0,.2,1) .26s both;
}

.detail-meta-pill {
    display: inline-flex;
    align-items: center;
    gap: 0.4rem;
    background: rgba(255,255,255,.1);
    border: 1px solid rgba(255,255,255,.15);
    backdrop-filter: blur(10px);
    border-radius: var(--r-full);
    padding: 0.4rem 1rem;
    font-size: 0.82rem;
    color: rgba(255,255,255,.8);
    white-space: nowrap;
}

.detail-meta-pill i { color: var(--blue); font-size: 0.78rem; }

.meta-divider {
    width: 3px; height: 3px;
    background: rgba(255,255,255,.25);
    border-radius: 50%;
}

@keyframes fade-up {
    from { opacity: 0; transform: translateY(18px); }
    to   { opacity: 1; transform: translateY(0); }
}

/* ── Main layout: sidebar + content ── */
.detail-layout {
    max-width: 1200px;
    margin: 0 auto;
    padding: clamp(4.75rem, 7vw, 6.25rem) clamp(1.75rem, 4vw, 2.5rem);
    display: grid;
    grid-template-columns: 1fr 320px;
    gap: clamp(1.75rem, 4vw, 2.5rem);
    align-items: start;
}

/* ── Left: main content ── */
.detail-main { min-width: 0; }

/* Description */
.detail-description-block {
    margin-bottom: 2rem;
}

.block-label {
    display: flex;
    align-items: center;
    gap: 0.6rem;
    font-size: 0.72rem;
    font-weight: 700;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: var(--muted);
    margin-bottom: 1.1rem;
}

.block-label::before {
    content: '';
    width: 24px; height: 2px;
    background: linear-gradient(90deg, var(--blue-deep), var(--green-deep));
    border-radius: 2px;
    flex-shrink: 0;
}

.detail-description {
    font-size: 1.08rem;
    color: var(--dark-mid);
    line-height: 1.95;
    opacity: .92;
}

/* ── Gallery ── */
.gallery-block { margin-bottom: 2rem; }

.gallery-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 0.75rem;
    margin-top: 1.25rem;
}

.gallery-item {
    position: relative;
    border-radius: 16px;
    overflow: hidden;
    aspect-ratio: 4 / 3;
    background: var(--surface);
    cursor: zoom-in;
    transition: transform .4s cubic-bezier(.22,.68,0,1.2),
                box-shadow .4s cubic-bezier(.22,.68,0,1.2);
}

.gallery-item.video-item { cursor: pointer; }

.gallery-item:hover {
    transform: scale(1.03);
    box-shadow: 0 16px 40px rgba(36,59,54,.18);
    z-index: 2;
}

.gallery-media {
    width: 100%; height: 100%;
    object-fit: cover;
    display: block;
    transition: transform .5s cubic-bezier(.4,0,.2,1);
}

.gallery-item:hover .gallery-media { transform: scale(1.07); }

.gallery-item-overlay {
    position: absolute;
    inset: 0;
    background: rgba(36,59,54,.45);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity .3s ease;
}

.gallery-item:hover .gallery-item-overlay { opacity: 1; }

.gallery-item-overlay i {
    font-size: 1.8rem;
    color: var(--white);
    filter: drop-shadow(0 2px 8px rgba(0,0,0,.4));
}

/* Video badge */
.video-badge {
    position: absolute;
    top: 0.65rem;
    left: 0.65rem;
    background: rgba(36,59,54,.75);
    backdrop-filter: blur(6px);
    color: var(--white);
    font-size: 0.68rem;
    font-weight: 700;
    letter-spacing: 0.07em;
    text-transform: uppercase;
    padding: 0.2rem 0.6rem;
    border-radius: 50px;
    display: flex;
    align-items: center;
    gap: 0.3rem;
}

/* ── Lightbox ── */
.lightbox-backdrop {
    position: fixed;
    inset: 0;
    background: rgba(15,20,18,.92);
    z-index: 9000;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    pointer-events: none;
    transition: opacity .3s ease;
    backdrop-filter: blur(6px);
}

.lightbox-backdrop.open {
    opacity: 1;
    pointer-events: all;
}

.lightbox-inner {
    position: relative;
    max-width: min(1100px, 94vw);
    max-height: 90vh;
    display: flex;
    align-items: center;
    justify-content: center;
}

.lightbox-media {
    max-width: 100%;
    max-height: 88vh;
    border-radius: 16px;
    object-fit: contain;
    box-shadow: 0 32px 80px rgba(0,0,0,.6);
    transform: scale(.92);
    transition: transform .35s cubic-bezier(.22,.68,0,1.2);
    display: block;
}

.lightbox-video {
    max-width: min(900px, 94vw);
    max-height: 80vh;
    border-radius: 16px;
    box-shadow: 0 32px 80px rgba(0,0,0,.6);
    transform: scale(.92);
    transition: transform .35s cubic-bezier(.22,.68,0,1.2);
    display: block;
}

.lightbox-backdrop.open .lightbox-media,
.lightbox-backdrop.open .lightbox-video {
    transform: scale(1);
}

.lightbox-close {
    position: fixed;
    top: 1.25rem;
    right: 1.25rem;
    width: 44px; height: 44px;
    background: rgba(255,255,255,.12);
    border: 1.5px solid rgba(255,255,255,.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--white);
    font-size: 1rem;
    cursor: pointer;
    transition: background .2s ease, transform .2s ease;
    backdrop-filter: blur(8px);
    z-index: 9001;
}

.lightbox-close:hover {
    background: rgba(255,255,255,.22);
    transform: rotate(90deg);
}

.lightbox-nav {
    position: fixed;
    top: 50%;
    transform: translateY(-50%);
    width: 46px; height: 46px;
    background: rgba(255,255,255,.1);
    border: 1.5px solid rgba(255,255,255,.18);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--white);
    font-size: 1rem;
    cursor: pointer;
    transition: background .2s ease, transform .3s ease;
    backdrop-filter: blur(8px);
    z-index: 9001;
}

.lightbox-nav:hover { background: rgba(255,255,255,.22); }
.lightbox-nav.prev { left: 1.25rem; }
.lightbox-nav.next { right: 1.25rem; }
.lightbox-nav.prev:hover { transform: translateY(-50%) translateX(-3px); }
.lightbox-nav.next:hover { transform: translateY(-50%) translateX(3px); }

.lightbox-counter {
    position: fixed;
    bottom: 1.5rem;
    left: 50%;
    transform: translateX(-50%);
    background: rgba(255,255,255,.12);
    border: 1px solid rgba(255,255,255,.15);
    backdrop-filter: blur(8px);
    color: rgba(255,255,255,.8);
    font-size: 0.82rem;
    font-weight: 600;
    padding: 0.35rem 1rem;
    border-radius: 50px;
    z-index: 9001;
    letter-spacing: 0.04em;
}

/* Share */
.share-block { margin-bottom: 2rem; }

.share-pills {
    display: flex;
    gap: 0.6rem;
    flex-wrap: wrap;
    margin-top: 1.1rem;
}

.share-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.4rem;
    padding: 0.55rem 1.15rem;
    border-radius: var(--r-full);
    text-decoration: none;
    font-weight: 600;
    font-size: 0.86rem;
    color: var(--white);
    transition: transform var(--t-base), box-shadow var(--t-base), opacity var(--t-base);
}

.share-btn:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
    opacity: .88;
    color: var(--white);
    text-decoration: none;
}

.share-btn.facebook { background: #1877F2; }
.share-btn.twitter  { background: #1DA1F2; }
.share-btn.whatsapp { background: #25D366; }
.share-btn.linkedin { background: #0A66C2; }

/* ── Right: sidebar ── */
.detail-sidebar { position: sticky; top: calc(72px + 2rem); }

/* Specs card */
.sidebar-card {
    background: var(--white);
    border: 1.5px solid var(--surface-alt);
    border-radius: var(--r-xl);
    overflow: hidden;
    box-shadow: var(--shadow-sm);
    margin-bottom: 1.5rem;
}

.sidebar-card-head {
    background: linear-gradient(135deg, var(--dark) 0%, #2f5149 100%);
    padding: 1.1rem 1.5rem;
    position: relative;
    overflow: hidden;
}

.sidebar-card-head::before {
    content: '';
    position: absolute;
    inset: 0;
    background: radial-gradient(ellipse 80% 100% at 0% 50%, rgba(168,216,234,.12) 0%, transparent 60%);
    pointer-events: none;
}

.sidebar-card-head h4 {
    font-family: var(--font-display);
    font-size: 1rem;
    font-weight: 700;
    color: var(--white);
    margin: 0;
    position: relative;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.sidebar-card-head h4 i { color: var(--blue); font-size: 0.9rem; }

.sidebar-card-body { padding: 0; }

.spec-row {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1rem 1.5rem;
    border-bottom: 1px solid var(--surface-alt);
    transition: background var(--t-base);
}

.spec-row:last-child { border-bottom: none; }
.spec-row:hover { background: var(--surface); }

.spec-row-icon {
    width: 36px; height: 36px;
    background: var(--blue-light);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    transition: background var(--t-base);
}

.spec-row:hover .spec-row-icon { background: var(--grad-cool); }

.spec-row-icon i {
    font-size: 0.88rem;
    color: var(--blue-deep);
    transition: color var(--t-base);
}

.spec-row:hover .spec-row-icon i { color: var(--white); }

.spec-row-text { min-width: 0; }

.spec-row-label {
    font-size: 0.72rem;
    font-weight: 700;
    letter-spacing: 0.07em;
    text-transform: uppercase;
    color: var(--muted);
    display: block;
}

.spec-row-value {
    font-family: var(--font-display);
    font-size: 0.97rem;
    font-weight: 700;
    color: var(--dark);
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

/* CTA sidebar card */
.sidebar-cta {
    background: linear-gradient(135deg, var(--dark) 0%, #2f5149 100%);
    border-radius: var(--r-xl);
    padding: 2rem 1.5rem;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.sidebar-cta::before {
    content: '';
    position: absolute;
    inset: 0;
    background: radial-gradient(ellipse 80% 70% at 50% 0%, rgba(168,216,234,.1) 0%, transparent 60%);
    pointer-events: none;
}

.sidebar-cta::after {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 3px;
    background: linear-gradient(90deg, var(--blue-deep), var(--green-deep));
}

.sidebar-cta p {
    font-size: 0.85rem;
    color: rgba(255,255,255,.55);
    line-height: 1.7;
    margin-bottom: 1.4rem;
    position: relative;
}

.sidebar-cta h4 {
    font-family: var(--font-display);
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--white);
    margin-bottom: 0.6rem;
    position: relative;
}

.btn-cta-solid {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    width: 100%;
    padding: 0.9rem;
    background: var(--grad-cool);
    color: var(--white);
    border-radius: var(--r-full);
    font-family: var(--font-body);
    font-weight: 700;
    font-size: 0.96rem;
    text-decoration: none;
    box-shadow: var(--glow-blue);
    margin-bottom: 0.65rem;
    transition: transform var(--t-base), box-shadow var(--t-base), opacity var(--t-base);
    position: relative;
}

.btn-cta-solid:hover {
    transform: translateY(-2px);
    box-shadow: 0 12px 30px rgba(74,143,171,.42);
    opacity: .92;
    color: var(--white);
    text-decoration: none;
}

.btn-cta-ghost {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    width: 100%;
    padding: 0.85rem;
    background: transparent;
    color: rgba(255,255,255,.65);
    border: 1.5px solid rgba(255,255,255,.15);
    border-radius: var(--r-full);
    font-family: var(--font-body);
    font-weight: 600;
    font-size: 0.94rem;
    text-decoration: none;
    transition: all var(--t-base);
    position: relative;
}

.btn-cta-ghost:hover {
    border-color: rgba(255,255,255,.4);
    color: var(--white);
    background: rgba(255,255,255,.07);
    transform: translateY(-2px);
    text-decoration: none;
}

/* ── Related projects ── */
.related-section {
    max-width: 1200px;
    margin: 0 auto;
    padding: clamp(4.75rem, 7vw, 6.25rem) clamp(1.75rem, 4vw, 2.5rem);
}

.related-header {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    margin-bottom: 2rem;
    gap: 1rem;
    flex-wrap: wrap;
}

.related-header-left .section-eyebrow { margin-bottom: 0.4rem; }

.related-header-left h2 {
    font-family: var(--font-display);
    font-size: clamp(1.6rem, 3vw, 2.2rem);
    font-weight: 700;
    color: var(--dark);
    letter-spacing: -0.02em;
    margin: 0;
}

.related-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1.4rem;
}

.related-card {
    background: var(--white);
    border: 1.5px solid var(--surface-alt);
    border-radius: 24px;
    overflow: hidden;
    box-shadow: var(--shadow-sm);
    text-decoration: none;
    color: inherit;
    display: flex;
    flex-direction: column;
    transition: transform .45s cubic-bezier(.22,.68,0,1.2),
                box-shadow .45s cubic-bezier(.22,.68,0,1.2),
                border-color .25s ease;
}

.related-card:hover {
    transform: translateY(-8px) scale(1.01);
    box-shadow: 0 20px 48px rgba(36,59,54,.16);
    border-color: rgba(49,154,154,.3);
    text-decoration: none;
    color: inherit;
}

.related-img-wrap {
    aspect-ratio: 4 / 3;
    overflow: hidden;
}

.related-img {
    width: 100%; height: 100%;
    object-fit: cover;
    display: block;
    transition: transform var(--t-slow);
}

.related-card:hover .related-img { transform: scale(1.07); }

.related-info { padding: 1.25rem 1.35rem 1.4rem; flex: 1; }

.related-cat {
    display: inline-flex;
    align-items: center;
    gap: 0.3rem;
    background: var(--blue-light);
    color: var(--blue-deep);
    padding: 0.22rem 0.75rem;
    border-radius: var(--r-full);
    font-size: 0.7rem;
    font-weight: 700;
    letter-spacing: 0.07em;
    text-transform: uppercase;
    margin-bottom: 0.6rem;
}

.related-title {
    font-family: var(--font-display);
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--dark);
    line-height: 1.3;
    margin-bottom: 0.35rem;
    transition: color var(--t-base);
}

.related-card:hover .related-title { color: var(--blue-deep); }

.related-desc {
    color: var(--muted);
    font-size: 0.85rem;
    line-height: 1.6;
    margin: 0;
}

/* ── Back link ── */
.back-row {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 2.5rem 3.5rem;
}

.btn-back {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 1.6rem;
    background: var(--white);
    border: 1.5px solid var(--surface-alt);
    border-radius: var(--r-full);
    color: var(--muted);
    font-family: var(--font-body);
    font-weight: 600;
    font-size: 0.9rem;
    text-decoration: none;
    box-shadow: var(--shadow-xs);
    transition: all var(--t-base);
}

.btn-back:hover {
    border-color: var(--blue-mid);
    color: var(--blue-deep);
    background: var(--blue-light);
    transform: translateX(-3px);
    text-decoration: none;
}

.btn-back i { transition: transform var(--t-base); }
.btn-back:hover i { transform: translateX(-3px); }

/* ── Responsive ── */
@media (max-width: 1024px) {
    .detail-layout { grid-template-columns: 1fr; gap: 2rem; }
    .detail-sidebar { position: static; display: grid; grid-template-columns: 1fr 1fr; gap: 1.25rem; }
    .sidebar-card, .sidebar-cta { margin-bottom: 0; }
    .related-grid { grid-template-columns: repeat(2, 1fr); }
}

@media (max-width: 768px) {
    .detail-cover { height: 70vh; }
    .detail-cover-content { padding: 0 1.25rem 2.5rem; }
    .detail-layout { padding: 4.5rem 1.25rem; }
    .detail-sidebar { grid-template-columns: 1fr; }
    .gallery-grid { grid-template-columns: repeat(2, 1fr); }
    .related-section { padding: 4.5rem 1.25rem; }
    .related-grid { grid-template-columns: 1fr; }
    .back-row { padding: 0 1.25rem 4.5rem; }
    .lightbox-nav.prev { left: 0.5rem; }
    .lightbox-nav.next { right: 0.5rem; }
}

@media (max-width: 480px) {
    .gallery-grid { grid-template-columns: 1fr; }
}
</style>
@endsection

@section('content')

{{-- ── Full-bleed Cover ── --}}
<div class="detail-cover">
    <img
        src="{{ asset($portfolio->image_path) }}"
        alt="{{ $portfolio->title }}"
        class="detail-cover-img"
        width="1400" height="900"
        loading="eager"
        decoding="async"
        fetchpriority="high"
        onerror="this.onerror=null;this.src='{{ asset('images/placeholder-portfolio.svg') }}'"
    >
    <div class="detail-cover-overlay"></div>

    <div class="detail-cover-content">
        <div class="breadcrumb">
            <a href="{{ route('home') }}"><i class="fas fa-home"></i> Home</a>
            <span class="sep">/</span>
            <a href="{{ route('portfolio.index') }}">Portofolio</a>
            <span class="sep">/</span>
            <span>{{ Str::limit($portfolio->title, 28) }}</span>
        </div>

        <div class="detail-category">
            {{ ucfirst($portfolio->category) }}
        </div>

        <h1 class="detail-title">{{ $portfolio->title }}</h1>

        <div class="detail-meta-row">
            @if($portfolio->client_name)
            <span class="detail-meta-pill">
                <i class="fas fa-user"></i> {{ $portfolio->client_name }}
            </span>
            <span class="meta-divider"></span>
            @endif
            @if($portfolio->project_date)
            <span class="detail-meta-pill">
                <i class="fas fa-calendar-alt"></i> {{ $portfolio->project_date->format('F Y') }}
            </span>
            <span class="meta-divider"></span>
            @endif
            <span class="detail-meta-pill">
                <i class="fas fa-check-circle"></i> Selesai
            </span>
        </div>
    </div>
</div>

{{-- ── Two-column layout ── --}}
<div class="detail-layout">

    {{-- ── Left: Main content ── --}}
    <div class="detail-main">

        {{-- Description --}}
        <div class="detail-description-block">
            <div class="block-label">Tentang Proyek</div>
            <div class="detail-description">
                {!! nl2br(e($portfolio->description)) !!}
            </div>
        </div>

        {{-- Gallery --}}
        @if(isset($portfolio->galleries) && $portfolio->galleries->count() > 0)
        <div class="gallery-block">
            <div class="block-label">Galeri Proyek</div>
            <div class="gallery-grid">
                @foreach($portfolio->galleries as $gallery)
                <div class="gallery-item {{ $gallery->type == 'video' ? 'video-item' : '' }}"
                     data-index="{{ $loop->index }}"
                     data-type="{{ $gallery->type }}"
                     data-src="{{ asset($gallery->file_path) }}"
                     onclick="openLightbox({{ $loop->index }})">

                    @if($gallery->type == 'video')
                        <video class="gallery-media" muted preload="metadata">
                            <source src="{{ asset($gallery->file_path) }}" type="video/mp4">
                        </video>
                        <span class="video-badge"><i class="fas fa-play"></i> Video</span>
                    @else
                        <img
                            src="{{ asset($gallery->file_path) }}"
                            alt="Galeri {{ $portfolio->title }} {{ $loop->iteration }}"
                            class="gallery-media"
                            loading="{{ $loop->first ? 'eager' : 'lazy' }}"
                            decoding="async"
                        >
                    @endif

                    <div class="gallery-item-overlay">
                        <i class="fas {{ $gallery->type == 'video' ? 'fa-play-circle' : 'fa-expand-alt' }}"></i>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Lightbox --}}
        <div class="lightbox-backdrop" id="lightbox" onclick="closeLightboxOnBackdrop(event)">
            <button class="lightbox-close" onclick="closeLightbox()" aria-label="Tutup">
                <i class="fas fa-times"></i>
            </button>
            <button class="lightbox-nav prev" onclick="lightboxNav(-1)" aria-label="Sebelumnya">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="lightbox-nav next" onclick="lightboxNav(1)" aria-label="Berikutnya">
                <i class="fas fa-chevron-right"></i>
            </button>
            <div class="lightbox-inner" id="lightboxInner"></div>
            <div class="lightbox-counter" id="lightboxCounter"></div>
        </div>
        @endif

        {{-- Share --}}
        <div class="share-block">
            <div class="block-label">Bagikan</div>
            <div class="share-pills">
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

    {{-- ── Right: Sidebar ── --}}
    <aside class="detail-sidebar">

        {{-- Specs card --}}
        <div class="sidebar-card">
            <div class="sidebar-card-head">
                <h4><i class="fas fa-clipboard-list"></i> Info Proyek</h4>
            </div>
            <div class="sidebar-card-body">
                <div class="spec-row">
                    <div class="spec-row-icon"><i class="fas fa-layer-group"></i></div>
                    <div class="spec-row-text">
                        <span class="spec-row-label">Kategori</span>
                        <span class="spec-row-value">{{ ucfirst($portfolio->category) }}</span>
                    </div>
                </div>

                @if($portfolio->project_date)
                <div class="spec-row">
                    <div class="spec-row-icon"><i class="fas fa-calendar-alt"></i></div>
                    <div class="spec-row-text">
                        <span class="spec-row-label">Tanggal</span>
                        <span class="spec-row-value">{{ $portfolio->project_date->format('d M Y') }}</span>
                    </div>
                </div>
                @endif

                @if($portfolio->client_name)
                <div class="spec-row">
                    <div class="spec-row-icon"><i class="fas fa-building"></i></div>
                    <div class="spec-row-text">
                        <span class="spec-row-label">Klien</span>
                        <span class="spec-row-value">{{ $portfolio->client_name }}</span>
                    </div>
                </div>
                @endif

                <div class="spec-row">
                    <div class="spec-row-icon"><i class="fas fa-check-circle"></i></div>
                    <div class="spec-row-text">
                        <span class="spec-row-label">Status</span>
                        <span class="spec-row-value">Selesai</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- CTA card --}}
        <div class="sidebar-cta">
            <h4>Proyek Serupa?</h4>
            <p>Konsultasi gratis untuk mewujudkan dekorasi impian Anda bersama tim HalloEO.</p>
            <a href="{{ route('contact') }}" class="btn-cta-solid">
                <i class="fas fa-phone"></i> Hubungi Kami
            </a>
            <a href="{{ route('services') }}" class="btn-cta-ghost">
                <i class="fas fa-list"></i> Lihat Layanan
            </a>
        </div>

    </aside>
</div>

{{-- ── Related Projects ── --}}
@if(isset($relatedPortfolios) && $relatedPortfolios->count() > 0)
<section class="related-section">
    <div class="related-header">
        <div class="related-header-left">
            <span class="section-eyebrow">Lihat Juga</span>
            <h2>Proyek Terkait</h2>
        </div>
        <a href="{{ route('portfolio.index', ['category' => $portfolio->category]) }}"
           class="btn-back" style="margin-bottom:0.2rem;">
            Semua {{ ucfirst($portfolio->category) }} <i class="fas fa-arrow-right"></i>
        </a>
    </div>

    <div class="related-grid">
        @foreach($relatedPortfolios as $related)
        <a href="{{ route('portfolio.show', $related->id) }}" class="related-card">
            <div class="related-img-wrap">
                <img
                    src="{{ asset($related->image_path) }}"
                    alt="{{ $related->title }}"
                    class="related-img"
                    width="400"
                    height="300"
                    loading="lazy"
                    decoding="async"
                    onerror="this.onerror=null;this.src='{{ asset('images/placeholder-portfolio.svg') }}'"
                >
            </div>
            <div class="related-info">
                <span class="related-cat">{{ ucfirst($related->category) }}</span>
                <h3 class="related-title">{{ $related->title }}</h3>
                <p class="related-desc">{{ Str::limit($related->description, 75) }}</p>
            </div>
        </a>
        @endforeach
    </div>
</section>
@endif

{{-- ── Back ── --}}
<div class="back-row">
    <a href="{{ route('portfolio.index') }}" class="btn-back">
        <i class="fas fa-arrow-left"></i> Kembali ke Portofolio
    </a>
</div>

@endsection

@section('scripts')
<script>
const galleryItems = [
    @if(isset($portfolio->galleries) && $portfolio->galleries->count() > 0)
    @foreach($portfolio->galleries as $g)
    { type: '{{ $g->type }}', src: '{{ asset($g->file_path) }}' },
    @endforeach
    @endif
];

let currentIndex = 0;

function openLightbox(index) {
    currentIndex = index;
    renderLightbox();
    document.getElementById('lightbox').classList.add('open');
    document.body.style.overflow = 'hidden';
}

function closeLightbox() {
    const lb = document.getElementById('lightbox');
    lb.classList.remove('open');
    document.body.style.overflow = '';
    const inner = document.getElementById('lightboxInner');
    const vid = inner.querySelector('video');
    if (vid) vid.pause();
    setTimeout(() => { inner.innerHTML = ''; }, 300);
}

function closeLightboxOnBackdrop(e) {
    if (e.target === document.getElementById('lightbox')) closeLightbox();
}

function lightboxNav(dir) {
    const inner = document.getElementById('lightboxInner');
    const vid = inner.querySelector('video');
    if (vid) vid.pause();
    currentIndex = (currentIndex + dir + galleryItems.length) % galleryItems.length;
    renderLightbox();
}

function renderLightbox() {
    const item = galleryItems[currentIndex];
    const inner = document.getElementById('lightboxInner');
    const counter = document.getElementById('lightboxCounter');

    if (item.type === 'video') {
        inner.innerHTML = `<video class="lightbox-video" controls autoplay>
            <source src="${item.src}" type="video/mp4">
        </video>`;
    } else {
        inner.innerHTML = `<img src="${item.src}" class="lightbox-media" alt="Galeri ${currentIndex + 1}">`;
    }

    counter.textContent = `${currentIndex + 1} / ${galleryItems.length}`;
}

document.addEventListener('keydown', function(e) {
    const lb = document.getElementById('lightbox');
    if (!lb.classList.contains('open')) return;
    if (e.key === 'Escape') closeLightbox();
    if (e.key === 'ArrowLeft') lightboxNav(-1);
    if (e.key === 'ArrowRight') lightboxNav(1);
});
</script>
@endsection