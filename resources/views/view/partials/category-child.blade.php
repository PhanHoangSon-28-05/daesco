@inject('categoryRepo', 'App\Repositories\Categorys\CategoryRepositoryInterface')

@php
    $childCategories = $categoryRepo->getChildNew($parentId);
@endphp

<ul>
    @foreach ($childCategories as $childCategory)
        <li>
            <a href="">{{ $childCategory->name_vi }}</a>
        </li>
    @endforeach
</ul>
