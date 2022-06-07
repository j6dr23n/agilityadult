@if ($paginator->hasPages())
    <div class="d-md-flex align-items-center justify-content-between">
        <div class="font-secondary font-size-1 font-weight-normal text-gray-1300 text-center text-md-left mb-3 mb-md-0">
            {!! __('Showing') !!}
            <span class="font-medium">{{ $paginator->firstItem() }}</span>
            {!! __('to') !!}
            <span class="font-medium">{{ $paginator->lastItem() }}</span>
            {!! __('of') !!}
            <span class="font-medium">{{ $paginator->total() }}</span>
            {!! __('results') !!}
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination custom-pagination-dark justify-content-start mb-0 overflow-auto flex-nowrap">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                @else
                    <li class="page-item flex-shrink-0">
                        <a class="page-link" href="{{ $paginator->previousPageUrl() }}"><i
                                class="fas fa-long-arrow-alt-left ml-2 font-size-11"></i> Previous Page</a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="page-item disabled" aria-disabled="true"><span
                                class="page-link">{{ $element }}</span></li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="page-item flex-shrink-0 active" aria-current="page">
                                    <a class="page-link">{{ $page }}</a>
                                </li>
                            @else
                                <li class="page-item flex-shrink-0"><a class="page-link"
                                        href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item flex-shrink-0">
                        <a class="page-link" href="{{ $paginator->nextPageUrl() }}">Next Page<i
                                class="fas fa-long-arrow-alt-right ml-2 font-size-11"></i></a>
                    </li>
                @else
                @endif
            </ul>
        </nav>
    </div>
    @if ($paginator->onLastPage())
        <p class="font-bold text-white text-center mt-3">This is not the last page,we're limit to view video lists on free user.</p>
        <h3 class="font-bold text-white text-center mt-5 py-2" style="border:1px solid white"><a href="" data-toggle="modal"
            data-target="#loginModal">Sign In</a> to view more videos.</h3>
    @endif
@endif
