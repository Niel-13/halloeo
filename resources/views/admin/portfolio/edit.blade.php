@extends('admin.layout')

@section('title', 'Edit Portfolio')
@section('page-title', 'Edit Portfolio')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
    <div>
        <h3 style="font-family: 'Playfair Display', sans-serif;">Edit Data Portfolio</h3>
        <p style="color: #7f8c8d;">Perbarui informasi karya Anda di bawah ini.</p>
    </div>
    <a href="{{ route('admin.portfolio.index') }}" class="btn" style="background: #6c757d; color: white;">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>

<div class="card" style="max-width: 800px; margin: 0 auto;">
    <form action="{{ route('admin.portfolio.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <div class="form-group">
            <label for="title">Judul Portfolio <span style="color: red;">*</span></label>
            <input type="text" id="title" name="title" value="{{ old('title', $portfolio->title) }}" required placeholder="Contoh: Maskot Beruang Madu">
            @error('title')
                <span style="color: red; font-size: 0.85rem; margin-top: 0.5rem; display: block;">{{ $message }}</span>
            @enderror
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
            <div class="form-group">
                <label for="category">Kategori <span style="color: red;">*</span></label>
                <select id="category" name="category" required>
                    <option value="">-- Pilih Kategori --</option>
                    <option value="dekorasi" {{ old('category', $portfolio->category) == 'dekorasi' ? 'selected' : '' }}>Dekorasi Styrofoam</option>
                    <option value="maskot" {{ old('category', $portfolio->category) == 'maskot' ? 'selected' : '' }}>Pembuatan Maskot</option>
                    <option value="event" {{ old('category', $portfolio->category) == 'event' ? 'selected' : '' }}>Event Organizer</option>
                </select>
                @error('category')
                    <span style="color: red; font-size: 0.85rem; display: block;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="is_featured">Tampilkan di Halaman Depan? (Featured)</label>
                <select id="is_featured" name="is_featured">
                    <option value="0" {{ old('is_featured', $portfolio->is_featured) == false ? 'selected' : '' }}>Tidak</option>
                    <option value="1" {{ old('is_featured', $portfolio->is_featured) == true ? 'selected' : '' }}>Ya, Tampilkan</option>
                </select>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
            <div class="form-group">
                <label for="client_name">Nama Klien (Opsional)</label>
                <input type="text" id="client_name" name="client_name" value="{{ old('client_name', $portfolio->client_name) }}" placeholder="Contoh: PT. Maju Bersama">
            </div>

            <div class="form-group">
                <label for="project_date">Tanggal Proyek (Opsional)</label>
                <input type="date" id="project_date" name="project_date" value="{{ old('project_date', $portfolio->project_date ? $portfolio->project_date->format('Y-m-d') : '') }}">
            </div>
        </div>

        <div class="form-group">
            <label for="description">Deskripsi Proyek <span style="color: red;">*</span></label>
            <textarea id="description" name="description" required placeholder="Ceritakan detail pengerjaan proyek ini...">{{ old('description', $portfolio->description) }}</textarea>
            @error('description')
                <span style="color: red; font-size: 0.85rem; display: block;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group" style="background: var(--light); padding: 1.5rem; border-radius: 8px;">
            <label for="image">Gambar Portfolio</label>
            
            @if($portfolio->image_path)
                <div style="margin-bottom: 1rem;">
                    <p style="font-size: 0.85rem; color: #7f8c8d; margin-bottom: 0.5rem;">Gambar Saat Ini:</p>
                    <img src="{{ asset('storage/' . $portfolio->image_path) }}" alt="Preview" style="max-width: 200px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                </div>
            @endif

            <input type="file" id="image" name="image" accept="image/jpeg,image/png,image/jpg,image/gif" style="background: white;">
            <p style="font-size: 0.85rem; color: #7f8c8d; margin-top: 0.5rem;">
                <i class="fas fa-info-circle"></i> Biarkan kosong jika tidak ingin mengubah gambar. Format: JPG, PNG, GIF (Maks 5MB).
            </p>
            @error('image')
                <span style="color: red; font-size: 0.85rem; display: block;">{{ $message }}</span>
            @enderror
        </div>

        <div style="text-align: right; margin-top: 2rem; padding-top: 1.5rem; border-top: 1px solid var(--light);">
            <button type="submit" class="btn btn-primary" style="padding: 0.8rem 2rem; font-size: 1.1rem;">
                <i class="fas fa-save"></i> Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection