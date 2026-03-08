@extends('admin.layout')

@section('title', isset($portfolio) ? 'Edit Portfolio' : 'Tambah Portfolio')
@section('page-title', isset($portfolio) ? 'Edit Portfolio' : 'Tambah Portfolio Baru')

@section('content')
<div style="max-width: 900px;">
    <div class="card">
        <form action="{{ isset($portfolio) ? route('admin.portfolio.update', $portfolio->id) : route('admin.portfolio.store') }}" 
              method="POST" 
              enctype="multipart/form-data">
            @csrf
            @if(isset($portfolio))
                @method('PUT')
            @endif

            <div class="form-group">
                <label for="title">Judul Portfolio *</label>
                <input type="text" 
                       id="title" 
                       name="title" 
                       value="{{ old('title', $portfolio->title ?? '') }}" 
                       required
                       placeholder="Contoh: Dekorasi Pernikahan Elegant">
                @error('title')
                    <small style="color: red;">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Deskripsi *</label>
                <textarea id="description" 
                          name="description" 
                          required
                          placeholder="Jelaskan detail proyek ini...">{{ old('description', $portfolio->description ?? '') }}</textarea>
                @error('description')
                    <small style="color: red;">{{ $message }}</small>
                @enderror
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                <div class="form-group">
                    <label for="category">Kategori *</label>
                    <select id="category" name="category" required style="font-family: 'Playfair Display', serif;">
                        <option value="">Pilih Kategori</option>
                        @foreach($services as $service)
                            <option value="{{ $service->title }}" 
                                {{ old('category', $portfolio->category ?? '') == $service->title ? 'selected' : '' }}>
                                {{ $service->title }}
                            </option>
                        @endforeach
                    </select>
                    @error('category')
                        <small style="color: #D88A8A;">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="project_date">Tanggal Proyek</label>
                    <input type="date" 
                           id="project_date" 
                           name="project_date" 
                           value="{{ old('project_date', isset($portfolio) && $portfolio->project_date ? $portfolio->project_date->format('Y-m-d') : '') }}">
                    @error('project_date')
                        <small style="color: red;">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="client_name">Nama Klien</label>
                <input type="text" 
                       id="client_name" 
                       name="client_name" 
                       value="{{ old('client_name', $portfolio->client_name ?? '') }}"
                       placeholder="Contoh: PT Maju Bersama">
                @error('client_name')
                    <small style="color: red;">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Gambar Portfolio {{ isset($portfolio) ? '(Kosongkan jika tidak ingin mengubah)' : '*' }}</label>
                
                @if(isset($portfolio) && $portfolio->image_path)
                <div style="margin-bottom: 1rem;">
                    <img src="{{ asset('storage/' . $portfolio->image_path) }}" 
                         alt="Current image"
                         style="max-width: 200px; border-radius: 8px; border: 2px solid var(--light);">
                </div>
                @endif

                <input type="file" 
                       id="image" 
                       name="image" 
                       accept="image/*"
                       {{ !isset($portfolio) ? 'required' : '' }}>
                <small style="color: #7f8c8d; display: block; margin-top: 0.5rem;">
                    Format: JPG, PNG, GIF (Max 5MB)
                </small>
                @error('image')
                    <small style="color: red;">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label style="display: flex; align-items: center; gap: 0.8rem; cursor: pointer;">
                    <input type="checkbox" 
                           name="is_featured" 
                           value="1"
                           {{ old('is_featured', $portfolio->is_featured ?? false) ? 'checked' : '' }}
                           style="width: auto;">
                    <span>Jadikan Featured Portfolio (Tampil di homepage)</span>
                </label>
            </div>

            <div class="form-group">
                <label>Galeri (Foto/Video) *Bisa pilih beberapa</label>
                <input type="file" name="galleries[]" class="form-control" multiple accept="image/*,video/*">
            </div>

            <div style="display: flex; gap: 1rem; margin-top: 2rem;">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> {{ isset($portfolio) ? 'Update Portfolio' : 'Simpan Portfolio' }}
                </button>
                <a href="{{ route('admin.portfolio.index') }}" class="btn" style="background: #95a5a6; color: white;">
                    <i class="fas fa-times"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>

@section('scripts')
<script>
    // Preview image before upload
    document.getElementById('image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                const preview = document.createElement('img');
                preview.src = event.target.result;
                preview.style.maxWidth = '200px';
                preview.style.marginTop = '1rem';
                preview.style.borderRadius = '8px';
                preview.style.border = '2px solid var(--pastel-blue)';
                
                const existingPreview = document.querySelector('.image-preview');
                if (existingPreview) {
                    existingPreview.remove();
                }
                
                preview.className = 'image-preview';
                e.target.parentNode.appendChild(preview);
            };
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection
@endsection