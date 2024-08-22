@if ($paginator->hasPages())
    <ul class="pagination align-self-center" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span class="page-link" aria-hidden="true">
                    {{-- ← &nbsp; Previous --}}
                    Trước
                </span>
            </li>
        @else
            <li class="page-item">
                <button type="button" class="page-link" wire:click="previousPage('{{ $page_name ?? 'page' }}')" rel="prev" 
                aria-label="@lang('pagination.previous')">
                    {{-- ← &nbsp; Previous --}}
                    Trước
                </button>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- Array Of Links --}}
        {{--{{dd($paginator)}}--}}
        {{--{{dd($elements)}}--}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                    @elseif (($page == $paginator->currentPage() + 1 || $page == $paginator->currentPage() + 1) || $page == $paginator->lastPage())
                        <li class="page-item">
                            <button type="button" wire:click="gotoPage({{$page}}, '{{ $page_name ?? 'page' }}')" class="page-link">{{ $page }}</button>
                        </li>
                    @elseif (($page == $paginator->currentPage() - 1 || $page == $paginator->currentPage() - 1) || $page == $paginator->lastPage())
                        <li class="page-item">
                            <button type="button" wire:click="gotoPage({{$page}}, '{{ $page_name ?? 'page' }}')" class="page-link">{{ $page }}</button>
                        </li>
                    @elseif ($page == $paginator->lastPage() - 1)
                        <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ '...' }}</span></li>
                    @elseif($page == 2 && $paginator->currentPage() >= 4)
                        <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ '...' }}</span></li>
                    @elseif($page == 1 )
                        <li class="page-item">
                            <button type="button" wire:click="gotoPage({{$page}}, '{{ $page_name ?? 'page' }}')" class="page-link">{{ $page }}</button>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item shadow-sm shadow-1">
                <button type="button" class="page-link " wire:click="nextPage('{{ $page_name ?? 'page' }}')" rel="next" 
                aria-label="@lang('pagination.next')">
                    {{-- Next &nbsp; → --}}
                    Sau
                </button>
            </li>
        @else
            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span class="page-link" aria-hidden="true">
                    {{-- Next &nbsp; → --}}
                    Sau
                </span>
            </li>
        @endif
    </ul>
@endif

