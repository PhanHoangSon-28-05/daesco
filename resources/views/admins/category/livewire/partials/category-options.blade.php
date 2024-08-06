@inject('categoryRepo', 'App\Repositories\Categorys\CategoryRepositoryInterface')

@php
    if ($type == 1) {
        $childCategories = $categoryRepo->getChildNew($parentId);
    } else {
        $childCategories = $categoryRepo->getChildPro($parentId);
    }
@endphp

@foreach ($childCategories as $childCategory)
    <option value="{{ $childCategory->id }}">
        @if ($prefix == 1)
            <i class="fa-solid fa-plus"></i>
        @elseif ($prefix == 2)
            <i class="fa-solid fa-circle"></i>
        @endif
        {{ $childCategory->name_vi }}
        @if (strlen($childCategory->name_en) > 0)
            ({{ $childCategory->name_en }})
        @endif
    </option>
    @include('admins.category.livewire.partials.category-options', [
        'parentId' => $childCategory->id,
        'prefix' => $prefix + 1,
    ])
@endforeach
