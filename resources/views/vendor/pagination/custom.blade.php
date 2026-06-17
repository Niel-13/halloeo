@if ($paginator->hasPages())
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
            {{-- Separator "..." --}}
            @if (is_string($element))
                <li class="pagination-item disabled">
                    <span class="pagination-link pagination-dots">{{ $element }}</span>
                </li>
            @endif

            {{-- Array Of Links --}}
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