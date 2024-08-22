@inject('categoryRepo', 'App\Repositories\Categorys\CategoryRepositoryInterface')

@php
    $childCategories = $categoryRepo->getChildNew($parentId);
@endphp

@foreach ($childCategories as $childCategory)
    <option value="{{ $childCategory->id }}">
        {{ $prefix }}
        {{ $childCategory->name_vi }}
        @if (strlen($childCategory->name_en) > 0)
            ({{ $childCategory->name_en }})
        @endif
    </option>
    @include('admins.category.livewire.partials.category-options', [
        'parentId' => $childCategory->id,
        'prefix' => $prefix . '--',
    ])
@endforeach
