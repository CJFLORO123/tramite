@if ($paginator->hasPages())
    @if ($paginator->onFirstPage())
    <a href="javascript:;" class="btn btn-danger disabled"><i class="fas fa-chevron-left"></i></a>
    @else
    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')" class="btn btn-danger tooltips" data-container="body" data-placement="top" data-original-title="Anterior"><i class="fas fa-chevron-left"></i></a>
    @endif

    {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active" aria-current="page"><span>{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

    @if ($paginator->hasMorePages())
    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')" class="btn btn-danger tooltips" data-container="body" data-placement="top" data-original-title="Siguiente"><i class="fas fa-chevron-right"></i></a>
    @else
    <a href="javascript:;" class="btn btn-danger disabled"><i class="fas fa-chevron-right"></i></a>
    @endif
@else
<a href="javascript:;" class="btn btn-danger disabled"><i class="fas fa-chevron-left"></i></a>
<a href="javascript:;" class="btn btn-danger disabled"><i class="fas fa-chevron-right"></i></a>
@endif