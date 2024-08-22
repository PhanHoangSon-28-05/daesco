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
                <a href="">{{ $value->name_vi }}</a>
            @endforeach
        </li>
    </ul>
@else
    </a>
@endif
