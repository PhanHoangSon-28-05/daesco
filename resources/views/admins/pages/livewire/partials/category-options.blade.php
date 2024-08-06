@inject('categoryRepo', 'App\Repositories\Categorys\CategoryRepositoryInterface')

@php
    $childCategories = $categoryRepo->getChildNew($parentId);
@endphp

@foreach ($childCategories as $childCategory)
    <option value="{{ $childCategory->id }}">{{ $prefix }} {{ $childCategory->name_vi }}
        ({{ $childCategory->name_en }})
    </option>
    @include('admins.pages.livewire.partials.category-options', [
        'parentId' => $childCategory->id,
        'prefix' => $prefix . '--',
    ])
@endforeach
