@inject('categoryRepo', 'App\Repositories\Categorys\CategoryRepositoryInterface')

{{-- @php
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
@endforeach --}}

@foreach ($categories as $category)
    <option value="{{ $category->id }}">{{ $prefix }} {{ $category->name_vi }}
        ({{ $category->name_en }})
    </option>
    @if($category->child_categories->count() > 0)
    @include('admins.posts.livewire.partials.category-options', [
        'categories' => $category->child_categories,
        'prefix' => $prefix . '--',
    ])
    @endif
@endforeach
