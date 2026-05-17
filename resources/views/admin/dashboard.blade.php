@extends('admin.layout')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('styles')
    .dashboard-hero {
        display: grid;
        grid-template-columns: minmax(0, 1.4fr) minmax(280px, 0.6fr);
        gap: 1.25rem;
        margin-bottom: 1.35rem;
    }

    .welcome-panel {
        position: relative;
        overflow: hidden;
        padding: clamp(1.35rem, 3vw, 2rem);
        border-radius: 26px;
        background:
            radial-gradient(circle at top right, rgba(197, 154, 59, 0.18), transparent 18rem),
            linear-gradient(135deg, #0B3F3A 0%, #072A27 100%);
        color: #FFFFFF;
        box-shadow: var(--shadow-sm);
    }

    .welcome-panel::after {
        content: '';
        position: absolute;
        width: 12rem;
        height: 12rem;
        right: -4.2rem;
        bottom: -5rem;
        border-radius: 999px;
        background: rgba(255,255,255,0.09);
    }

    .welcome-panel > * {
        position: relative;
        z-index: 1;
    }

    .welcome-kicker {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.38rem 0.7rem;
        border: 1px solid rgba(255,255,255,0.16);
        border-radius: 999px;
        background: rgba(255,255,255,0.08);
        color: rgba(255,255,255,0.75);
        font-size: 0.76rem;
        font-weight: 800;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        margin-bottom: 1rem;
    }

    .welcome-panel h3 {
        max-width: 42rem;
        margin-bottom: 0.75rem;
        font-size: clamp(1.65rem, 3vw, 2.45rem);
        line-height: 1.1;
        letter-spacing: -0.06em;
    }

    .welcome-panel p {
        max-width: 42rem;
        color: rgba(255,255,255,0.72);
        line-height: 1.75;
    }

    .welcome-actions {
        display: flex;
        gap: 0.8rem;
        flex-wrap: wrap;
        margin-top: 1.35rem;
    }

    .welcome-actions .btn-secondary {
        background: rgba(255,255,255,0.1);
        border-color: rgba(255,255,255,0.14);
        color: #FFFFFF;
    }

    .review-panel {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        gap: 1rem;
        min-height: 100%;
        padding: 1.35rem;
        border-radius: 26px;
        background: var(--surface);
        border: 1px solid var(--line);
        box-shadow: var(--shadow-sm);
    }

    .review-panel .icon-box {
        width: 48px;
        height: 48px;
        border-radius: 16px;
        background: var(--brand-gold-soft);
        color: var(--brand-gold-dark);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1.15rem;
        margin-bottom: 1rem;
    }

    .review-panel h3 {
        color: var(--ink);
        font-size: 1.05rem;
        margin-bottom: 0.3rem;
    }

    .review-panel p {
        color: var(--muted);
        line-height: 1.6;
    }

    .review-number {
        font-size: 2.2rem;
        font-weight: 800;
        letter-spacing: -0.06em;
        color: var(--ink);
    }

    .panel-list {
        display: grid;
        gap: 0.8rem;
    }

    .list-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
        padding: 0.85rem;
        border: 1px solid var(--line);
        border-radius: 16px;
        background: var(--surface-soft);
    }

    .list-main {
        min-width: 0;
    }

    .list-main strong {
        display: block;
        color: var(--ink);
        font-size: 0.94rem;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 260px;
    }

    .list-main span {
        display: block;
        color: var(--muted);
        font-size: 0.82rem;
        margin-top: 0.18rem;
    }

    .stars {
        white-space: nowrap;
        color: var(--brand-gold);
        font-size: 0.85rem;
    }

    .quick-card {
        margin-top: 1.35rem;
        background:
            radial-gradient(circle at top right, rgba(221, 243, 239, 0.9), transparent 20rem),
            var(--surface);
    }

    @media (max-width: 980px) {
        .dashboard-hero {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 560px) {
        .welcome-actions,
        .quick-action-grid {
            display: grid;
        }

        .welcome-actions .btn,
        .quick-action-grid .btn {
            width: 100%;
        }
    }
@endsection

@section('content')
<div class="dashboard-hero">
    <div class="welcome-panel">
        <span class="welcome-kicker"><i class="fas fa-briefcase"></i> HalloEO Workspace</span>
        <h3>Selamat datang kembali, {{ auth()->user()->name ?? 'Admin' }}.</h3>
        <p>Gunakan panel ini untuk menjaga portfolio, layanan, galeri, pesan, dan testimonial tetap rapi. Tampilan dibuat lebih tenang agar admin bisa bekerja nyaman dalam waktu lama.</p>

        <div class="welcome-actions">
            <a href="{{ route('admin.portfolio.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i>
                Tambah Portfolio
            </a>
            <a href="{{ route('home') }}" target="_blank" rel="noopener" class="btn btn-secondary">
                <i class="fas fa-up-right-from-square"></i>
                Lihat Website
            </a>
        </div>
    </div>

    <div class="review-panel">
        <div>
            <div class="icon-box"><i class="fas fa-clock"></i></div>
            <h3>Perlu Review</h3>
            <p>Testimonial yang belum disetujui dan perlu dicek sebelum tampil di website.</p>
        </div>
        <div>
            <div class="review-number">{{ $stats['pending_testimonials'] }}</div>
            <a href="{{ route('admin.testimonials.pending') }}" class="btn btn-warning" style="margin-top: 0.65rem;">
                Review Sekarang
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</div>

<div class="dashboard-grid">
    <div class="stat-card teal">
        <div class="stat-card-content">
            <div class="stat-card-top">
                <div>
                    <div class="stat-label">Total Portfolio</div>
                    <div class="stat-value">{{ $stats['total_portfolios'] }}</div>
                </div>
                <div class="stat-icon"><i class="fas fa-layer-group"></i></div>
            </div>
            <a href="{{ route('admin.portfolio.index') }}" class="stat-footer">
                {{ $stats['featured_portfolios'] }} featured
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>

    <div class="stat-card gold">
        <div class="stat-card-content">
            <div class="stat-card-top">
                <div>
                    <div class="stat-label">Total Testimonial</div>
                    <div class="stat-value">{{ $stats['total_testimonials'] }}</div>
                </div>
                <div class="stat-icon"><i class="fas fa-star"></i></div>
            </div>
            <a href="{{ route('admin.testimonials.index') }}" class="stat-footer">
                {{ $stats['approved_testimonials'] }} approved
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>

    <div class="stat-card coral">
        <div class="stat-card-content">
            <div class="stat-card-top">
                <div>
                    <div class="stat-label">Pending Review</div>
                    <div class="stat-value">{{ $stats['pending_testimonials'] }}</div>
                </div>
                <div class="stat-icon"><i class="fas fa-inbox"></i></div>
            </div>
            <a href="{{ route('admin.testimonials.pending') }}" class="stat-footer">
                Lihat pending
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</div>

<div class="dashboard-two-col">
    <div class="card">
        <div class="card-header">
            <h3><i class="fas fa-images"></i> Portfolio Terbaru</h3>
            <p>Ringkasan karya terbaru yang sudah masuk ke website.</p>
        </div>

        <div class="panel-list">
            @forelse($recentPortfolios as $portfolio)
                <div class="list-row">
                    <div class="list-main">
                        <strong>{{ Str::limit($portfolio->title, 42) }}</strong>
                        <span>{{ ucfirst($portfolio->category) }}</span>
                    </div>
                    @if($portfolio->is_featured)
                        <span class="badge badge-success">Featured</span>
                    @else
                        <span class="badge badge-warning">Regular</span>
                    @endif
                </div>
            @empty
                <div class="empty-state">
                    <i class="fas fa-folder-open"></i>
                    <p>Belum ada portfolio.</p>
                </div>
            @endforelse
        </div>

        <div style="margin-top: 1rem; display: flex; justify-content: flex-end;">
            <a href="{{ route('admin.portfolio.index') }}" class="btn btn-secondary">
                Kelola Portfolio
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3><i class="fas fa-comments"></i> Testimonial Terbaru</h3>
            <p>Ulasan terbaru dari klien yang perlu dipantau.</p>
        </div>

        <div class="panel-list">
            @forelse($recentTestimonials as $testi)
                <div class="list-row">
                    <div class="list-main">
                        <strong>{{ $testi->name }}</strong>
                        <span class="stars">
                            @for($i = 0; $i < $testi->rating; $i++)
                                <i class="fas fa-star"></i>
                            @endfor
                        </span>
                    </div>
                    @if($testi->is_approved)
                        <span class="badge badge-success">Approved</span>
                    @else
                        <span class="badge badge-warning">Pending</span>
                    @endif
                </div>
            @empty
                <div class="empty-state">
                    <i class="fas fa-message"></i>
                    <p>Belum ada testimonial.</p>
                </div>
            @endforelse
        </div>

        <div style="margin-top: 1rem; display: flex; justify-content: flex-end;">
            <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">
                Kelola Testimonial
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</div>

<div class="card quick-card">
    <div class="card-header">
        <h3><i class="fas fa-bolt"></i> Aksi Cepat</h3>
        <p>Shortcut untuk pekerjaan admin yang paling sering dilakukan.</p>
    </div>
    <div class="quick-action-grid">
        <a href="{{ route('admin.portfolio.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i>
            Tambah Portfolio Baru
        </a>
        <a href="{{ route('admin.testimonials.pending') }}" class="btn btn-warning">
            <i class="fas fa-clock"></i>
            Review Testimonial ({{ $stats['pending_testimonials'] }})
        </a>
        <a href="{{ route('home') }}" target="_blank" rel="noopener" class="btn btn-secondary">
            <i class="fas fa-globe"></i>
            Buka Website
        </a>
    </div>
</div>
@endsection
