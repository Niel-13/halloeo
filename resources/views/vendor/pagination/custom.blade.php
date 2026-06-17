@if ($paginator->hasPages())
<style>
    .pagination-nav {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 0.75rem;
        padding: 1.25rem 1.5rem;
        border-top: 1px solid #eee;
    }
    .pagination-info {
        font-size: 0.85rem;
        color: #7f8c8d;
    }
    .pagination-list {
        display: flex !important;
        align-items: center;
        gap: 0.25rem;
        list-style: none !important;
        margin: 0 !important;
        padding: 0 !important;
    }
    .pagination-list li {
        list-style: none !important;
    }
    .pagination-list li::before {
        display: none !important;
    }
    .pagination-link {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 2rem;
        height: 2rem;
        border-radius: 6px;
        font-size: 0.85rem;
        font-weight: 500;
        color: #555;
        background: transparent;
        text-decoration: none;
        transition: background 0.15s, color 0.15s;
        border: 1px solid transparent;
    }
    .pagination-link:hover {
        background: var(--pastel-blue, #aad4f5);
        color: #fff;
        border-color: var(--pastel-blue, #aad4f5);
        text-decoration: none;
    }
    .pagination-item.active .pagination-link {
        background: var(--pastel-blue, #aad4f5);
        color: #fff;
        border-color: var(--pastel-blue, #aad4f5);
        font-weight: 600;
        cursor: default;
    }
    .pagination-item.disabled .pagination-link {
        color: #ccc;
        cursor: not-allowed;
        pointer-events: none;
    }
    .pagination-link i {
        font-size: 0.7rem;
    }
    @media (max-width: 480px) {
        .pagination-nav {
            flex-direction: column;
            align-items: flex-start;
        }
    }
</style>

<nav class="pagination-nav" aria-label="Navigasi halaman">
    <div class="pagination-info">
        Menampilkan {{ $paginator->firstItem() }}–{{ $paginator->lastItem() }} dari {{ $paginator->total() }} data
    </div>

    <ul class="pagination-list">

        {{-- Tombol Previous --}}
        @if ($paginator->onFirstPage())
            <li class="pagination-item disabled">
                <span class="pagination-link" aria-disabled="true" aria-label="Sebelumnya">
                    <i class="fas fa-chevron-left"></i>
                </span>
            </li>
        @else
            <li class="pagination-item">
                <a class="pagination-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="Sebelumnya">
                    <i class="fas fa-chevron-left"></i>
                </a>
            </li>
        @endif

        {{-- Nomor Halaman --}}
        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="pagination-item disabled">
                    <span class="pagination-link pagination-dots">{{ $element }}</span>
                </li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="pagination-item active">
                            <span class="pagination-link" aria-current="page">{{ $page }}</span>
                        </li>
                    @else
                        <li class="pagination-item">
                            <a class="pagination-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Tombol Next --}}
        @if ($paginator->hasMorePages())
            <li class="pagination-item">
                <a class="pagination-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="Berikutnya">
                    <i class="fas fa-chevron-right"></i>
                </a>
            </li>
        @else
            <li class="pagination-item disabled">
                <span class="pagination-link" aria-disabled="true" aria-label="Berikutnya">
                    <i class="fas fa-chevron-right"></i>
                </span>
            </li>
        @endif

    </ul>
</nav>
@endif