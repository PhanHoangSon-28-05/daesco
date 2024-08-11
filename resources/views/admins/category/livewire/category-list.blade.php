@push('style')
    <style>
    </style>
@endpush

<div class="content">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <!-- Title -->
                <div class="mb-3 mt-1">
                    <h5 class="mb-0 ml-2 font-weight-semibold float-left text-uppercase">quản lý loại tin tức</h5>
                    <button type="button" class="btn btn-sm rounded-0 btn-primary text-uppercase float-right"
                        data-toggle="modal" data-target="#crudCategoryNewsModal" wire:click="$dispatch('setDefaultType')">
                        Thêm mới
                    </button>
                </div>
                <!-- /title -->

                <div class="list">
                    <ul class="list-group">
                        @foreach ($categories_news as $value)
                            <li class="list-group-item p-0 mb-1">
                                <div class="col-10">
                                    <p class="mb-0"><i class="fa-solid fa-minus"></i> {{ $value->name_vi }}
                                        ({{ $value->name_en }})
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
                                'type' => $value->type,
                                'prefix' => 1,
                            ])
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-lg-6">

            <div class="card">
                <!-- Title -->
                <div class="mb-3 mt-1">
                    <h5 class="mb-0 ml-2 font-weight-semibold float-left text-uppercase">quản lý loại sản phẩm</h5>
                    <button type="button" class="btn btn-sm rounded-0 btn-primary text-uppercase float-right"
                        data-toggle="modal" data-target="#crudCategoryProductsModal"
                        wire:click="$dispatch('setDefaultType')">
                        Thêm mới
                    </button>
                </div>
                <!-- /title -->

                <div class="list">
                    <ul class="list-group">
                        @foreach ($categories_products as $value)
                            <li class="list-group-item p-0 mb-1">
                                <div class="col-10">
                                    <p class="mb-0"><i class="fa-solid fa-minus"></i> {{ $value->name_vi }}
                                        ({{ $value->name_en }})
                                    </p>
                                </div>
                                <div class="col-2 p-0">
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                        data-target="#crudCategoryProductsModal" data-category-id="{{ $value->id }}">
                                        <i class="fa-solid fa-pen"></i>
                                    </button>
                                    @if (in_array($value->name_en, ['Home', 'Introduce', 'Recruitment', 'Contact']))
                                    @else
                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                            data-target="#crudCategoryProductsModal"
                                            data-category-id="{{ -$value->id }}">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    @endif
                                </div>
                            </li>

                            @include('admins.category.livewire.partials.category-list', [
                                'parentId' => $value->id,
                                'type' => $value->type,
                                'prefix' => 1,
                            ])
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>
