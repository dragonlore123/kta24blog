@if ($paginator->hasPages())
    <nav>
        <div class="join">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <a class="join-item btn btn-disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true">⮨</span>
                </a>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="join-item btn" rel="prev" aria-label="@lang('pagination.previous')">
                   ⮨
                </a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <button class="join-item btn btn-disabled" aria-disabled="true"><span>{{ $element }}</span></button>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <button class="join-item btn btn-active" aria-current="page"><span>{{ $page }}</span></button>
                        @else
                            <a class="join-item btn" href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a class="join-item btn" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">⮩</a>
            @else
                <a class="join-item btn btn-disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true">⮩</span>
                </a>
            @endif
        </div>
    </nav>
@endif
