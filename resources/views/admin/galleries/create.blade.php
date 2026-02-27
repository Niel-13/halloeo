@extends('admin.layout')

@section('title', 'Upload Galeri')
@section('page-title', 'Upload ke Galeri')

@section('content')
<div class="card" style="max-width: 600px; margin: 0 auto;">
    <div style="margin-bottom: 2rem;">
        <h3 style="font-family: 'Playfair Display', sans-serif;">Upload Gambar / Video</h3>
        <p style="color: #7f8c8d;">Pilih file dari perangkat Anda.</p>
    </div>

    @if ($errors->any())
        <div class="alert alert-error">
            <ul style="margin-left: 1.5rem;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group" style="background: var(--light); padding: 2rem; border-radius: 10px; text-align: center; border: 2px dashed #ccc;">
            <i class="fas fa-cloud-upload-alt" style="font-size: 3rem; color: var(--pastel-blue); margin-bottom: 1rem;"></i>
            <label for="file" style="display: block; cursor: pointer;">
                Pilih File (JPG, PNG, MP4, MOV) <br>
                <small style="color: #999;">Maksimal ukuran file 50MB</small>
            </label>
            <input type="file" id="file" name="file" required accept="image/*,video/mp4,video/quicktime" style="margin-top: 1rem;">
        </div>

        <div style="display: flex; gap: 1rem; margin-top: 2rem;">
            <a href="{{ route('admin.galleries.index') }}" class="btn" style="background: #ccc; color: var(--dark);">Batal</a>
            <button type="submit" class="btn btn-primary" style="flex: 1; justify-content: center;">
                <i class="fas fa-save"></i> Upload File
            </button>
        </div>
    </form>
</div>
@endsection