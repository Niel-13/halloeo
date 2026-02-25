@extends('admin.layout')

@section('title', 'Edit Layanan')
@section('page-title', 'Edit Layanan')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
    <div>
        <h3 style="font-family: 'Fredoka', sans-serif;">Edit Data Layanan</h3>
        <p style="color: #7f8c8d;">Perbarui informasi layanan HalloEO di bawah ini.</p>
    </div>
    <a href="{{ route('admin.services.index') }}" class="btn" style="background: #6c757d; color: white;">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>

<div class="card" style="max-width: 800px; margin: 0 auto;">
    <form action="{{ route('admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 1.5rem;">
            <div class="form-group">
                <label for="title">Nama Layanan <span style="color: red;">*</span></label>
                <input type="text" id="title" name="title" value="{{ old('title', $service->title) }}" required>
            </div>

            <div class="form-group">
                <label for="icon">Ikon (FontAwesome) <span style="color: red;">*</span></label>
                <div style="display: flex; gap: 0.5rem; align-items: center;">
                    <i class="{{ $service->icon }}" style="font-size: 1.5rem; color: var(--pastel-blue);"></i>
                    <input type="text" id="icon" name="icon" value="{{ old('icon', $service->icon) }}" required>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="description">Deskripsi Singkat <span style="color: red;">*</span></label>
            <textarea id="description" name="description" required style="min-height: 100px;">{{ old('description', $service->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="features">Daftar Fitur Utama (Opsional)</label>
            <textarea id="features" name="features" style="min-height: 120px;">{{ old('features', $service->features) }}</textarea>
            <p style="font-size: 0.85rem; color: #7f8c8d; margin-top: 0.5rem;">
                <i class="fas fa-info-circle"></i> Pisahkan setiap fitur dengan <strong>Enter (baris baru)</strong>.
            </p>
        </div>

        <div class="form-group" style="background: var(--light); padding: 1.5rem; border-radius: 8px;">
            <label for="image">Gambar Layanan</label>
            
            @if($service->image_path)
                <div style="margin-bottom: 1rem;">
                    <img src="{{ asset('storage/' . $service->image_path) }}" alt="Preview" style="max-width: 200px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                </div>
            @endif

            <input type="file" id="image" name="image" accept="image/jpeg,image/png,image/jpg" style="background: white;">
            <p style="font-size: 0.85rem; color: #7f8c8d; margin-top: 0.5rem;">Biarkan kosong jika tidak ingin mengubah gambar.</p>
        </div>

        <div style="text-align: right; margin-top: 2rem;">
            <button type="submit" class="btn btn-primary" style="padding: 0.8rem 2rem; font-size: 1.1rem;">
                <i class="fas fa-save"></i> Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection     