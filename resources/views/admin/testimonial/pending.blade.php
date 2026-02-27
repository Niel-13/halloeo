@extends('admin.layout')

@section('title', 'Review Testimonial')
@section('page-title', 'Review Testimonial')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
    <div>
        <h3 style="font-family: 'Playfair Display', sans-serif; color: var(--dark-pastel-red);">
            <i class="fas fa-clock"></i> Menunggu Review
        </h3>
        <p style="color: #7f8c8d;">Anda memiliki {{ $pendingCount }} testimonial yang perlu diperiksa.</p>
    </div>
</div>

<div class="card">
    <div style="padding: 1rem; border-bottom: 1px solid var(--light); display: flex; gap: 1rem;">
        <a href="{{ route('admin.testimonials.index') }}" 
           class="btn"
           style="background: #e0e0e0; color: var(--dark);">
            <i class="fas fa-list"></i> Semua
        </a>
        <a href="{{ route('admin.testimonials.pending') }}" 
           class="btn btn-primary">
            <i class="fas fa-clock"></i> Pending ({{ $pendingCount }})
        </a>
    </div>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Perusahaan</th>
                    <th>Rating</th>
                    <th>Pesan</th>
                    <th>Tanggal</th>
                    <th style="width: 200px; text-align: center;">Aksi Review</th>
                </tr>
            </thead>
            <tbody>
                @forelse($testimonials as $testimonial)
                <tr style="background-color: #fffaf0;"> <td>
                        <div style="display: flex; align-items: center; gap: 0.8rem;">
                            <div style="width: 40px; height: 40px; background: linear-gradient(135deg, var(--dark-pastel-red), #ffb347); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold;">
                                {{ strtoupper(substr($testimonial->name, 0, 1)) }}
                            </div>
                            <strong>{{ $testimonial->name }}</strong>
                        </div>
                    </td>
                    <td>{{ $testimonial->company ?? '-' }}</td>
                    <td>
                        @for($i = 0; $i < $testimonial->rating; $i++)
                            <i class="fas fa-star" style="color: #FFD700;"></i>
                        @endfor
                        <span style="color: #7f8c8d;">({{ $testimonial->rating }})</span>
                    </td>
                    <td>{{ Str::limit($testimonial->message, 60) }}</td>
                    <td>{{ $testimonial->created_at->format('d M Y') }}</td>
                    <td style="text-align: center;">
                        <div style="display: flex; gap: 0.5rem; justify-content: center;">
                            <form action="{{ route('admin.testimonials.approve', $testimonial->id) }}" method="POST" style="margin: 0;">
                                @csrf
                                <button type="submit" class="btn" style="padding: 0.5rem 1rem; background: #28a745; color: white;" title="Setujui Testimonial">
                                    <i class="fas fa-check"></i> Setujui
                                </button>
                            </form>

                            <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}" method="POST" style="margin: 0;" onsubmit="return confirm('Yakin ingin menolak dan menghapus testimonial ini secara permanen?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn" style="padding: 0.5rem 1rem; background: var(--dark-pastel-red); color: white;" title="Tolak & Hapus">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align: center; padding: 4rem 2rem;">
                        <div style="display: inline-flex; align-items: center; justify-content: center; width: 80px; height: 80px; background: #d4edda; border-radius: 50%; margin-bottom: 1rem;">
                            <i class="fas fa-check" style="font-size: 2.5rem; color: #28a745;"></i>
                        </div>
                        <h3 style="color: var(--dark); margin-bottom: 0.5rem;">Semua Beres!</h3>
                        <p style="color: #999;">Tidak ada testimonial yang menunggu untuk di-review saat ini.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($testimonials->hasPages())
    <div style="padding: 1.5rem; border-top: 1px solid var(--light);">
        {{ $testimonials->links() }}
    </div>
    @endif
</div>

<div class="card" style="margin-top: 1.5rem; background: #e2f0fb; border-left: 4px solid var(--pastel-blue);">
    <p style="margin: 0; color: #0c5460;">
        <i class="fas fa-lightbulb"></i> 
        <strong>Tips:</strong> Baca ulasan dengan seksama. Jika Anda klik "Setujui", ulasan tersebut akan langsung bisa dilihat oleh pengunjung di halaman depan website HalloEO.
    </p>
</div>
@endsection