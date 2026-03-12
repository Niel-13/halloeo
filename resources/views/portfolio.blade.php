@extends('layout')

@section('title', 'Portofolio - HalloEO')

@section('styles')
<style>
/* ═══════════════════════════════════════════════
   PORTFOLIO INDEX — HalloEO
   Editorial · Soft Luxury · Breathing Layout
═══════════════════════════════════════════════ */

/* ── Hero ── */
.portfolio-hero {
    min-height: 52vh;
    display: flex;
    align-items: flex-end;
    padding: 0 2.5rem 5rem;
    background: var(--blue-deep);
    position: relative;
    overflow: hidden;
}

.portfolio-hero::before {
    content: '';
    position: absolute;
    inset: 0;
    background:
        radial-gradient(ellipse 55% 80% at 5%  20%, rgba(168,216,234,.14) 0%, transparent 55%),
        radial-gradient(ellipse 45% 70% at 95% 80%, rgba(184,224,210,.11) 0%, transparent 55%),
        radial-gradient(ellipse 60% 60% at 50% 110%, rgba(201,169,110,.07) 0%, transparent 50%);
    pointer-events: none;
    animation: mesh-drift 18s ease-in-out infinite alternate;
}

@keyframes mesh-drift {
    from { opacity: .7; transform: scale(1); }
    to   { opacity: 1;  transform: scale(1.04); }
}

.portfolio-hero::after {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 3px;
    background: linear-gradient(90deg, var(--blue-deep), var(--green-deep), var(--gold));
}

/* Large decorative number in background */
.hero-deco-num {
    position: absolute;
    right: 3rem;
    top: 50%;
    transform: translateY(-55%);
    font-family: var(--font-display);
    font-size: clamp(10rem, 22vw, 20rem);
    font-weight: 900;
    line-height: 1;
    color: rgba(var(--greenn), 0.2);
    pointer-events: none;
    user-select: none;
    letter-spacing: -0.04em;
}

:root {
  --greenn: 34, 197, 94;
}

.portfolio-hero-inner {
    position: relative;
    z-index: 1;
    max-width: 1360px;
    width: 100%;
    margin: 0 auto;
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    gap: 2rem;
    padding-top: 7rem;
}

.hero-left { flex: 1; }

.hero-eyebrow-row {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 1.25rem;
    animation: fade-up .7s cubic-bezier(0,0,.2,1) both;
}

.hero-line {
    width: 36px; height: 2px;
    background: linear-gradient(90deg, var(--blue), var(--green));
    border-radius: 2px;
    flex-shrink: 0;
}

.portfolio-hero h1 {
    font-family: var(--font-display);
    font-size: clamp(2.8rem, 6.5vw, 5.5rem);
    font-weight: 800;
    color: var(--white);
    letter-spacing: -0.03em;
    line-height: 1.08;
    margin-bottom: 1.5rem;
    animation: fade-up .8s cubic-bezier(0,0,.2,1) .08s both;
}

.portfolio-hero h1 span {
    display: block;
    background: linear-gradient(135deg, var(--blue-muted) 0%, var(--green-deep) 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.hero-right {
    flex-shrink: 0;
    max-width: 280px;
    text-align: right;
    animation: fade-up .8s cubic-bezier(0,0,.2,1) .18s both;
    padding-bottom: 0.5rem;
}

.hero-right p {
    font-size: 1rem;
    color: var(--white);
    line-height: 1.75;
    margin-bottom: 1.5rem;
}

.hero-count-row {
    display: flex;
    gap: 2rem;
    justify-content: flex-end;
}

.hero-count strong {
    display: block;
    font-family: var(--font-display);
    font-size: 2rem;
    font-weight: 700;
    color: var(--white);
    line-height: 1;
}

.hero-count span {
    font-size: 0.74rem;
    color: rgba(255,255,255,.4);
    letter-spacing: 0.06em;
    text-transform: uppercase;
}

@keyframes fade-up {
    from { opacity: 0; transform: translateY(22px); }
    to   { opacity: 1; transform: translateY(0); }
}

/* ── Sticky Filter Bar ── */
.filter-bar {
    position: sticky;
    top: 72px;
    z-index: 100;
    background: rgba(247,249,251,.94);
    backdrop-filter: blur(16px);
    -webkit-backdrop-filter: blur(16px);
    border-bottom: 1px solid var(--surface-alt);
    padding: 0.8rem 2.5rem;
    transition: box-shadow var(--t-base);
}

.filter-bar.shadowed { box-shadow: var(--shadow-md); }

.filter-inner {
    max-width: 1360px;
    margin: 0 auto;
    display: flex;
    align-items: center;
    gap: 0.55rem;
    overflow-x: auto;
    -ms-overflow-style: none;
    scrollbar-width: none;
}

.filter-inner::-webkit-scrollbar { display: none; }

.filter-label {
    font-size: 0.74rem;
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    color: var(--muted);
    flex-shrink: 0;
    margin-right: 0.25rem;
}

.filter-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.3rem;
    padding: 0.48rem 1.05rem;
    background: var(--white);
    border: 1.5px solid var(--surface-alt);
    border-radius: var(--r-full);
    color: var(--muted);
    font-family: var(--font-body);
    font-weight: 600;
    font-size: 0.85rem;
    cursor: pointer;
    text-decoration: none;
    white-space: nowrap;
    flex-shrink: 0;
    transition: all var(--t-base);
    box-shadow: var(--shadow-xs);
    border-radius: 50px;
}

.filter-btn:hover {
    border-color: var(--blue-mid);
    color: var(--blue-deep);
    background: var(--blue-light);
    transform: translateY(-1px);
    box-shadow: var(--shadow-sm);
    text-decoration: none;
}

.filter-btn.active {
    background: var(--green-deep);
    color: var(--white);
    border-color: transparent;
    box-shadow: 0 4px 14px rgba(26,37,48,.2);
}

.filter-btn.active:hover {
    background: var(--green);
    transform: translateY(-1px);
    color: var(--white);
}

/* ── Container ── */
.portfolio-container {
    max-width: 1360px;
    margin: 0 auto;
    padding: 3rem 2.5rem 6rem;
}

.results-meta {
    display: flex;
    align-items: center;
    margin-bottom: 2rem;
}

.results-count {
    font-size: 0.87rem;
    color: var(--muted);
}

.results-count strong { color: var(--dark); font-weight: 700; }

/* ── Editorial Grid ── */
.portfolio-grid {
    display: grid;
    grid-template-columns: repeat(12, 1fr);
    gap: 1.5rem;
    align-items: start;
}

/* 3 per row = span 4 */
.portfolio-item { grid-column: span 4; }

/* 1st & 5th items span wider */
.portfolio-item:first-child  { grid-column: span 8; }
.portfolio-item:nth-child(5) { grid-column: span 8; }

.portfolio-item {
    background: var(--white);
    border-radius: var(--r-xl);
    overflow: hidden;
    border: 1.5px solid var(--surface-alt);
    box-shadow: var(--shadow-sm);
    cursor: pointer;
    display: flex;
    flex-direction: column;
    transition: transform var(--t-slow), box-shadow var(--t-slow), border-color var(--t-base);
    animation: fade-up .55s cubic-bezier(0,0,.2,1) backwards;
}

.portfolio-item:nth-child(1) { animation-delay: .04s; }
.portfolio-item:nth-child(2) { animation-delay: .08s; }
.portfolio-item:nth-child(3) { animation-delay: .12s; }
.portfolio-item:nth-child(4) { animation-delay: .16s; }
.portfolio-item:nth-child(5) { animation-delay: .20s; }
.portfolio-item:nth-child(6) { animation-delay: .24s; }
.portfolio-item:nth-child(7) { animation-delay: .28s; }
.portfolio-item:nth-child(8) { animation-delay: .32s; }
.portfolio-item:nth-child(9) { animation-delay: .36s; }

.portfolio-item:hover {
    transform: translateY(-7px);
    box-shadow: var(--shadow-lg);
    border-color: var(--blue-light);
}

/* Image */
.portfolio-image-wrapper {
    position: relative;
    overflow: hidden;
    aspect-ratio: 3 / 2;
}

.portfolio-item:first-child .portfolio-image-wrapper,
.portfolio-item:nth-child(5) .portfolio-image-wrapper {
    aspect-ratio: 16 / 7;
}

.portfolio-image {
    width: 100%; height: 100%;
    object-fit: cover;
    display: block;
    transition: transform .6s cubic-bezier(.4,0,.2,1);
}

.portfolio-item:hover .portfolio-image { transform: scale(1.06); }

/* Overlay */
.portfolio-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(170deg, transparent 35%, rgba(26,37,48,.7) 100%);
    opacity: 0;
    transition: opacity var(--t-base);
    display: flex;
    align-items: flex-end;
    padding: 1.4rem;
}

.portfolio-item:hover .portfolio-overlay { opacity: 1; }

.overlay-cta {
    display: inline-flex;
    align-items: center;
    gap: 0.4rem;
    background: rgba(255,255,255,.15);
    border: 1px solid rgba(255,255,255,.35);
    backdrop-filter: blur(8px);
    color: var(--white);
    font-size: 0.82rem;
    font-weight: 600;
    padding: 0.45rem 1rem;
    border-radius: var(--r-full);
    transform: translateY(8px);
    transition: transform var(--t-base), background var(--t-base);
}

.portfolio-item:hover .overlay-cta { transform: translateY(0); }

/* Card body */
.portfolio-details {
    padding: 1.4rem 1.5rem 1.5rem;
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 0.4rem;
}

.portfolio-category {
    display: inline-flex;
    align-items: center;
    gap: 0.3rem;
    background: var(--blue-light);
    color: var(--blue-deep);
    padding: 0.22rem 0.78rem;
    border-radius: var(--r-full);
    font-size: 0.71rem;
    font-weight: 700;
    letter-spacing: 0.07em;
    text-transform: uppercase;
    align-self: flex-start;
}

.portfolio-title {
    font-family: var(--font-display);
    font-size: 1.18rem;
    font-weight: 700;
    color: var(--dark);
    line-height: 1.3;
    margin: 0;
    transition: color var(--t-base);
}

.portfolio-item:hover .portfolio-title { color: var(--blue-deep); }

.portfolio-description {
    color: var(--muted);
    font-size: 0.88rem;
    line-height: 1.65;
    flex-grow: 1;
    margin: 0;
}

.portfolio-meta {
    display: flex;
    gap: 1rem;
    color: var(--muted);
    font-size: 0.81rem;
    padding-top: 0.7rem;
    border-top: 1px solid var(--surface-alt);
    margin-top: 0.15rem;
}

.portfolio-meta i {
    color: var(--blue-mid);
    width: 13px;
    text-align: center;
}

/* ── Empty state ── */
.empty-state {
    grid-column: 1 / -1;
    text-align: center;
    padding: 6rem 2rem;
}

.empty-icon-wrap {
    width: 88px; height: 88px;
    background: var(--blue-light);
    border-radius: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
}

.empty-icon-wrap i { font-size: 2.3rem; color: var(--blue-deep); }

.empty-state h3 {
    font-family: var(--font-display);
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--dark);
    margin-bottom: 0.5rem;
}

.empty-state p {
    color: var(--muted);
    font-size: 0.92rem;
    max-width: 320px;
    margin: 0 auto;
    line-height: 1.7;
}

/* ── Pagination ── */
.pagination-wrap {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 0.4rem;
    margin-top: 4rem;
    flex-wrap: wrap;
}

.pagination-wrap a,
.pagination-wrap span {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 40px; height: 40px;
    padding: 0 0.65rem;
    background: var(--white);
    border: 1.5px solid var(--surface-alt);
    border-radius: var(--r-md);
    color: var(--dark-mid);
    text-decoration: none;
    font-weight: 600;
    font-size: 0.9rem;
    transition: all var(--t-base);
    box-shadow: var(--shadow-xs);
}

.pagination-wrap a:hover {
    border-color: var(--blue-mid);
    color: var(--blue-deep);
    background: var(--blue-light);
    transform: translateY(-2px);
    box-shadow: var(--shadow-sm);
    text-decoration: none;
}

.pagination-wrap span.active {
    background: var(--dark);
    color: var(--white);
    border-color: transparent;
    box-shadow: 0 4px 14px rgba(26,37,48,.2);
}

.pagination-wrap span:not(.active) {
    color: var(--muted);
    opacity: .4;
    cursor: default;
}

/* ── Responsive ── */
@media (max-width: 1100px) {
    .portfolio-item             { grid-column: span 6; }
    .portfolio-item:first-child,
    .portfolio-item:nth-child(5){ grid-column: span 12; }
}

@media (max-width: 768px) {
    .portfolio-hero { min-height: auto; padding: 0 1.25rem 3.5rem; }
    .portfolio-hero-inner { flex-direction: column; align-items: flex-start; gap: 1.5rem; padding-top: 6rem; }
    .hero-right { max-width: 100%; text-align: left; }
    .hero-count-row { justify-content: flex-start; }
    .hero-deco-num { display: none; }

    .filter-bar { top: 64px; padding: 0.7rem 1.25rem; }
    .filter-label { display: none; }

    .portfolio-container { padding: 2rem 1.25rem 4rem; }

    .portfolio-grid { grid-template-columns: 1fr; gap: 1.1rem; }
    .portfolio-item,
    .portfolio-item:first-child,
    .portfolio-item:nth-child(5)  { grid-column: span 1; }
    .portfolio-item:first-child .portfolio-image-wrapper,
    .portfolio-item:nth-child(5)  .portfolio-image-wrapper { aspect-ratio: 3 / 2; }
}
</style>
@endsection

@section('content')

{{-- ── Hero ── --}}
<section class="portfolio-hero">
    <div class="hero-deco-num" aria-hidden="true">
        {{ $portfolios->total() ?? '' }}
    </div>

    <div class="portfolio-hero-inner">
        <div class="hero-left">
            <div class="hero-eyebrow-row">
                <div class="hero-line"></div>
                <span class="section-eyebrow"
                      style="background:rgba(168,216,234,.12);color:var(--blue-muted);border:1px solid rgba(168,216,234,.25);border-radius: 50px; rounded-full; padding: 0.22rem 0.78rem; font-size: 0.71rem; font-weight: 700; letter-spacing: 0.07em; text-transform: uppercase;">
                    Karya Pilihan Kami
                </span>
            </div>
            <h1>
                Setiap Karya
                <span>Punya Cerita</span>
            </h1>
        </div>

        <div class="hero-right">
            <p>Dekorasi dan maskot styrofoam berkualitas tinggi yang telah dipercaya klien dari seluruh Indonesia.</p>
        </div>
    </div>
</section>

{{-- ── Sticky Filter Bar ── --}}
<div class="filter-bar" id="filterBar">
    <div class="filter-inner">
        <span class="filter-label">Filter</span>
        <a href="{{ route('portfolio.index') }}"
           class="filter-btn {{ !request('category') || request('category') == 'all' ? 'active' : '' }}">
            <i class="fas fa-th-large"></i> Semua
        </a>
        @foreach($categories as $category)
            <a href="{{ route('portfolio.index', ['category' => $category->title]) }}"
               class="filter-btn {{ request('category') == $category->title ? 'active' : '' }}">
                {{ $category->title }}
            </a>
        @endforeach
    </div>
</div>

{{-- ── Content ── --}}
<div class="portfolio-container">

    <div class="results-meta">
        <p class="results-count">
            Menampilkan <strong>{{ $portfolios->count() }}</strong> dari
            <strong>{{ $portfolios->total() }}</strong> karya
            @if(request('category'))
                &mdash; kategori <strong>{{ request('category') }}</strong>
            @endif
        </p>
    </div>

    {{-- Grid --}}
    <div class="portfolio-grid">
        @forelse($portfolios as $portfolio)
        <div class="portfolio-item"
             onclick="window.location='{{ route('portfolio.show', $portfolio->id) }}'">

            <div class="portfolio-image-wrapper">
                <img
                    src="{{ asset($portfolio->image_path) }}"
                    alt="{{ $portfolio->title }}"
                    class="portfolio-image"
                    width="800" height="533"
                    loading="lazy"
                    onerror="this.src='https://via.placeholder.com/800x533/A8D8EA/FFFFFF?text={{ urlencode($portfolio->title) }}'"
                >
                <div class="portfolio-overlay">
                    <span class="overlay-cta">
                        Lihat Detail <i class="fas fa-arrow-right"></i>
                    </span>
                </div>
            </div>

            <div class="portfolio-details">
                <span class="portfolio-category">{{ ucfirst($portfolio->category) }}</span>
                <h3 class="portfolio-title">{{ $portfolio->title }}</h3>
                <p class="portfolio-description">{{ Str::limit($portfolio->description, 100) }}</p>

                @if($portfolio->client_name || $portfolio->project_date)
                <div class="portfolio-meta">
                    @if($portfolio->client_name)
                        <span><i class="fas fa-user"></i> {{ $portfolio->client_name }}</span>
                    @endif
                    @if($portfolio->project_date)
                        <span><i class="fas fa-calendar-alt"></i> {{ $portfolio->project_date->format('M Y') }}</span>
                    @endif
                </div>
                @endif
            </div>
        </div>

        @empty
        <div class="empty-state">
            <div class="empty-icon-wrap">
                <i class="fas fa-folder-open"></i>
            </div>
            <h3>Belum Ada Portofolio</h3>
            <p>Saat ini belum ada portofolio yang tersedia. Silakan kembali lagi nanti!</p>
        </div>
        @endforelse
    </div>

    {{-- Pagination --}}
    @if($portfolios->hasPages())
    <div class="pagination-wrap">
        @if($portfolios->onFirstPage())
            <span><i class="fas fa-chevron-left"></i></span>
        @else
            <a href="{{ $portfolios->previousPageUrl() }}"><i class="fas fa-chevron-left"></i></a>
        @endif

        @foreach($portfolios->getUrlRange(1, $portfolios->lastPage()) as $page => $url)
            @if($page == $portfolios->currentPage())
                <span class="active">{{ $page }}</span>
            @else
                <a href="{{ $url }}">{{ $page }}</a>
            @endif
        @endforeach

        @if($portfolios->hasMorePages())
            <a href="{{ $portfolios->nextPageUrl() }}"><i class="fas fa-chevron-right"></i></a>
        @else
            <span><i class="fas fa-chevron-right"></i></span>
        @endif
    </div>
    @endif

</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const filterBar = document.getElementById('filterBar');
    if (filterBar) {
        window.addEventListener('scroll', () => {
            filterBar.classList.toggle('shadowed', window.scrollY > 180);
        }, { passive: true });
    }
});
</script>
@endsection