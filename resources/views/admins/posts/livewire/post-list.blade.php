<div class="">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title float-left text-uppercase">quản lý bài viết</h5>
            <button type="button" class="btn btn-sm rounded-0 btn-primary text-uppercase float-right" data-toggle="modal"
                data-target="#crudPostModal">
                Thêm mới
            </button>
        </div>
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
    
        <div class="card-table table-responsive shadow-none mb-2">
            <table class="table table-bordered">
                <thead>
                    <tr class="bg-secondary text-white">
                        <th>STT</th>
                        <th>Tiêu đề</th>
                        <th>Mô tả</th>
                        <th>
                            <div class="btn-group dropright">
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"
                                    aria-expanded="false">
                                    Danh mục
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#!" wire:click.prevent="$set('category_id', '')">Hiện tất cả</a>
                                    @foreach ($cates as $cate)
                                    <a class="dropdown-item" href="#!" wire:click.prevent="$set('category_id', {{ $cate->id }})">
                                        {{ $cate->name_vi }}
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                        </th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    @include('admins.posts.livewire.partials.post-table', ['posts' => $posts])
                </tbody>
            </table>
        </div>
        <div class="mb-5 mx-2">
            {{ $posts->links('vendor.livewire.table') }}
        </div>
    </div>
</div>

{{-- <div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header header-elements-inline bg-secondary text-white">
                <h6 class="card-title">
                    <i class="icon-table2 mr-2"></i>
                    Quản lý bài viết
                </h6>
                <div class="header-elements"></div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <select class="form-select form-select-sm custom-select mb-3 w-auto" wire:model="paginate">
                            @for ($page = 5; $page <= 20; $page+=5)
                            <option value="{{ $page }}">{{ $page }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col text-right">
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#crudPostModal">
                            <i class="icon-plus mr-2"></i>
                            Thêm mới
                        </button>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="table-responsive">
                            <table class="table table-bordered table-dark table-sm align-middle text-nowrap">
                                <thead>
                                    <tr class="bg-secondary text-white">
                                        <th>STT</th>
                                        <th>Tiêu đề</th>
                                        <th>Mô tả</th>
                                        <th>
                                            <div class="btn-group dropright">
                                                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"
                                                    aria-expanded="false">
                                                    Danh mục
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#!" wire:click.prevent="$set('category_id', '')">Hiện tất cả</a>
                                                    @foreach ($cates as $cate)
                                                    <a class="dropdown-item" href="#!" wire:click.prevent="$set('category_id', {{ $cate->id }})">
                                                        {{ $cate->name_vi }}
                                                    </a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    @include('admins.posts.livewire.partials.post-table', ['posts' => $posts])
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        {{ $posts->links('vendor.livewire.table') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}