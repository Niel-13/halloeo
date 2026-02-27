@extends('admin.layout')

@section('title', 'Pesan Pengunjung')
@section('page-title', 'Pesan Pengunjung')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
    <div>
        <h3 style="font-family: 'Playfair Display', sans-serif;">Daftar Pesan</h3>
        <p style="color: #7f8c8d;">Total: {{ $messages->total() }} pesan</p>
    </div>
    @if($newCount > 0)
    <div class="badge badge-warning" style="font-size: 1.2rem; padding: 0.8rem 1.5rem;">
        <i class="fas fa-envelope"></i> {{ $newCount }} Pesan Baru
    </div>
    @endif
</div>

<!-- Filter Tabs -->
<div class="card">
    <div style="padding: 1rem; border-bottom: 1px solid var(--light); display: flex; gap: 1rem; flex-wrap: wrap;">
        <a href="{{ route('admin.messages.index') }}" 
           class="btn {{ !request('status') || request('status') == 'all' ? 'btn-primary' : '' }}"
           style="{{ request('status') && request('status') != 'all' ? 'background: #e0e0e0; color: var(--dark);' : '' }}">
            <i class="fas fa-list"></i> Semua
        </a>
        <a href="{{ route('admin.messages.index', ['status' => 'new']) }}" 
            class="btn {{ request('status') == 'new' ? 'btn-primary' : '' }}"
            style="{{ request('status') != 'new' ? 'background: #e0e0e0; color: var(--dark);' : '' }}">
             <i class="fas fa-envelope"></i> Baru ({{ $newCount }})
        </a>
        <a href="{{ route('admin.messages.index', ['status' => 'read']) }}" 
           class="btn {{ request('status') == 'read' ? 'btn-primary' : '' }}"
           style="{{ request('status') != 'read' ? 'background: #e0e0e0; color: var(--dark);' : '' }}">
            <i class="fas fa-eye"></i> Dibaca
        </a>
        <a href="{{ route('admin.messages.index', ['status' => 'replied']) }}" 
           class="btn {{ request('status') == 'replied' ? 'btn-primary' : '' }}"
           style="{{ request('status') != 'replied' ? 'background: #e0e0e0; color: var(--dark);' : '' }}">
            <i class="fas fa-reply"></i> Dibalas
        </a>
        <a href="{{ route('admin.messages.index', ['status' => 'archived']) }}" 
           class="btn {{ request('status') == 'archived' ? 'btn-primary' : '' }}"
           style="{{ request('status') != 'archived' ? 'background: #e0e0e0; color: var(--dark);' : '' }}">
            <i class="fas fa-archive"></i> Arsip
        </a>
    </div>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th style="width: 50px;">Status</th>
                    <th>Nama & Kontak</th>
                    <th>Layanan</th>
                    <th>Subjek</th>
                    <th>Pesan</th>
                    <th>Tanggal</th>
                    <th style="width: 250px; text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($messages as $message)
                <tr style="{{ $message->status == 'new' ? 'background: #fff3cd;' : '' }}">
                    <td>
                        <span class="badge {{ $message->statusBadge }}">
                            {{ $message->statusLabel }}
                        </span>
                    </td>
                    <td>
                        <strong>{{ $message->name }}</strong><br>
                        <small style="color: #7f8c8d;">
                            <i class="fas fa-phone"></i> {{ $message->phone }}<br>
                            <i class="fas fa-envelope"></i> {{ $message->email }}
                        </small>
                    </td>
                    <td>
                        @if($message->service)
                            <span class="badge badge-primary">{{ ucfirst($message->service) }}</span>
                        @else
                            <span style="color: #999;">-</span>
                        @endif
                    </td>
                    <td>{{ $message->subject ?? '-' }}</td>
                    <td>{{ Str::limit($message->message, 60) }}</td>
                    <td>
                        {{ $message->created_at->format('d M Y') }}<br>
                        <small style="color: #7f8c8d;">{{ $message->created_at->format('H:i') }}</small>
                    </td>
                    <td style="text-align: center;">
                        <div style="display: flex; gap: 0.5rem; justify-content: center; flex-wrap: wrap;">
                            <a href="{{ route('admin.messages.show', $message->id) }}" 
                               class="btn" 
                               style="padding: 0.5rem 1rem; background: var(--pastel-blue); color: white;"
                               title="Lihat Detail">
                                <i class="fas fa-eye"></i>
                            </a>

                            @if($message->status == 'new' || $message->status == 'read')
                            <form action="{{ route('admin.messages.mark-replied', $message->id) }}" 
                                  method="POST" 
                                  style="margin: 0;">
                                @csrf
                                <button type="submit" 
                                        class="btn" 
                                        style="padding: 0.5rem 1rem; background: #28a745; color: white;"
                                        title="Tandai Dibalas">
                                    <i class="fas fa-check"></i>
                                </button>
                            </form>
                            @endif

                            <form action="{{ route('admin.messages.archive', $message->id) }}" 
                                  method="POST" 
                                  style="margin: 0;">
                                @csrf
                                <button type="submit" 
                                        class="btn" 
                                        style="padding: 0.5rem 1rem; background: #6c757d; color: white;"
                                        title="Arsipkan">
                                    <i class="fas fa-archive"></i>
                                </button>
                            </form>

                            <form action="{{ route('admin.messages.destroy', $message->id) }}" 
                                  method="POST" 
                                  style="margin: 0;"
                                  onsubmit="return confirm('Yakin ingin menghapus pesan ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="btn" 
                                        style="padding: 0.5rem 1rem; background: var(--dark-pastel-red); color: white;"
                                        title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" style="text-align: center; padding: 3rem;">
                        <i class="fas fa-inbox" style="font-size: 3rem; color: #ccc; margin-bottom: 1rem;"></i>
                        <p style="color: #999;">Belum ada pesan</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($messages->hasPages())
    <div style="padding: 1.5rem; border-top: 1px solid var(--light);">
        {{ $messages->links() }}
    </div>
    @endif
</div>

<!-- Info Box -->
<div class="card" style="margin-top: 1.5rem; background: #d1ecf1; border-left: 4px solid #0c5460;">
    <p style="margin: 0; color: #0c5460;">
        <i class="fas fa-info-circle"></i> 
        <strong>Info:</strong> Pesan baru akan ditandai dengan latar kuning. Klik "Lihat Detail" untuk membaca pesan lengkap dan menambahkan catatan.
    </p>
</div>
@endsection