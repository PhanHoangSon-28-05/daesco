@inject('categoryRepo', 'App\Repositories\Categorys\CategoryRepositoryInterface')

@php
    $childCategories = $categoryRepo->getChildPro($parentId);
@endphp

@foreach ($childCategories as $childCategory)
    <option value="{{ $childCategory->id }}">{{ $prefix }} {{ $childCategory->name_vi }}
        ({{ $childCategory->name_en }})
    </option>
    @include('admins.products.livewire.partials.category-options', [
        'parentId' => $childCategory->id,
        'prefix' => $prefix . '--',
    ])
@endforeach
