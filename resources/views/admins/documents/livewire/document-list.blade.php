<div class="card">
    <div class="card-header">
        <h5 class="card-title float-left text-uppercase">quản lý tài liệu</h5>
        <button type="button" class="btn btn-sm rounded-0 btn-primary text-uppercase float-right" data-toggle="modal"
            data-target="#crudDocumentModal">
            Thêm mới
        </button>
    </div>
    {{-- @livewire('search') --}}
    <div class="d-flex justify-content-center">
        <div class="col-sm-5 my-1">
            <label class="sr-only" for="myInput">Username</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text bg-secondary text-white"><i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                </div>
                <input type="text" class="form-control" id="myInput" wire:model.live="title"
                    placeholder="Search for names..">
            </div>
        </div>
    </div>

    <div class="card-table table-responsive shadow-none mb-2">
        <table class="table table-bordered">
            <thead>
                <tr class="bg-secondary text-white">
                    <th>STT</th>
                    <th>Tiêu đề</th>
                    <th>File</th>
                    <th>Lượt tải xuống</th>
                    <th>
                        <div class="btn-group dropright">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"
                                aria-expanded="false">
                                Danh mục
                            </button>
                            <div class="dropdown-menu">
                                {{-- <a class="dropdown-item" href="javascript:void(0);"
                                    onclick="filterPostsByCategory(null)">Hiện tất
                                    cả</a>
                                @foreach ($categories as $category)
                                    <a class="dropdown-item" href="javascript:void(0);"
                                        onclick="filterPostsByCategory({{ $category->id }})">{{ $category->name_vi }}</a>
                                @endforeach --}}
                                <a class="dropdown-item" href="#!" wire:click.prevent="$set('category_id', '')">Hiện tất cả</a>
                                @foreach ($categories as $category)
                                <a class="dropdown-item" href="#!" wire:click.prevent="$set('category_id', {{ $category->id }})">
                                    {{ $category->name_vi }}
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody id="myTable">
                @include('admins.documents.livewire.partials.document-table', ['documents' => $documents])
            </tbody>
        </table>
    </div>
    <div class="mb-5 mx-2">
        {{ $documents->links('vendor.livewire.table') }}
    </div>
</div>

@push('script')
@endpush
