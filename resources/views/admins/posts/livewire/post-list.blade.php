<div class="card">
    <div class="card-header">
        <h5 class="card-title float-left text-uppercase">quản lý bài viết</h5>
        <button type="button" class="btn btn-sm rounded-0 btn-primary text-uppercase float-right" data-toggle="modal"
            data-target="#crudPostModal">
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
                <input type="text" class="form-control" id="myInput" wire:model.live="name"
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
                    <th>Mô tả</th>
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
                                @foreach ($cates as $cate)
                                    <a class="dropdown-item" href="javascript:void(0);"
                                        onclick="filterPostsByCategory({{ $cate->id }})">{{ $cate->name_vi }}</a>
                                @endforeach --}}
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

@push('script')
    <script>
        function filterPostsByCategory(categoryId) {
            $.ajax({
                url: '{{ route('posts.filter') }}',
                method: 'GET',
                data: {
                    category_id: categoryId
                },
                success: function(response) {
                    $('#myTable').html(response);
                }
            });
        }
    </script>
@endpush
