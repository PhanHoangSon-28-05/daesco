@inject('categoryRepo', 'App\Repositories\Categorys\CategoryRepositoryInterface')

@php
    $childCategories = $categoryRepo->getChildNew($parentId);
@endphp

<ul>
    @foreach ($childCategories as $childCategory)
        <li><a
                href="{{ URL::route(\App\Models\View::PAGE_CATE_PRO, $childCategory->slug) }}">{{ $childCategory->name_vi }}</a>
        </li>
        @include('view.partials.category-child', [
            'parentId' => $childCategory->id,
        ])
    @endforeach
</ul>
