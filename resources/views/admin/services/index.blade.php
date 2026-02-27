@extends('admin.layout')

@section('title', 'Kelola Layanan')
@section('page-title', 'Kelola Layanan')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
    <div>
        <h3 style="font-family: 'Playfair Display', sans-serif;">Daftar Layanan HalloEO</h3>
        <p style="color: #7f8c8d;">Total: {{ $services->total() }} layanan aktif</p>
    </div>
    <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Tambah Layanan
    </a>
</div>

<div class="card">
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Gambar</th>
                    <th>Ikon</th>
                    <th>Judul Layanan</th>
                    <th>Deskripsi Singkat</th>
                    <th style="text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($services as $service)
                <tr>
                    <td>
                        @if($service->image_path)
                            <img src="{{ asset('storage/' . $service->image_path) }}" alt="{{ $service->title }}" style="width: 80px; height: 60px; object-fit: cover; border-radius: 8px;">
                        @else
                            <div style="width: 80px; height: 60px; background: #eee; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #aaa;">
                                <i class="fas fa-image"></i>
                            </div>
                        @endif
                    </td>
                    <td style="text-align: center; font-size: 1.5rem; color: var(--pastel-blue);">
                        <i class="{{ $service->icon }}"></i>
                    </td>
                    <td><strong>{{ $service->title }}</strong></td>
                    <td>{{ Str::limit($service->description, 50) }}</td>
                    <td style="text-align: center;">
                        <div style="display: flex; gap: 0.5rem; justify-content: center;">
                            <a href="{{ route('admin.services.edit', $service->id) }}" class="btn" style="padding: 0.5rem 1rem; background: var(--pastel-blue); color: white;" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" style="margin: 0;" onsubmit="return confirm('Yakin ingin menghapus layanan ini?')">
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
                        <i class="fas fa-concierge-bell" style="font-size: 3rem; color: #ccc; margin-bottom: 1rem;"></i>
                        <p>Belum ada data layanan. Silakan tambah baru.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($services->hasPages())
    <div style="padding: 1.5rem; border-top: 1px solid var(--light);">
        {{ $services->links() }}
    </div>
    @endif
</div>
@endsection