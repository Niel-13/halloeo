@extends('admin.layout')

@section('title', 'Kelola Portfolio')
@section('page-title', 'Kelola Portfolio')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
    <div>
        <h3 style="font-family: 'Fredoka', sans-serif;">Daftar Portfolio</h3>
        <p style="color: #7f8c8d;">Total: {{ $portfolios->total() }} karya</p>
    </div>
    <a href="{{ route('admin.portfolio.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Tambah Portfolio
    </a>
</div>

<div class="card">
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Gambar</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Featured</th>
                    <th style="text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($portfolios as $portfolio)
                <tr>
                    <td>
                        @if($portfolio->image_path)
                            <img src="{{ asset('storage/' . $portfolio->image_path) }}" alt="{{ $portfolio->title }}" style="width: 80px; height: 60px; object-fit: cover; border-radius: 4px;">
                        @else
                            <div style="width: 80px; height: 60px; background: #eee; border-radius: 4px; display: flex; align-items: center; justify-content: center; color: #aaa;">
                                <i class="fas fa-image"></i>
                            </div>
                        @endif
                    </td>
                    <td><strong>{{ $portfolio->title }}</strong></td>
                    <td><span class="badge badge-primary">{{ ucfirst($portfolio->category) }}</span></td>
                    <td>
                        <form action="{{ route('admin.portfolio.toggle-featured', $portfolio->id) }}" method="POST" style="margin: 0;">
                            @csrf
                            <button type="submit" class="badge {{ $portfolio->is_featured ? 'badge-success' : 'badge-warning' }}" style="border: none; cursor: pointer;">
                                {{ $portfolio->is_featured ? 'Yes' : 'No' }}
                            </button>
                        </form>
                    </td>
                    <td style="text-align: center;">
                        <div style="display: flex; gap: 0.5rem; justify-content: center;">
                            <a href="{{ route('admin.portfolio.edit', $portfolio->id) }}" class="btn" style="padding: 0.5rem 1rem; background: var(--pastel-blue); color: white;" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.portfolio.destroy', $portfolio->id) }}" method="POST" style="margin: 0;" onsubmit="return confirm('Yakin ingin menghapus portfolio ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn" style="padding: 0.5rem 1rem; background: var(--dark-pastel-red); color: white;" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align: center; padding: 3rem; color: #999;">
                        <i class="fas fa-images" style="font-size: 3rem; color: #ccc; margin-bottom: 1rem;"></i>
                        <p>Belum ada data portfolio.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($portfolios->hasPages())
    <div style="padding: 1.5rem; border-top: 1px solid var(--light);">
        {{ $portfolios->links() }}
    </div>
    @endif
</div>
@endsection