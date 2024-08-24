@inject('categoryRepo', 'App\Repositories\Categorys\CategoryRepositoryInterface')

@php
    $childCateNews = $categoryRepo->getCateNews($parentId);
@endphp

@if (count($childCateNews) > 0)
    <i class="fas fa-caret-down"></i>
    </a>
    <ul>
        <li>
            @foreach ($childCateNews as $value)
                {{-- {{ URL::route(\App\Models\View::PAGE_CATE_PRO, $value->slug) }} --}}
                @if (Route::has($value->slug))
                <a href="{{ URL::route($value->slug) }}">{{ $value->name_vi }}</a>
                @elseif ($parentId == 3)
                    <a href="{{ URL::route('shareholders', ['subCate' => $value->slug]) }}">{{ $value->name_vi }}</a>
                @else
                    {{ $value->name_vi }}
                @endif
            @endforeach
        </li>
    </ul>
@else
    </a>
@endif
