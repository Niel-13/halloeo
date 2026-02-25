@extends('admin.layout')

@section('title', 'Detail Pesan')
@section('page-title', 'Detail Pesan')

@section('content')
<div style="max-width: 1000px;">
    <div style="margin-bottom: 2rem;">
        <a href="{{ route('admin.messages.index') }}" class="btn" style="background: #6c757d; color: white;">
            <i class="fas fa-arrow-left"></i> Kembali ke Daftar
        </a>
    </div>

    <div class="card">
        <!-- Header -->
        <div style="padding: 2rem; border-bottom: 2px solid var(--light);">
            <div style="display: flex; justify-content: space-between; align-items: start; flex-wrap: wrap; gap: 1rem;">
                <div>
                    <h3 style="font-family: 'Fredoka', sans-serif; font-size: 1.8rem; margin-bottom: 0.5rem;">
                        {{ $message->subject ?? 'Tidak ada subjek' }}
                    </h3>
                    <span class="badge {{ $message->statusBadge }}" style="font-size: 1rem;">
                        {{ $message->statusLabel }}
                    </span>
                </div>
                <div style="text-align: right; color: #7f8c8d;">
                    <p style="margin: 0.2rem 0;">
                        <i class="fas fa-calendar"></i> {{ $message->created_at->format('d M Y, H:i') }}
                    </p>
                    @if($message->read_at)
                    <p style="margin: 0.2rem 0; font-size: 0.9rem;">
                        <i class="fas fa-eye"></i> Dibaca: {{ $message->read_at->diffForHumans() }}
                    </p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Sender Info -->
        <div style="padding: 2rem; background: var(--light); border-bottom: 1px solid #e0e0e0;">
            <h4 style="font-family: 'Fredoka', sans-serif; margin-bottom: 1rem;">
                <i class="fas fa-user"></i> Informasi Pengirim
            </h4>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.5rem;">
                <div>
                    <p style="color: #7f8c8d; margin-bottom: 0.3rem; font-size: 0.9rem;">Nama</p>
                    <p style="font-weight: 600;">{{ $message->name }}</p>
                </div>
                <div>
                    <p style="color: #7f8c8d; margin-bottom: 0.3rem; font-size: 0.9rem;">Email</p>
                    <p style="font-weight: 600;">
                        <a href="mailto:{{ $message->email }}" style="color: var(--deep-blue); text-decoration: none;">
                            {{ $message->email }}
                        </a>
                    </p>
                </div>
                <div>
                    <p style="color: #7f8c8d; margin-bottom: 0.3rem; font-size: 0.9rem;">Telepon</p>
                    <p style="font-weight: 600;">
                        <a href="tel:{{ $message->phone }}" style="color: var(--deep-blue); text-decoration: none;">
                            {{ $message->phone }}
                        </a>
                    </p>
                </div>
                @if($message->service)
                <div>
                    <p style="color: #7f8c8d; margin-bottom: 0.3rem; font-size: 0.9rem;">Layanan Diminati</p>
                    <p style="font-weight: 600;">{{ ucfirst($message->service) }}</p>
                </div>
                @endif
            </div>
        </div>

        <!-- Message Content -->
        <div style="padding: 2rem;">
            <h4 style="font-family: 'Fredoka', sans-serif; margin-bottom: 1rem;">
                <i class="fas fa-comment"></i> Isi Pesan
            </h4>
            <div style="background: var(--light); padding: 1.5rem; border-radius: 10px; border-left: 4px solid var(--pastel-blue);">
                <p style="line-height: 1.8; white-space: pre-wrap;">{{ $message->message }}</p>
            </div>
        </div>

        <!-- Admin Notes -->
        <div style="padding: 2rem; background: var(--light); border-top: 1px solid #e0e0e0;">
            <h4 style="font-family: 'Fredoka', sans-serif; margin-bottom: 1rem;">
                <i class="fas fa-sticky-note"></i> Catatan Admin
            </h4>
            <form action="{{ route('admin.messages.update-notes', $message->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <textarea name="admin_notes" 
                              rows="4" 
                              placeholder="Tambahkan catatan internal...">{{ $message->admin_notes }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan Catatan
                </button>
            </form>
        </div>

        <!-- Quick Actions -->
        <div style="padding: 2rem; border-top: 2px solid var(--light); display: flex; gap: 1rem; flex-wrap: wrap;">
            <h4 style="font-family: 'Fredoka', sans-serif; width: 100%; margin-bottom: 0.5rem;">
                <i class="fas fa-bolt"></i> Quick Actions
            </h4>

            @if($message->status == 'new' || $message->status == 'read')
            <form action="{{ route('admin.messages.mark-replied', $message->id) }}" method="POST" style="margin: 0;">
                @csrf
                <button type="submit" class="btn" style="background: #28a745; color: white;">
                    <i class="fas fa-check"></i> Tandai Sudah Dibalas
                </button>
            </form>
            @endif

            <a href="mailto:{{ $message->email }}?subject=Re: {{ $message->subject }}" 
               class="btn" 
               style="background: var(--pastel-blue); color: white;">
                <i class="fas fa-reply"></i> Balas via Email
            </a>

            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $message->phone) }}?text=Halo {{ $message->name }}, terima kasih telah menghubungi HalloEO" 
               class="btn" 
               style="background: #25D366; color: white;"
               target="_blank">
                <i class="fab fa-whatsapp"></i> Balas via WhatsApp
            </a>

            <form action="{{ route('admin.messages.archive', $message->id) }}" 
                  method="POST" 
                  style="margin: 0;">
                @csrf
                <button type="submit" class="btn" style="background: #6c757d; color: white;">
                    <i class="fas fa-archive"></i> Arsipkan
                </button>
            </form>

            <form action="{{ route('admin.messages.destroy', $message->id) }}" 
                  method="POST" 
                  style="margin: 0;"
                  onsubmit="return confirm('Yakin ingin menghapus pesan ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn" style="background: var(--dark-pastel-red); color: white;">
                    <i class="fas fa-trash"></i> Hapus Pesan
                </button>
            </form>
        </div>
    </div>
</div>
@endsection