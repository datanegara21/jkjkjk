@if ($paginator->hasPages())
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
        <span aria-label="@lang('pagination.previous')" class="btn btn-icon btn-sm btn-secondary mr-2 my-1"><i class="ki ki-bold-arrow-back icon-xs"></i></span>
    @else
        <a href="{{ $paginator->previousPageUrl() }}" aria-label="@lang('pagination.previous')" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1"><i class="ki ki-bold-arrow-back icon-xs"></i></a>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
            <span class="btn btn-icon btn-sm border-0 btn-secondary mr-2 my-1" aria-disabled="true">{{ $element }}</span>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <span class="btn btn-icon btn-sm border-0 btn-primary mr-2 my-1">{{ $page }}</span>
                @else
                    <a href="{{ $url }}" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">{{ $page }}</a>
                @endif
            @endforeach
        @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" aria-label="@lang('pagination.next')" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1"><i class="ki ki-bold-arrow-next icon-xs"></i></a>
    @else
        <span aria-label="@lang('pagination.next')" class="btn btn-icon btn-sm btn-secondary mr-2 my-1"><i class="ki ki-bold-arrow-next icon-xs"></i></span>
    @endif
@endif
