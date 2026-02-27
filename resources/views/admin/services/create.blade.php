@extends('admin.layout')

@section('title', 'Tambah Layanan Baru')
@section('page-title', 'Tambah Layanan')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
    <div>
        <h3 style="font-family: 'Playfair Display', sans-serif;">Tambah Layanan Baru</h3>
        <p style="color: #7f8c8d;">Masukkan detail layanan yang ditawarkan HalloEO.</p>
    </div>
    <a href="{{ route('admin.services.index') }}" class="btn" style="background: #6c757d; color: white;">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>

<div class="card" style="max-width: 800px; margin: 0 auto;">
    <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 1.5rem;">
            <div class="form-group">
                <label for="title">Nama Layanan <span style="color: red;">*</span></label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" required placeholder="Contoh: Dekorasi Event">
            </div>

            <div class="form-group">
                <label for="icon">Ikon (FontAwesome) <span style="color: red;">*</span></label>
                <input type="text" id="icon" name="icon" value="{{ old('icon', 'fas fa-star') }}" required placeholder="Contoh: fas fa-star">
                <p style="font-size: 0.8rem; color: #7f8c8d; margin-top: 0.3rem;"><a href="https://fontawesome.com/v5/search?m=free" target="_blank">Cari ikon di sini</a></p>
            </div>
        </div>

        <div class="form-group">
            <label for="description">Deskripsi Singkat <span style="color: red;">*</span></label>
            <textarea id="description" name="description" required placeholder="Tuliskan deskripsi singkat tentang layanan ini..." style="min-height: 100px;">{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label for="features">Daftar Fitur Utama (Opsional)</label>
            <textarea id="features" name="features" placeholder="Backdrop & Photo Booth&#10;Dekorasi Panggung&#10;Custom Design" style="min-height: 120px;">{{ old('features') }}</textarea>
            <p style="font-size: 0.85rem; color: #7f8c8d; margin-top: 0.5rem;">
                <i class="fas fa-info-circle"></i> Pisahkan setiap fitur dengan <strong>Enter (baris baru)</strong>.
            </p>
        </div>

        <div class="form-group" style="background: var(--light); padding: 1.5rem; border-radius: 8px;">
            <label for="image">Gambar Layanan <span style="color: red;">*</span></label>
            <input type="file" id="image" name="image" required accept="image/jpeg,image/png,image/jpg" style="background: white;">
        </div>

        <div style="text-align: right; margin-top: 2rem;">
            <button type="submit" class="btn btn-primary" style="padding: 0.8rem 2rem; font-size: 1.1rem;">
                <i class="fas fa-save"></i> Simpan Layanan
            </button>
        </div>
    </form>
</div>
@endsection     