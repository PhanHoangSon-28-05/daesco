<div class="card">
    <div class="card-header">
        <h5 class="card-title float-left text-uppercase">Quản lý sản phẩm</h5>
        <button type="button" class="btn btn-sm rounded-0 btn-primary text-uppercase float-right" data-toggle="modal"
            data-target="#crudProductModal">
            Thêm mới
        </button>
    </div>
    @livewire('search')
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
                                <td scope="row" class="text-center">{{ $product->category_id }}</td>
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
