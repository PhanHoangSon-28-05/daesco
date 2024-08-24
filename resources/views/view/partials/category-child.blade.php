@inject('categoryRepo', 'App\Repositories\Categorys\CategoryRepositoryInterface')

@php
    $childCategories = $categoryRepo->getChildNew($parentId);
@endphp

<ul>
    @foreach ($childCategories as $childCategory)
        @if ($parentId == 57)
            <li>
                <a
                    href="{{ URL::route('development-apparatus', '#' . $childCategory->slug) }}">{{ $childCategory->name_vi }}</a>
            </li>
        @else
            <li>
                <a href="">{{ $childCategory->name_vi }}</a>
            </li>
        @endif
    @endforeach
</ul>
