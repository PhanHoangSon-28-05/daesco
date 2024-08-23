@if ($paginator->hasPages())
<ul>    
    @if ($paginator->onFirstPage())
    <li class="page-item disabled">
        <span class="next page-link">
            <i class="icon-arrow-left12"></i>
        </span>
    </li>
    @else
    <li class="page-item">
        <a class="next page-link" href="{{ $paginator->previousPageUrl() }}">
            <i class="icon-arrow-left12"></i>
        </a>
    </li>
    @endif

    @foreach ($elements as $element)
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                <li class="page-item active"><span> <span aria-current="page" class="page-link current">{{ $page }}</span></span></li>
                @elseif (($page == $paginator->currentPage() + 1 || $page == $paginator->currentPage() + 1) || $page == $paginator->lastPage())
                <li class="page-item"><span> <a class="page-link" href="{{ $url }}">{{ $page }}</a></span></li>
                @elseif (($page == $paginator->currentPage() - 1 || $page == $paginator->currentPage() - 1) || $page == $paginator->lastPage())
                <li class="page-item"><span> <a class="page-link" href="{{ $url }}">{{ $page }}</a></span></li>
                @elseif ($page == $paginator->lastPage() - 1)
                <li class="page-item disabled" aria-disabled="true"><span> <span class="page-link">...</span></span></li>
                @elseif($page == 2 && $paginator->currentPage() >= 4)
                <li class="page-item disabled" aria-disabled="true"><span> <span class="page-link">...</span></span></li>
                @elseif($page == 1 )
                <li class="page-item"><span> <a class="page-link" href="{{ $url }}">{{ $page }}</a></span></li>
                @endif
            @endforeach
        @endif
    @endforeach

    @if ($paginator->hasMorePages())
    <li class="page-item">
        <a class="next page-link" href="{{ $paginator->nextPageUrl() }}">
            <i class="icon-arrow-right13"></i>
        </a>
    </li>
    @else
    <li class="page-item disabled">
        <span class="next page-link">
            <i class="icon-arrow-right13"></i>
        </span>
    </li>
    @endif
</ul>
@endif

{{-- <ul>
        <li class="page-item active"><span> <span aria-current="page"
                    class="page-link current">1</span></span></li>
        <li class="page-item"><span> <a class="page-link" href="#">2</a></span>
        </li>
        <li class="page-item"><span> <a class="page-link" href="#">3</a></span>
        </li>
        <li class="page-item"><span> <span class="page-link dots">&hellip;</span></span></li>
        <li class="page-item"><span> <a class="page-link" href="#">61</a></span>
        </li>
        <li class="page-item"><span> <a class="page-link" href="#">62</a></span>
        </li>
        <li class="page-item"><span> <a class="page-link" href="#">63</a></span>
        </li>
        <li class="page-item"><span> <a class="next page-link" href="#"><span
                        class="navi next"><i class="fal fa-angle-right"></i></span></a></span>
        </li>
    </ul> --}}