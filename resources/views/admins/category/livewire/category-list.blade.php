@push('style')
    <style>
    </style>
@endpush

<div class="content-fluid">
    <div class="card">
        <!-- Title -->
        <button type="button" class="btn btn-sm rounded-0 btn-primary text-uppercase float-right w-25" data-toggle="modal"
            data-target="#crudCategoryNewsModal" wire:click="$dispatch('setDefaultType')">
            Thêm mới
        </button>

        <div class="list">
            <ul class="list-group">
                @foreach ($categories_news as $value)
                    <li class="list-group-item p-0 mb-1">
                        <div class="col-10">
                            <p class="mb-0 font-weight-bold">{{ $value->stt }}.
                                {{ $value->name_vi }}
                                @if (strlen($value->name_en) > 0)
                                    ({{ $value->name_en }})
                                @endif
                            </p>
                        </div>

                        <div class="col-2 p-0">
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                data-target="#crudCategoryNewsModal" data-category-id="{{ $value->id }}">
                                <i class="fa-solid fa-pen"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                data-target="#crudCategoryNewsModal" data-category-id="{{ -$value->id }}">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    </li>
                    @include('admins.category.livewire.partials.category-list', [
                        'parentId' => $value->id,
                        'prefix' => 1,
                    ])
                @endforeach
            </ul>
        </div>
    </div>
</div>
