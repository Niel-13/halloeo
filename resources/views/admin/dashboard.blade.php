@extends('admin.layout')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem; margin-bottom: 2rem;">
    <div class="card" style="background: var(--pastel-blue);">
        <div style="color: white;">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <p style="opacity: 0.9; margin-bottom: 0.5rem;">Total Portfolio</p>
                    <h2 style="font-family: 'Playfair Display', sans-serif; font-size: 3rem;">{{ $stats['total_portfolios'] }}</h2>
                </div>
                <i class="fas fa-images" style="font-size: 3rem; opacity: 0.3;"></i>
            </div>
            <p style="margin-top: 1rem; opacity: 0.8;">
                <i class="fas fa-star"></i> {{ $stats['featured_portfolios'] }} Featured
            </p>
        </div>
    </div>

    <div class="card" style="background: var(--pastel-green);">
        <div style="color: white;">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <p style="opacity: 0.9; margin-bottom: 0.5rem;">Total Testimonial</p>
                    <h2 style="font-family: 'Playfair Display', sans-serif; font-size: 3rem;">{{ $stats['total_testimonials'] }}</h2>
                </div>
                <i class="fas fa-star" style="font-size: 3rem; opacity: 0.3;"></i>
            </div>
            <p style="margin-top: 1rem; opacity: 0.8;">
                <i class="fas fa-check-circle"></i> {{ $stats['approved_testimonials'] }} Approved
            </p>
        </div>
    </div>

    <div class="card" style="background: var(--dark-pastel-red);">
        <div style="color: white;">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <p style="opacity: 0.9; margin-bottom: 0.5rem;">Pending Review</p>
                    <h2 style="font-family: 'Playfair Display', sans-serif; font-size: 3rem;">{{ $stats['pending_testimonials'] }}</h2>
                </div>
                <i class="fas fa-clock" style="font-size: 3rem; opacity: 0.3;"></i>
            </div>
            <a href="{{ route('admin.testimonials.pending') }}" style="margin-top: 1rem; display: inline-block; color: white; opacity: 0.9; text-decoration: underline;">
                Lihat Pending <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</div>

<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
    <div class="card">
        <div class="card-header">
            <h3><i class="fas fa-images"></i> Portfolio Terbaru</h3>
        </div>
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Featured</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentPortfolios as $portfolio)
                    <tr>
                        <td>{{ Str::limit($portfolio->title, 30) }}</td>
                        <td><span class="badge badge-primary">{{ ucfirst($portfolio->category) }}</span></td>
                        <td>
                            @if($portfolio->is_featured)
                                <span class="badge badge-success">Yes</span>
                            @else
                                <span class="badge badge-warning">No</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" style="text-align: center; padding: 2rem; color: #999;">
                            Belum ada portfolio
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div style="text-align: center; margin-top: 1rem;">
            <a href="{{ route('admin.portfolio.index') }}" class="btn btn-primary">
                Lihat Semua Portfolio <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3><i class="fas fa-star"></i> Testimonial Terbaru</h3>
        </div>
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Rating</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentTestimonials as $testi)
                    <tr>
                        <td>{{ $testi->name }}</td>
                        <td>
                            @for($i = 0; $i < $testi->rating; $i++)
                                <i class="fas fa-star" style="color: #FFD700;"></i>
                            @endfor
                        </td>
                        <td>
                            @if($testi->is_approved)
                                <span class="badge badge-success">Approved</span>
                            @else
                                <span class="badge badge-warning">Pending</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" style="text-align: center; padding: 2rem; color: #999;">
                            Belum ada testimonial
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div style="text-align: center; margin-top: 1rem;">
            <a href="{{ route('admin.testimonials.index') }}" class="btn btn-primary">
                Lihat Semua Testimonial <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</div>

<div class="card" style="margin-top: 2rem;">
    <div class="card-header">
        <h3><i class="fas fa-bolt"></i> Quick Actions</h3>
    </div>
    <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
        <a href="{{ route('admin.portfolio.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Portfolio Baru
        </a>
        <a href="{{ route('admin.testimonials.pending') }}" class="btn" style="background: var(--dark-pastel-red); color: white;">
            <i class="fas fa-clock"></i> Review Testimonial ({{ $stats['pending_testimonials'] }})
        </a>
        <a href="{{ route('home') }}" target="_blank" class="btn" style="background: var(--dark); color: white;">
            <i class="fas fa-globe"></i> Lihat Website
        </a>
    </div>
</div>
@endsection