@extends('admin.layout')

@section('title', 'Kelola Galeri')
@section('page-title', 'Galeri Dokumentasi')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
    <div>
        <h3 style="font-family: 'Playfair Display', sans-serif;">Daftar Galeri</h3>
        <p style="color: #7f8c8d;">Kelola foto dan video untuk ditampilkan di halaman utama.</p>
    </div>
    <a href="{{ route('admin.galleries.create') }}" class="btn btn-primary">
        <i class="fas fa-upload"></i> Upload File Baru
    </a>
</div>

<div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 1.5rem;">
    @forelse($galleries as $gallery)
    <div class="card" style="padding: 0; overflow: hidden; position: relative; aspect-ratio: 1/1;">
        @if($gallery->type == 'video')
            <video src="{{ asset('storage/' . $gallery->file_path) }}" style="width: 100%; height: 100%; object-fit: cover;" muted></video>
            <div style="position: absolute; top: 10px; left: 10px; background: rgba(0,0,0,0.6); color: white; padding: 0.2rem 0.5rem; border-radius: 5px; font-size: 0.8rem;">
                <i class="fas fa-video"></i> Video
            </div>
        @else
            <img src="{{ asset('storage/' . $gallery->file_path) }}" style="width: 100%; height: 100%; object-fit: cover;">
            <div style="position: absolute; top: 10px; left: 10px; background: rgba(0,0,0,0.6); color: white; padding: 0.2rem 0.5rem; border-radius: 5px; font-size: 0.8rem;">
                <i class="fas fa-image"></i> Gambar
            </div>
        @endif

        <form action="{{ route('admin.galleries.destroy', $gallery->id) }}" method="POST" style="position: absolute; bottom: 10px; right: 10px; margin: 0;" onsubmit="return confirm('Yakin ingin menghapus file ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" style="padding: 0.5rem; border-radius: 50%;">
                <i class="fas fa-trash"></i>
            </button>
        </form>
        <form action="{{ route('admin.galleries.toggle', $gallery->id) }}" method="POST" style="position: absolute; top: 10px; right: 10px; margin: 0;">
            @csrf
            <button type="submit" style="padding: 0.3rem 0.8rem; border-radius: 5px; background: {{ $gallery->is_visible ? '#28a745' : '#dc3545' }}; color: white; border: none; cursor: pointer; font-size: 0.85rem; font-family: 'Outfit', sans-serif;">
                <i class="fas {{ $gallery->is_visible ? 'fa-eye' : 'fa-eye-slash' }}"></i> 
                {{ $gallery->is_visible ? 'Tampil' : 'Sembunyi' }}
            </button>
        </form>
    </div>
    @empty
    <div style="grid-column: 1 / -1; text-align: center; padding: 3rem; background: white; border-radius: 15px;">
        <i class="fas fa-photo-video" style="font-size: 3rem; color: #ccc; margin-bottom: 1rem;"></i>
        <p style="color: #999;">Belum ada foto atau video di galeri.</p>
    </div>
    @endforelse
</div>

<div style="margin-top: 2rem;">
    {{ $galleries->links() }}
</div>
@endsection