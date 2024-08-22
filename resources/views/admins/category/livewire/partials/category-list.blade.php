@push('style')
    <style>
        i {
            font-size: 10px
        }
    </style>
@endpush


@inject('categoryRepo', 'App\Repositories\Categorys\CategoryRepositoryInterface')

@php
    $childCategories = $categoryRepo->getChildNew($parentId);
@endphp

@foreach ($childCategories as $childCategory)
    <li class="list-group-item p-0 mb-1 ml-{{ $prefix }}">
        <div class="col-10">
            <p class="mb-0">
                @if ($prefix == 1)
                    <i class="fa-solid fa-plus"></i>
                @elseif ($prefix == 2)
                    <i class="fa-solid fa-circle"></i>
                @endif
                {{ $childCategory->name_vi }}
                @if (strlen($childCategory->name_en) > 0)
                    ({{ $childCategory->name_en }})
                @endif
            </p>
        </div>

        <div class="col-2 p-0">
            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#crudCategoryNewsModal"
                data-category-id="{{ $childCategory->id }}">
                <i class="fa-solid fa-pen"></i>
            </button>
            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                data-target="#crudCategoryNewsModal" data-category-id="{{ -$childCategory->id }}">
                <i class="fa-solid fa-trash"></i>
            </button>
        </div>
    </li>
    @include('admins.category.livewire.partials.category-list', [
        'parentId' => $childCategory->id,
        'prefix' => $prefix + 1,
    ])
@endforeach
