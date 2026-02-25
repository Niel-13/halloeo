@extends('admin.layout')

@section('title', 'Manage Testimonials')
@section('page-title', 'Manage Testimonials')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
    <div>
        <h3 style="font-family: 'Fredoka', sans-serif;">Daftar Testimonial</h3>
        <p style="color: #7f8c8d;">Total: {{ $testimonials->total() }} testimonial</p>
    </div>
    <a href="{{ route('admin.testimonials.pending') }}" class="btn btn-primary">
        <i class="fas fa-clock"></i> Pending Review ({{ $pendingCount }})
    </a>
</div>

<div class="card">
    <div style="padding: 1rem; border-bottom: 1px solid var(--light); display: flex; gap: 1rem;">
        <a href="{{ route('admin.testimonials.index') }}" 
           class="btn {{ !request()->routeIs('admin.testimonials.pending') ? 'btn-primary' : '' }}"
           style="{{ request()->routeIs('admin.testimonials.pending') ? 'background: #e0e0e0; color: var(--dark);' : '' }}">
            <i class="fas fa-list"></i> Semua
        </a>
        <a href="{{ route('admin.testimonials.pending') }}" 
           class="btn {{ request()->routeIs('admin.testimonials.pending') ? 'btn-primary' : '' }}"
           style="{{ !request()->routeIs('admin.testimonials.pending') ? 'background: #e0e0e0; color: var(--dark);' : '' }}">
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
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th style="width: 200px; text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($testimonials as $testimonial)
                <tr>
                    <td>
                        <div style="display: flex; align-items: center; gap: 0.8rem;">
                            <div style="width: 40px; height: 40px; background: linear-gradient(135deg, var(--pastel-blue), var(--pastel-green)); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold;">
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
                    <td>{{ Str::limit($testimonial->message, 50) }}</td>
                    <td>
                        @if($testimonial->is_approved)
                            <span class="badge badge-success">Approved</span>
                        @else
                            <span class="badge badge-warning">Pending</span>
                        @endif
                    </td>
                    <td>{{ $testimonial->created_at->format('d M Y') }}</td>
                    <td style="text-align: center;">
                        <div style="display: flex; gap: 0.5rem; justify-content: center;">
                            @if(!$testimonial->is_approved)
                            <form action="{{ route('admin.testimonials.approve', $testimonial->id) }}" 
                                  method="POST" 
                                  style="margin: 0;">
                                @csrf
                                <button type="submit" 
                                        class="btn" 
                                        style="padding: 0.5rem 1rem; background: #28a745; color: white;"
                                        title="Approve">
                                    <i class="fas fa-check"></i>
                                </button>
                            </form>
                            @else
                            <form action="{{ route('admin.testimonials.reject', $testimonial->id) }}" 
                                  method="POST" 
                                  style="margin: 0;">
                                @csrf
                                <button type="submit" 
                                        class="btn" 
                                        style="padding: 0.5rem 1rem; background: #ffc107; color: white;"
                                        title="Unapprove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </form>
                            @endif

                            <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}" 
                                  method="POST" 
                                  style="margin: 0;"
                                  onsubmit="return confirm('Yakin ingin menghapus testimonial ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="btn" 
                                        style="padding: 0.5rem 1rem; background: var(--dark-pastel-red); color: white;"
                                        title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" style="text-align: center; padding: 3rem;">
                        <i class="fas fa-comments" style="font-size: 3rem; color: #ccc; margin-bottom: 1rem;"></i>
                        <p style="color: #999;">Belum ada testimonial</p>
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


<div class="card" style="margin-top: 1.5rem; background: #fff3cd; border-left: 4px solid #ffc107;">
    <p style="margin: 0; color: #856404;">
        <i class="fas fa-info-circle"></i> 
        <strong>Info:</strong> Testimonial yang disetujui akan otomatis tampil di homepage website.
    </p>
</div>
@endsection