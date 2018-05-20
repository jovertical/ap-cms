@if ($paginator->hasPages())
    <div class="product-pagination col-sm-6">
        <div class="pagination_group">
            <ul class="pagination">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="prev">
                        <a href="#" class="disabled">
                            <i class="fa fa-angle-double-left"></i>
                        </a>
                    </li>
                @else
                    <li class="prev">
                        <a href="{{ $paginator->previousPageUrl() }}">
                            <i class="fa fa-angle-double-left"></i>
                        </a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="disabled"><span>{{ $element }}</span></li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="active">
                                    <span>{{ $page }}</span>
                                </li>
                            @else
                                <li>
                                    <a href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            
                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="next">
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next">
                            <i class="fa fa-angle-double-right"></i>
                        </a>
                    </li>
                @else
                    <li class="next">
                        <span class="disabled">
                            <i class="fa fa-angle-double-right"></i>
                        </span>
                    </li>
                @endif
            </ul>
        </div>
    </div>
@endif

