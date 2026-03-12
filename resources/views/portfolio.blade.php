@extends('layout')

@section('title', 'Portofolio - HalloEO')

@section('styles')
<style>
/* ── Hero ── */
.portfolio-hero {
    padding: 8rem 2rem 6rem;
    background: var(--blue-deep);
    text-align: center;
    position: relative;
    overflow: hidden;
}

.portfolio-hero::before {
    content: '';
    position: absolute;
    inset: 0;
    background:
        radial-gradient(circle at 15% 40%, rgba(170,220,245,0.35) 0%, transparent 60%),
        radial-gradient(circle at 85% 60%, rgba(170,235,210,0.30) 0%, transparent 60%),
        linear-gradient(180deg, #5c8fa8 0%, #4f7f96 100%);
    pointer-events: none;
}

/* Accent top line */
.portfolio-hero::after {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--blue-deep), var(--green-deep), var(--gold));
}

.portfolio-hero-inner {
    position: relative;
    z-index: 1;
    max-width: 700px;
    margin: 0 auto;
}

.portfolio-hero .section-eyebrow {
    background: rgba(168,216,234,.15);
    color: var(--blue);
    border: 1px solid rgba(168,216,234,.3);
    margin-bottom: 1.1rem;
}

.portfolio-hero h1 {
    font-family: var(--font-display);
    font-size: clamp(2.2rem, 5vw, 3.8rem);
    font-weight: 800;
    color: var(--white);
    letter-spacing: -0.025em;
    line-height: 1.15;
    margin-bottom: 1.1rem;
    animation: fade-up .8s cubic-bezier(0,0,.2,1) both;
}

.portfolio-hero h1 em {
    font-style: normal;
    background: linear-gradient(135deg, var(--blue) 0%, var(--green) 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.portfolio-hero p {
    font-size: 1.1rem;
    color: rgba(255,255,255,.6);
    max-width: 520px;
    margin: 0 auto;
    line-height: 1.75;
    animation: fade-up .8s cubic-bezier(0,0,.2,1) .15s both;
}

@keyframes fade-up {
    from { opacity: 0; transform: translateY(20px); }
    to   { opacity: 1; transform: translateY(0); }
}

/* ── Container ── */
.portfolio-container {
    max-width: 1360px;
    margin: 0 auto;
    padding: 4rem 2rem 5rem;
}

/* ── Filter Buttons ── */
.filter-buttons {
    display: flex;
    gap: 0.65rem;
    justify-content: center;
    flex-wrap: wrap;
    margin-bottom: 3.5rem;
    animation: fade-up .6s cubic-bezier(0,0,.2,1) .1s both;
}

.filter-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.4rem;
    padding: 0.6rem 1.4rem;
    background: var(--white);
    border: 1.5px solid var(--surface-alt);
    border-radius: var(--r-full);
    color: var(--muted);
    font-family: var(--font-body);
    font-weight: 600;
    font-size: 0.9rem;
    cursor: pointer;
    text-decoration: none;
    transition: all var(--t-base);
    white-space: nowrap;
}

.filter-btn:hover {
    border-color: var(--blue-mid);
    color: var(--blue-deep);
    background: var(--blue-light);
    transform: translateY(-2px);
    box-shadow: var(--shadow-sm);
    text-decoration: none;
}

.filter-btn.active {
    background: var(--grad-deep);
    color: var(--white);
    border-color: transparent;
    box-shadow: var(--glow-blue);
    transform: translateY(-2px);
}

/* ── Portfolio Grid ── */
.portfolio-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 1.75rem;
}

.portfolio-item {
    background: var(--white);
    border-radius: var(--r-xl);
    overflow: hidden;
    box-shadow: var(--shadow-sm);
    border: 1.5px solid var(--surface-alt);
    transition: transform var(--t-slow), box-shadow var(--t-slow), border-color var(--t-base);
    cursor: pointer;
    display: flex;
    flex-direction: column;
    animation: fade-up .6s cubic-bezier(0,0,.2,1) backwards;
}

.portfolio-item:nth-child(1) { animation-delay: .05s; }
.portfolio-item:nth-child(2) { animation-delay: .10s; }
.portfolio-item:nth-child(3) { animation-delay: .15s; }
.portfolio-item:nth-child(4) { animation-delay: .20s; }
.portfolio-item:nth-child(5) { animation-delay: .25s; }
.portfolio-item:nth-child(6) { animation-delay: .30s; }

.portfolio-item:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-lg);
    border-color: var(--blue-light);
}

/* Image wrapper */
.portfolio-image-wrapper {
    position: relative;
    aspect-ratio: 4 / 3;
    overflow: hidden;
}

.portfolio-image {
    width: 100%; height: 100%;
    object-fit: cover;
    display: block;
    transition: transform var(--t-slow);
}

.portfolio-item:hover .portfolio-image { transform: scale(1.07); }

.portfolio-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(
        to bottom,
        rgba(74,143,171,.0) 0%,
        rgba(74,143,171,.75) 100%
    );
    display: flex;
    align-items: flex-end;
    justify-content: flex-end;
    padding: 1.25rem;
    opacity: 0;
    transition: opacity var(--t-base);
}

.portfolio-item:hover .portfolio-overlay { opacity: 1; }

.overlay-icon {
    width: 44px; height: 44px;
    background: rgba(255,255,255,.2);
    border: 1.5px solid rgba(255,255,255,.5);
    backdrop-filter: blur(6px);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--white);
    font-size: 1rem;
    transition: transform var(--t-base), background var(--t-base);
}

.portfolio-item:hover .overlay-icon {
    transform: scale(1.12);
    background: rgba(255,255,255,.35);
}

/* Details */
.portfolio-details {
    padding: 1.6rem;
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.portfolio-category {
    display: inline-flex;
    align-items: center;
    gap: 0.35rem;
    background: var(--blue-light);
    color: var(--blue-deep);
    padding: 0.28rem 0.85rem;
    border-radius: var(--r-full);
    font-size: 0.75rem;
    font-weight: 700;
    letter-spacing: 0.06em;
    text-transform: uppercase;
    align-self: flex-start;
}

.portfolio-title {
    font-family: var(--font-display);
    font-size: 1.3rem;
    font-weight: 700;
    color: var(--dark);
    line-height: 1.3;
    margin: 0;
}

.portfolio-description {
    color: var(--muted);
    font-size: 0.91rem;
    line-height: 1.65;
    flex-grow: 1;
    margin: 0;
}

.portfolio-meta {
    display: flex;
    gap: 1.25rem;
    align-items: center;
    color: var(--muted);
    font-size: 0.84rem;
    padding-top: 0.75rem;
    border-top: 1px solid var(--surface-alt);
    margin-top: auto;
}

.portfolio-meta i {
    color: var(--blue-mid);
    width: 14px;
    text-align: center;
}

/* ── Empty State ── */
.empty-state {
    grid-column: 1 / -1;
    text-align: center;
    padding: 5rem 2rem;
    color: var(--muted);
}

.empty-state-icon {
    width: 90px; height: 90px;
    background: var(--blue-light);
    border-radius: var(--r-xl);
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
}

.empty-state-icon i {
    font-size: 2.5rem;
    color: var(--blue-deep);
}

.empty-state h3 {
    font-family: var(--font-display);
    font-size: 1.6rem;
    font-weight: 700;
    color: var(--dark);
    margin-bottom: 0.6rem;
}

.empty-state p {
    font-size: 0.95rem;
    max-width: 360px;
    margin: 0 auto;
    line-height: 1.7;
}

/* ── Pagination ── */
.pagination-wrap {
    display: flex;
    justify-content: center;
    gap: 0.5rem;
    margin-top: 3.5rem;
    flex-wrap: wrap;
}

.pagination-wrap a,
.pagination-wrap span {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 42px; height: 42px;
    padding: 0 0.75rem;
    background: var(--white);
    border: 1.5px solid var(--surface-alt);
    border-radius: var(--r-md);
    color: var(--dark-mid);
    text-decoration: none;
    font-weight: 600;
    font-size: 0.92rem;
    transition: all var(--t-base);
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
    background: var(--grad-deep);
    color: var(--white);
    border-color: transparent;
    box-shadow: var(--glow-blue);
}

.pagination-wrap span:not(.active) {
    color: var(--muted);
    cursor: default;
    opacity: .5;
}

/* ── Responsive ── */
@media (max-width: 768px) {
    .portfolio-hero { padding: 6rem 1.25rem 3.5rem; }

    .filter-buttons {
        flex-wrap: nowrap;
        overflow-x: auto;
        justify-content: flex-start;
        padding: 0.25rem 0 1rem;
        -ms-overflow-style: none;
        scrollbar-width: none;
        margin-bottom: 2rem;
    }

    .filter-buttons::-webkit-scrollbar { display: none; }

    .portfolio-container { padding: 2.5rem 1.25rem 4rem; }

    .portfolio-grid {
        grid-template-columns: 1fr;
        gap: 1.25rem;
    }
}
</style>
@endsection

@section('content')

{{-- ── Hero ── --}}
<section class="portfolio-hero">
    <div class="portfolio-hero-inner">
        <span class="section-eyebrow">
            <i class="fas fa-layer-group"></i> Karya Kami
        </span>
        <h1>Koleksi <em>Portofolio</em> Kami</h1>
        <p>Lihat koleksi karya terbaik yang telah dipercaya oleh berbagai klien dari seluruh Indonesia.</p>
    </div>
</section>

{{-- ── Content ── --}}
<div class="portfolio-container">

    {{-- Filter Buttons --}}
    <div class="filter-buttons">
        <a href="{{ route('portfolio.index') }}"
           class="filter-btn {{ !request('category') || request('category') == 'all' ? 'active' : '' }}">
            <i class="fas fa-th-large"></i> Semua
        </a>
        @foreach($categories as $category)
            <a href="{{ route('portfolio.index', ['category' => $category->title]) }}"
               class="filter-btn {{ request('category') == $category->title ? 'active' : '' }}">
                <i class="fas fa-tag"></i> {{ $category->title }}
            </a>
        @endforeach
    </div>

    {{-- Portfolio Grid --}}
    <div class="portfolio-grid">
        @forelse($portfolios as $portfolio)
        <div class="portfolio-item"
             onclick="window.location='{{ route('portfolio.show', $portfolio->id) }}'">

            <div class="portfolio-image-wrapper">
                <img
                    src="{{ asset($portfolio->image_path) }}"
                    alt="{{ $portfolio->title }}"
                    class="portfolio-image"
                    width="400" height="300"
                    loading="lazy"
                    onerror="this.src='https://via.placeholder.com/400x300/A8D8EA/FFFFFF?text={{ urlencode($portfolio->title) }}'"
                >
                <div class="portfolio-overlay">
                    <div class="overlay-icon">
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </div>
            </div>

            <div class="portfolio-details">
                <span class="portfolio-category">
                    <i class="fas fa-tag"></i> {{ ucfirst($portfolio->category) }}
                </span>
                <h3 class="portfolio-title">{{ $portfolio->title }}</h3>
                <p class="portfolio-description">{{ Str::limit($portfolio->description, 110) }}</p>

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
            <div class="empty-state-icon">
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