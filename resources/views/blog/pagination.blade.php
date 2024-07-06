@if ($paginator->hasPages())
    <div class="pagination">
        {{-- Previous Page Link --}}
        @if (!$paginator->onFirstPage())
            <a href="{{ $paginator->previousPageUrl() }}"><i class="fal fa-angle-double-left"></i></a>
        @endif

        @foreach ($elements as $element)
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a class="active">{{ $page }}</a>
                    @else
                        <a href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}"><i class="fal fa-angle-double-right"></i></a>
        @endif
    </div>
@endif
