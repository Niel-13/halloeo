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

<div class="card" style="max-width: 800px; margin: 0 auto; padding: 2rem; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); background: white;">
    <form action="{{ route('admin.portfolio.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data" id="edit-portfolio-form">
        @csrf
        @method('PUT') 
        
        <div class="form-group" style="margin-bottom: 1.5rem;">
            <label for="title" style="font-weight: 600; margin-bottom: 0.5rem; display: block;">Judul Portfolio <span style="color: red;">*</span></label>
            <input type="text" id="title" name="title" value="{{ old('title', $portfolio->title) }}" required placeholder="Contoh: Maskot Beruang Madu" style="width: 100%; padding: 0.8rem; border: 1px solid #ddd; border-radius: 8px;">
            @error('title')
                <span style="color: red; font-size: 0.85rem; margin-top: 0.5rem; display: block;">{{ $message }}</span>
            @enderror
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
            <div class="form-group">
                <label for="category" style="font-weight: 600; margin-bottom: 0.5rem; display: block;">Kategori *</label>
                <select name="category" required style="width: 100%; padding: 0.8rem; border: 1px solid #ddd; border-radius: 8px;">
                    <option value="">Pilih Kategori</option>
                    @foreach($services as $service)
                        <option value="{{ $service->title }}" 
                            {{ old('category', $portfolio->category ?? '') == $service->title ? 'selected' : '' }}>
                            {{ $service->title }}
                        </option>
                    @endforeach
                </select>
                @error('category')
                    <small style="color: red; display: block; margin-top: 0.5rem;">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="is_featured" style="font-weight: 600; margin-bottom: 0.5rem; display: block;">Tampilkan di Halaman Depan? (Featured)</label>
                <select id="is_featured" name="is_featured" style="width: 100%; padding: 0.8rem; border: 1px solid #ddd; border-radius: 8px;">
                    <option value="0" {{ old('is_featured', $portfolio->is_featured) == false ? 'selected' : '' }}>Tidak</option>
                    <option value="1" {{ old('is_featured', $portfolio->is_featured) == true ? 'selected' : '' }}>Ya, Tampilkan</option>
                </select>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
            <div class="form-group">
                <label for="client_name" style="font-weight: 600; margin-bottom: 0.5rem; display: block;">Nama Klien (Opsional)</label>
                <input type="text" id="client_name" name="client_name" value="{{ old('client_name', $portfolio->client_name) }}" placeholder="Contoh: PT. Maju Bersama" style="width: 100%; padding: 0.8rem; border: 1px solid #ddd; border-radius: 8px;">
            </div>

            <div class="form-group">
                <label for="project_date" style="font-weight: 600; margin-bottom: 0.5rem; display: block;">Tanggal Proyek (Opsional)</label>
                <input type="date" id="project_date" name="project_date" value="{{ old('project_date', $portfolio->project_date ? \Carbon\Carbon::parse($portfolio->project_date)->format('Y-m-d') : '') }}" style="width: 100%; padding: 0.8rem; border: 1px solid #ddd; border-radius: 8px;">
            </div>
        </div>

        <div class="form-group" style="margin-bottom: 1.5rem;">
            <label for="description" style="font-weight: 600; margin-bottom: 0.5rem; display: block;">Deskripsi Proyek <span style="color: red;">*</span></label>
            <textarea id="description" name="description" required placeholder="Ceritakan detail pengerjaan proyek ini..." style="width: 100%; padding: 0.8rem; border: 1px solid #ddd; border-radius: 8px; min-height: 120px;">{{ old('description', $portfolio->description) }}</textarea>
            @error('description')
                <span style="color: red; font-size: 0.85rem; display: block; margin-top: 0.5rem;">{{ $message }}</span>
            @enderror
        </div>

        <!-- Bagian Edit Gambar Utama -->
        <div class="form-group" style="background: #f8f9fa; padding: 1.5rem; border-radius: 8px; border: 1px dashed #ced4da; margin-bottom: 1.5rem;">
            <label for="image" style="font-weight: 600; display: block; margin-bottom: 1rem;">Gambar Utama Portfolio</label>
            
            @if($portfolio->image_path)
                <div style="margin-bottom: 1rem; background: white; padding: 1rem; border-radius: 8px; display: inline-block; border: 1px solid #e9ecef;">
                    <p style="font-size: 0.85rem; color: #7f8c8d; margin-bottom: 0.5rem;"><i class="fas fa-image"></i> Gambar Saat Ini:</p>
                    <img src="{{ asset($portfolio->image_path) }}" alt="Preview" style="max-width: 200px; height: auto; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                </div>
            @endif

            <input type="file" id="image" name="image" accept="image/jpeg,image/png,image/jpg,image/gif" style="width: 100%; padding: 0.5rem; background: white; border: 1px solid #ddd; border-radius: 6px;">
            <p style="font-size: 0.85rem; color: #7f8c8d; margin-top: 0.5rem;">
                <i class="fas fa-info-circle"></i> Biarkan kosong jika tidak ingin mengubah gambar utama. Format: JPG, PNG, GIF (Maks 5MB).
            </p>
            @error('image')
                <span style="color: red; font-size: 0.85rem; display: block;">{{ $message }}</span>
            @enderror
        </div>

        <!-- Bagian Edit Galeri Foto/Video -->
        <div class="form-group" style="background: #f8f9fa; padding: 1.5rem; border-radius: 8px; border: 1px dashed #ced4da; margin-bottom: 1.5rem;">
            <label style="font-weight: 600; display: block; margin-bottom: 1rem;">Galeri Portfolio (Foto & Video Tambahan)</label>

            <!-- Menampilkan Galeri yang sudah ada -->
            @if(isset($portfolio->galleries) && $portfolio->galleries->count() > 0)
                <div style="margin-bottom: 1.5rem;">
                    <p style="font-size: 0.85rem; color: #7f8c8d; margin-bottom: 0.5rem;"><i class="fas fa-images"></i> Item Galeri Saat Ini:</p>
                    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(120px, 1fr)); gap: 1rem;" id="existing-galleries">
                        @foreach($portfolio->galleries as $gallery)
                            <div id="gallery-item-{{ $gallery->id }}" style="position: relative; border-radius: 8px; overflow: hidden; aspect-ratio: 1/1; box-shadow: 0 2px 5px rgba(0,0,0,0.1); border: 2px solid white; background: #000;">
                                @if($gallery->type == 'video')
                                    <video style="width: 100%; height: 100%; object-fit: cover;" muted>
                                        <source src="{{ asset($gallery->file_path) }}" type="video/mp4">
                                    </video>
                                    <div style="position: absolute; bottom: 5px; left: 5px; background: rgba(0,0,0,0.6); color: white; border-radius: 4px; padding: 2px 6px; font-size: 0.7rem;">
                                        <i class="fas fa-video"></i>
                                    </div>
                                @else
                                    <img src="{{ asset($gallery->file_path) }}" alt="Galeri" style="width: 100%; height: 100%; object-fit: cover;">
                                @endif
                                
                                <!-- Tombol Hapus Galeri (Triggers JS) -->
                                <button type="button" onclick="removeGalleryItem({{ $gallery->id }})" title="Hapus Item" style="position: absolute; top: 5px; right: 5px; background: #dc3545; color: white; border: none; border-radius: 50%; width: 28px; height: 28px; display: flex; align-items: center; justify-content: center; cursor: pointer; box-shadow: 0 2px 4px rgba(0,0,0,0.2); transition: background 0.2s ease;">
                                    <i class="fas fa-trash-alt" style="font-size: 0.75rem;"></i>
                                </button>
                            </div>
                        @endforeach
                    </div>
                    
                    <!-- Container input hidden untuk item yang dihapus -->
                    <div id="deleted-galleries-container"></div>
                </div>
            @endif

            <!-- Input Tambah Galeri Baru -->
            <label for="galleries" style="font-size: 0.9rem; margin-bottom: 0.5rem; display: block; color: #495057;">Tambah File ke Galeri Baru</label>
            <input type="file" id="galleries" name="galleries[]" multiple accept="image/*,video/*" style="width: 100%; padding: 0.5rem; background: white; border: 1px solid #ddd; border-radius: 6px;">
            <p style="font-size: 0.85rem; color: #7f8c8d; margin-top: 0.5rem;">
                <i class="fas fa-plus-circle"></i> Anda bisa memilih beberapa file sekaligus. File baru akan <strong>ditambahkan</strong> ke galeri. Format: Gambar & Video (Maks 20MB per file).
            </p>
            @error('galleries')
                <span style="color: red; font-size: 0.85rem; display: block;">{{ $message }}</span>
            @enderror
            @error('galleries.*')
                <span style="color: red; font-size: 0.85rem; display: block;">{{ $message }}</span>
            @enderror
        </div>

        <div style="text-align: right; margin-top: 2rem; padding-top: 1.5rem; border-top: 1px solid #e9ecef;">
            <button type="submit" class="btn btn-primary" style="padding: 0.8rem 2.5rem; font-size: 1.1rem; border-radius: 50px; background: linear-gradient(135deg, #007bff, #0056b3); border: none; color: white; cursor: pointer; transition: transform 0.2s ease;">
                <i class="fas fa-save"></i> Simpan Perubahan
            </button>
        </div>
    </form>
</div>

<!-- Script untuk handling hapus galeri secara dinamis di form -->
<script>
    function removeGalleryItem(id) {
        if (confirm('Apakah Anda yakin ingin menghapus item ini dari galeri? Item akan terhapus permanen setelah Anda menekan tombol "Simpan Perubahan".')) {
            let itemDiv = document.getElementById('gallery-item-' + id);
            if (itemDiv) {
                itemDiv.style.display = 'none';
            }
            let container = document.getElementById('deleted-galleries-container');
            let input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'deleted_galleries[]';
            input.value = id;
            container.appendChild(input);
        }
    }
</script>
@endsection