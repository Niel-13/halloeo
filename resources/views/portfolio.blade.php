@extends('layout')

@section('title', 'Portofolio - HalloEO')

@section('styles')
<style>
    .portfolio-hero {
        padding: 8rem 2rem 6rem;
        background: linear-gradient(135deg, var(--dark-pastel-red), var(--pastel-blue), var(--pastel-green));
        text-align: center;
        color: var(--white);
    }

    .portfolio-hero h1 {
        font-family: 'Playfair Display', sans-serif;
        font-size: 3.5rem;
        margin-bottom: 1.5rem;
        animation: fadeInUp 0.8s ease-out;
    }

    .portfolio-hero p {
        font-size: 1.3rem;
        max-width: 800px;
        margin: 0 auto;
        opacity: 0.95;
        animation: fadeInUp 0.8s ease-out 0.2s backwards;
    }

    .portfolio-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 4rem 2rem;
    }

    .filter-buttons {
        display: flex;
        gap: 1rem;
        justify-content: center;
        flex-wrap: wrap;
        margin-bottom: 4rem;
        animation: fadeIn 1s ease-out;
    }

    .filter-btn {
        padding: 0.9rem 2rem;
        background: var(--white);
        border: 2px solid var(--pastel-blue);
        border-radius: 50px;
        color: var(--dark);
        font-weight: 600;
        font-size: 1.05rem;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
    }

    .filter-btn:hover,
    .filter-btn.active {
        background: linear-gradient(135deg, var(--pastel-blue), var(--pastel-green));
        color: var(--white);
        border-color: transparent;
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }

    .portfolio-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 2.5rem;
        margin-bottom: 4rem;
    }

    .portfolio-item {
        background: var(--white);
        border-radius: 25px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        transition: all 0.4s ease;
        cursor: pointer;
        animation: fadeInScale 0.6s ease-out backwards;
    }

    .portfolio-item:nth-child(1) { animation-delay: 0.1s; }
    .portfolio-item:nth-child(2) { animation-delay: 0.2s; }
    .portfolio-item:nth-child(3) { animation-delay: 0.3s; }
    .portfolio-item:nth-child(4) { animation-delay: 0.4s; }
    .portfolio-item:nth-child(5) { animation-delay: 0.5s; }
    .portfolio-item:nth-child(6) { animation-delay: 0.6s; }

    @keyframes fadeInScale {
        from {
            opacity: 0;
            transform: scale(0.9);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    .portfolio-item:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.2);
    }

    .portfolio-image-wrapper {
        position: relative;
        width: 100%;
        height: 300px;
        overflow: hidden;
    }

    .portfolio-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .portfolio-item:hover .portfolio-image {
        transform: scale(1.15);
    }

    .portfolio-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(168, 216, 234, 0.9), rgba(184, 224, 210, 0.9));
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.4s ease;
    }

    .portfolio-item:hover .portfolio-overlay {
        opacity: 1;
    }

    .overlay-icon {
        font-size: 3rem;
        color: var(--white);
        animation: zoomIn 0.3s ease;
    }

    @keyframes zoomIn {
        from {
            transform: scale(0);
        }
        to {
            transform: scale(1);
        }
    }

    .portfolio-details {
        padding: 2rem;
    }

    .portfolio-category {
        display: inline-block;
        background: linear-gradient(135deg, var(--pastel-blue), var(--pastel-green));
        color: var(--white);
        padding: 0.5rem 1.2rem;
        border-radius: 20px;
        font-size: 0.9rem;
        font-weight: 600;
        margin-bottom: 1rem;
    }

    .portfolio-title {
        font-family: 'Playfair Display', sans-serif;
        font-size: 1.7rem;
        color: var(--dark);
        margin-bottom: 0.8rem;
    }

    .portfolio-description {
        color: var(--dark);
        opacity: 0.7;
        line-height: 1.8;
        margin-bottom: 1rem;
    }

    .portfolio-meta {
        display: flex;
        gap: 1.5rem;
        align-items: center;
        color: var(--dark);
        opacity: 0.6;
        font-size: 0.95rem;
    }

    .portfolio-meta i {
        color: var(--pastel-blue);
    }

    .pagination {
        display: flex;
        justify-content: center;
        gap: 0.5rem;
        margin-top: 3rem;
    }

    .pagination a,
    .pagination span {
        padding: 0.8rem 1.2rem;
        background: var(--white);
        border: 2px solid var(--pastel-blue);
        border-radius: 10px;
        color: var(--dark);
        text-decoration: none;
        transition: all 0.3s ease;
        font-weight: 500;
    }

    .pagination a:hover,
    .pagination span.active {
        background: linear-gradient(135deg, var(--pastel-blue), var(--pastel-green));
        color: var(--white);
        border-color: transparent;
    }

    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        color: var(--dark);
        opacity: 0.6;
    }

    .empty-state i {
        font-size: 5rem;
        margin-bottom: 1.5rem;
        color: var(--pastel-blue);
    }

    .empty-state h3 {
        font-family: 'Playfair Display', sans-serif;
        font-size: 2rem;
        margin-bottom: 1rem;
    }

    @media (max-width: 768px) {
        .portfolio-hero {
            padding: 4rem 1.2rem 2rem;
        }

        .portfolio-hero h1 {
            font-size: 2.2rem; 
            margin-bottom: 1rem;
        }

        .filter-buttons {
            display: flex;
            flex-wrap: nowrap; 
            overflow-x: auto; 
            gap: 0.8rem;
            padding: 0.5rem 1.2rem 1rem 1.2rem; 
            justify-content: flex-start; 
            -ms-overflow-style: none; 
            scrollbar-width: none; 
        }

        .filter-buttons::-webkit-scrollbar {
            display: none;
        }

        .filter-btn {
            padding: 0.6rem 1.5rem;
            font-size: 0.95rem;
            white-space: nowrap; 
            flex-shrink: 0; 
        }

        .portfolio-section { 
            padding: 2rem 1.2rem;
        }

        .portfolio-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem; 
        }
    }
</style>
@endsection

@section('content')
<!-- Hero Section -->
<section class="portfolio-hero">
    <h1>Portofolio Kami</h1>
    <p>Lihat koleksi karya terbaik kami yang telah dipercaya oleh berbagai klien</p>
</section>

<!-- Portfolio Container -->
<div class="portfolio-container">
    <!-- Filter Buttons -->
    <div class="filter-buttons" style="font-family: 'Playfair Display', serif;">
        <a href="{{ route('portfolio.index') }}" class="filter-btn {{ !request('category') || request('category') == 'all' ? 'active' : '' }}">
            <i class="fas fa-th"></i> Semua
        </a>

        @foreach($categories as $category)
            <a href="{{ route('portfolio.index', ['category' => $category->title]) }}" 
            class="filter-btn {{ request('category') == $category->title ? 'active' : '' }}">
                <i class="fas fa-tag"></i> {{ $category->title }}
            </a>
        @endforeach
    </div>

    <!-- Portfolio Grid -->
    <div class="portfolio-grid">
        @forelse($portfolios as $portfolio)
        <div class="portfolio-item" onclick="window.location='{{ route('portfolio.show', $portfolio->id) }}'">
            <div class="portfolio-image-wrapper">
                <img src="{{ asset($portfolio->image_path) }}" alt="{{ $portfolio->title }}" class="portfolio-image" onerror="this.src='https://via.placeholder.com/400x300/A8D8EA/FFFFFF?text={{ urlencode($portfolio->title) }}'">
                
                <div class="portfolio-overlay">
                    <i class="fas fa-search-plus overlay-icon"></i>
                </div>
            </div>
            <div class="portfolio-details">
                <span class="portfolio-category">
                    <i class="fas fa-tag"></i> {{ ucfirst($portfolio->category) }}
                </span>
                <h3 class="portfolio-title">{{ $portfolio->title }}</h3>
                <p class="portfolio-description">{{ Str::limit($portfolio->description, 120) }}</p>
                <div class="portfolio-meta">
                    @if($portfolio->client_name)
                        <span><i class="fas fa-user"></i> {{ $portfolio->client_name }}</span>
                    @endif
                    @if($portfolio->project_date)
                        <span><i class="fas fa-calendar"></i> {{ $portfolio->project_date->format('M Y') }}</span>
                    @endif
                </div>
            </div>
        </div>
        @empty
        <div class="empty-state" style="grid-column: 1 / -1;">
            <i class="fas fa-folder-open"></i>
            <h3>Belum Ada Portofolio</h3>
            <p>Saat ini belum ada portofolio yang tersedia. Silakan kembali lagi nanti!</p>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($portfolios->hasPages())
    <div class="pagination">
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