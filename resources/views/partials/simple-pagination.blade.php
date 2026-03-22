@if ($paginator->hasPages())
    <nav class="flex justify-center mt-6" role="navigation" aria-label="Pagination Navigation">
        <div class="join">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span class="btn btn-outline join-item btn-disabled" aria-disabled="true">
                    @lang('pagination.previous')
                </span>
            @else
                <a class="btn btn-outline join-item" href="{{ $paginator->previousPageUrl() }}" rel="prev">
                    @lang('pagination.previous')
                </a>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a class="btn btn-outline join-item" href="{{ $paginator->nextPageUrl() }}" rel="next">
                    @lang('pagination.next')
                </a>
            @else
                <span class="btn btn-outline join-item btn-disabled" aria-disabled="true">
                    @lang('pagination.next')
                </span>
            @endif
        </div>
    </nav>
@endif
