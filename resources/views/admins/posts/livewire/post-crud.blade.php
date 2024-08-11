@push('style')
@endpush
<!-- Modal -->
<div class="">
    <div class="modal fade" id="crudPostModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        wire:ignore.self>
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content" wire:loading.remove wire:target="modalSetup">
                @if ($action == 'delete')
                @else
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                                role="tab" aria-controls="pills-home" aria-selected="true">Tiếng Việt</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                                role="tab" aria-controls="pills-profile" aria-selected="false">Tiếng Anh</a>
                        </li>
                    </ul>
                @endif

                <form wire:submit.prevent="{{ $action }}"> {{-- Gọi sự kiện --}}
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" wire:ignore.self
                            aria-labelledby="pills-home-tab">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel" wire:loading.remove
                                    wire:target="modalSetup">
                                    @if ($action == 'create')
                                        Thêm trang
                                    @elseif ($action == 'update')
                                        Chỉnh sửa trang
                                    @elseif ($action == 'delete')
                                        Xác nhận trang
                                    @endif
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="container py-4" wire:loading wire:target="modalSetup">
                                <div class="row align-items-center justify-content-center">
                                    <div class="spinner-border spinner-border-sm" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                    <span class="ml-2">Vui lòng đợi</span>
                                </div>
                            </div>

                            <div class="modal-body" wire:loading.remove wire:target="modalSetup">
                                @if ($action == 'delete')
                                    <div class="container-fluid">
                                        <div class="row">
                                            {{-- @dd($name_en); --}}
                                            <span>Bạn có muốn xóa trang "
                                                @if ($name_vi == $name_en)
                                                    {{ $name_vi }}
                                                @else
                                                    {{ $name_vi }}({{ $name_en }})
                                                    @endif"?
                                            </span>
                                        </div>
                                    </div>
                                @else
                                    <div class="container-fluid">
                                        <div class="row">
                                            <label class="crud-label p-0 mt-2 mb-0">Tiêu đề:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control crud-input"
                                                    wire:model.lazy="name_vi">
                                            </div>
                                            @error('name_vi')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="row">
                                            <label class="crud-label p-0 mt-2 mb-0">Mô tả:</label>
                                            <div class="input-group">
                                                <textarea type="text" class="form-control crud-input" wire:model.lazy="description_vi"></textarea>
                                            </div>
                                            @error('description_vi')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="row" wire:ignore>
                                            <label class="crud-label p-0 mt-2 mb-0">Thông tin chung</label>
                                            <div class="col-12 p-0">
                                                <textarea class="form-control" wire:model.lazy="detail_vi" id="editor_detail_vi"
                                                    placeholder="Required example textarea"></textarea>
                                            </div>
                                            @error('detail_vi')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="row">
                                            <label class="crud-label p-0 mt-2 mb-0">Danh mục</label>
                                            <div class="input-group">
                                                <select class="form-control" wire:model.lazy="category_id">
                                                    <option value="0">---</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name_vi }}
                                                            ({{ $category->name_en }})
                                                        </option>
                                                        @include(
                                                            'admins.posts.livewire.partials.category-options',
                                                            ['parentId' => $category->id, 'prefix' => '--']
                                                        )
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mt-2">
                                            <label class="crud-label p-0 mt-2 mb-0">Năm</label>
                                            <div class="input-group">
                                                <select class="form-control" wire:model.lazy="year_id">
                                                    <option value="0">---</option>
                                                    @foreach ($years as $year)
                                                        <option value="{{ $year->id }}">{{ $year->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <input type="file" wire:model="pic">
                                            @if ($pic)
                                                @if (gettype($pic) == 'string')
                                                    <img src="{{ asset('storage/' . $pic) }}"
                                                        class="p-0 mr-2 mb-1 col-4" id="image-preview">
                                                @else
                                                    <img src="{{ asset($pic->temporaryUrl()) }}"
                                                        class="p-0 mr-2 mb-1 col-4" id="image-preview">
                                                @endif
                                            @endif

                                            @error('pic')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" wire:ignore.self
                            aria-labelledby="pills-profile-tab">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel" wire:loading.remove
                                    wire:target="modalSetup">
                                    @if ($action == 'create')
                                        Create post
                                    @elseif ($action == 'update')
                                        Update post
                                    @elseif ($action == 'delete')
                                        Confirm post deletion
                                    @endif
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="container py-4" wire:loading wire:target="modalSetup">
                                <div class="row align-items-center justify-content-center">
                                    <div class="spinner-border spinner-border-sm" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                    <span class="ml-2">Please wait</span>
                                </div>
                            </div>

                            <div class="modal-body" wire:loading.remove wire:target="modalSetup">
                                @if ($action == 'delete')
                                @else
                                    <div class="container-fluid">
                                        <div class="row">
                                            <label class="crud-label p-0 mt-2 mb-0">Name:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control crud-input"
                                                    wire:model.lazy="name_en">
                                            </div>
                                            @error('name_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="row">
                                            <label class="crud-label p-0 mt-2 mb-0">Description:</label>
                                            <div class="input-group">
                                                <textarea type="text" class="form-control crud-input" wire:model.lazy="description_en"></textarea>
                                            </div>
                                            @error('description_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="row" wire:ignore>
                                            <label class="crud-label p-0 mt-2 mb-0">Detail</label>
                                            <div class="col-12 p-0">
                                                <textarea class="form-control" wire:model.lazy="detail_en" id="editor_detail_en"
                                                    placeholder="Required example textarea"></textarea>
                                            </div>
                                            @error('detail_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="row">
                                            <label class="crud-label p-0 mt-2 mb-0">Parent</label>
                                            <div class="input-group">
                                                <select class="form-control" wire:model.lazy="category_id">
                                                    <option value="0">---</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name_en }}
                                                            ({{ $category->name_vi }})
                                                        </option>
                                                        @include(
                                                            'admins.posts.livewire.partials.category-options',
                                                            ['parentId' => $category->id, 'prefix' => '--']
                                                        )
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <label class="crud-label p-0 mt-2 mb-0">Year</label>
                                            <div class="input-group">
                                                <select class="form-control" wire:model.lazy="year_id">
                                                    <option value="0">---</option>
                                                    @foreach ($years as $year)
                                                        <option value="{{ $year->id }}">{{ $year->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <input type="file" wire:model="pic">

                                            @if ($pic)
                                                @if (gettype($pic) == 'string')
                                                    <img src="{{ asset('storage/' . $pic) }}"
                                                        class="p-0 mr-2 mb-1 col-4" id="image-preview">
                                                @else
                                                    <img src="{{ asset($pic->temporaryUrl()) }}"
                                                        class="p-0 mr-2 mb-1 col-4" id="image-preview">
                                                @endif
                                            @endif

                                            @error('pic')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">
                            @if ($action == 'create')
                                Thêm
                            @elseif ($action == 'update')
                                Cập nhật
                            @elseif ($action == 'delete')
                                Xóa
                            @endif
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@push('script')
    <script>
        $(document).ready(function() {
            $('#crudPostModal').on('show.bs.modal', function(e) {
                var id = e.relatedTarget.getAttribute('data-post-id') ?? 0;
                @this.call('modalSetup', id);
            });

            $(document).on('closeCrudPost', function() {
                $('#crudPostModal').modal('hide');
            });


            $('#crudPostModal').on('shown.bs.modal', function() {
                CKEDITOR.replace('editor_detail_vi');
                CKEDITOR.instances.editor_detail_vi.on('change', function() {
                    @this.set('detail_vi', CKEDITOR.instances
                        .editor_detail_vi.getData());
                });
            });

            $('#crudPostModal').on('shown.bs.modal', function() {
                CKEDITOR.replace('editor_detail_en');
                CKEDITOR.instances.editor_detail_en.on('change', function() {
                    @this.set('detail_en', CKEDITOR.instances
                        .editor_detail_en.getData());
                });
            });

            $('#crudPostModal').on('hidden.bs.modal', function() {
                for (instance in CKEDITOR.instances) {
                    CKEDITOR.instances[instance].destroy(true);
                }
            });
        });
    </script>
@endpush
