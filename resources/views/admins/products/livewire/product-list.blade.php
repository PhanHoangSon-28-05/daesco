<div class="card">
    <div class="card-header">
        <h5 class="card-title float-left text-uppercase">Quản lý sản phẩm</h5>
        <button type="button" class="btn btn-sm rounded-0 btn-primary text-uppercase float-right" data-toggle="modal"
            data-target="#crudProductModal">
            Thêm mới
        </button>
    </div>
    {{-- @livewire('search') --}}
    <div class="row justify-content-end p-2 m-0">
        <div class="col-sm-5">
            <label class="sr-only" for="myInput">Username</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text bg-secondary text-white"><i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                </div>
                <input type="text" class="form-control" id="myInput" wire:model.live="name"
                    placeholder="Search for names..">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="row justify-content-end">
                <div class="col-form-label"><i class="icon-filter3 mr-1"></i>Năm</div>
                <select class="form-control w-auto ml-1" wire:model.lazy="selected_year">
                    <option value="">Tất cả</option>
                    @foreach ($years as $year)
                    <option value="{{ $year->name }}">{{ $year->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="card-table table-responsive shadow-none">
        <table class="table table-bordered">
            <thead>
                <tr class="bg-secondary text-white">
                    <th>STT</th>
                    <th>Tiêu đề (Title)</th>
                    <th>Name</th>
                    <th>Danh mục (Category)</th>
                    <th>Số lượng ảnh</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody id="myTable">
                @if (isset($products))
                    @if ($products !== null && count($products) > 0)
                        @foreach ($products as $product)
                            <tr>
                                <td scope="row" class="text-center">{{ $loop->iteration }}</td>
                                <td scope="row" class="text-center">{{ $product->title_vi }}</td>
                                <td scope="row" class="text-center">{{ $product->title_en }}</td>
                                <td scope="row" class="text-center">{{ $product->service_type->title_vi ?? '' }}</td>
                                <td scope="row" class="text-center">
                                    <button type="button" class="btn btn-sm rounded-0 btn-primary text-uppercase"
                                        data-toggle="modal" data-target="#imageProduct"
                                        data-product-id={{ $product->id }}>
                                        Thêm và sửa ảnh
                                    </button>
                                </td>
                                <td scope="row" class="text-center">
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                        data-target="#crudProductModal" data-product-id={{ $product->id }}><i
                                            class="fa-solid fa-pen"></i></button>
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                        data-target="#crudProductModal" data-product-id={{ -$product->id }}><i
                                            class="fa-solid fa-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td scope="row" colspan="5" class="text-center">(Không có dữ liệu)</td>
                        </tr>
                    @endif
                @endif
            </tbody>
        </table>
    </div>
</div>
