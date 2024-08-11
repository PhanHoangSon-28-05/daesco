@push('style')
@endpush
<!-- Modal -->
<div class="">
    <div class="modal fade" id="crudProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
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
                                        Thêm sản phẩm
                                    @elseif ($action == 'update')
                                        Chỉnh sửa sản phẩm
                                    @elseif ($action == 'delete')
                                        Xác nhận sản phẩm
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
                                            {{-- @dd($title_en); --}}
                                            <span>Bạn có muốn xóa sản phẩm "
                                                @if ($title_vi == $title_en)
                                                    {{ $title_vi }}
                                                @else
                                                    {{ $title_vi }}({{ $title_en }})
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
                                                    wire:model.lazy="title_vi">
                                            </div>
                                            @error('title_vi')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="row">
                                            <label class="crud-label p-0 mt-2 mb-0">Trọng tải:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control crud-input"
                                                    wire:model.lazy="payload_vi">
                                            </div>
                                            @error('payload_vi')
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
                                                <textarea class="form-control" wire:model.defer="general_specifications_vi" id="editor_general_specifications_vi"
                                                    placeholder="Required example textarea"></textarea>
                                            </div>
                                            @error('general_specifications_vi')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="row" wire:ignore>
                                            <label class="crud-label p-0 mt-2 mb-0">Tính năng:</label>
                                            <div class="col-12 p-0">
                                                <textarea class="form-control" wire:model.defer ="features_vi" id="editor_features_vi"
                                                    placeholder="Required example textarea"></textarea>
                                            </div>
                                            @error('features_vi')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="row">
                                            <label class="crud-label p-0 mt-2 mb-0">Giá tiền:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control crud-input"
                                                    wire:model.lazy="price">
                                            </div>
                                            @error('price')
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
                                                            'admins.products.livewire.partials.category-options',
                                                            ['parentId' => $category->id, 'prefix' => '--']
                                                        )
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        @if ($action == 'create')
                                            <div class="row">
                                                <label class="crud-label p-0 mt-2 mb-0">Thêm hình ảnh (Tối đa: 20
                                                    bức)</label>
                                                <div class="input-group mb-3">
                                                    <input type="file" class="" multiple id="imageUpload"
                                                        wire:model="images">
                                                </div>
                                                @if ($images)
                                                    @foreach ($images as $image)
                                                        <img src="{{ $image->temporaryUrl() }}"
                                                            class="p-0 mr-2 mb-1 col-1">
                                                    @endforeach
                                                @endif
                                                @error('images.*')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        @endif

                                        <div class="row">
                                            <label class="crud-label p-0 mt-2 mb-0">Link:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control crud-input"
                                                    wire:model.lazy="links">
                                            </div>
                                            @error('links')
                                                <span class="text-danger">{{ $message }}</span>
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
                                        Create product
                                    @elseif ($action == 'update')
                                        Update product
                                    @elseif ($action == 'delete')
                                        Confirm product deletion
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
                                                    wire:model.lazy="title_en">
                                            </div>
                                            @error('title_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="row">
                                            <label class="crud-label p-0 mt-2 mb-0">Payload:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control crud-input"
                                                    wire:model.lazy="payload_en">
                                            </div>
                                            @error('payload_en')
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
                                            <label class="crud-label p-0 mt-2 mb-0">General specifications</label>
                                            <div class="col-12 p-0">
                                                <textarea class="form-control" wire:model.lazy="general_specifications_en" id="editor_general_specifications_en"
                                                    placeholder="Required example textarea"></textarea>
                                            </div>
                                            @error('general_specifications_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="row" wire:ignore>
                                            <label class="crud-label p-0 mt-2 mb-0">Features:</label>
                                            <div class="col-12 p-0">
                                                <textarea class="form-control" wire:model.lazy="features_en" id="editor_features_en"
                                                    placeholder="Required example textarea"></textarea>
                                            </div>
                                            @error('features_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="row">
                                            <label class="crud-label p-0 mt-2 mb-0">Price:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control crud-input"
                                                    wire:model.lazy="price">
                                            </div>
                                            @error('price')
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
                                                            'admins.products.livewire.partials.category-options',
                                                            ['parentId' => $category->id, 'prefix' => '--']
                                                        )
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        @if ($action == 'create')
                                            <div class="row">
                                                <label class="crud-label p-0 mt-2 mb-0">Thêm hình ảnh (Image Upload)
                                                    (Tối đa: 20
                                                    bức)</label>
                                                <div class="input-group mb-3">
                                                    <input type="file" class="" multiple id="imageUpload"
                                                        wire:model="images">
                                                </div>
                                                @if ($images)
                                                    @foreach ($images as $image)
                                                        <img src="{{ $image->temporaryUrl() }}"
                                                            class="p-0 mr-2 mb-1 col-2">
                                                    @endforeach
                                                @endif
                                                @error('images.*')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        @endif

                                        <div class="row">
                                            <label class="crud-label p-0 mt-2 mb-0">Link:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control crud-input"
                                                    wire:model.lazy="links">
                                            </div>
                                            @error('links')
                                                <span class="text-danger">{{ $message }}</span>
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
            $('#crudProductModal').on('show.bs.modal', function(e) {
                var id = e.relatedTarget.getAttribute('data-product-id') ?? 0;
                @this.call('modalSetup', id);
            });

            $(document).on('closeCrudProduct', function() {
                $('#crudProductModal').modal('hide');
            });

            Livewire.on('clearFileInput', function() {
                $('#imageUpload').val('');
            });


            $('#crudProductModal').on('shown.bs.modal', function() {
                CKEDITOR.replace('editor_general_specifications_vi');
                CKEDITOR.instances.editor_general_specifications_vi.on('change', function() {
                    @this.set('general_specifications_vi', CKEDITOR.instances
                        .editor_general_specifications_vi.getData());
                });
            });

            $('#crudProductModal').on('shown.bs.modal', function() {
                CKEDITOR.replace('editor_features_vi');
                CKEDITOR.instances.editor_features_vi.on('change', function() {
                    @this.set('features_vi', CKEDITOR.instances
                        .editor_features_vi.getData());
                });
            });
            $('#crudProductModal').on('shown.bs.modal', function() {
                CKEDITOR.replace('editor_general_specifications_en');
                CKEDITOR.instances.editor_general_specifications_en.on('change', function() {
                    @this.set('general_specifications_en', CKEDITOR.instances
                        .editor_general_specifications_en.getData());
                });
            });

            $('#crudProductModal').on('shown.bs.modal', function() {
                CKEDITOR.replace('editor_features_en');
                CKEDITOR.instances.editor_features_en.on('change', function() {
                    @this.set('features_en', CKEDITOR.instances
                        .editor_features_en.getData());
                });
            });

            $('#crudProductModal').on('hidden.bs.modal', function() {
                for (instance in CKEDITOR.instances) {
                    CKEDITOR.instances[instance].destroy(true);
                }
            });
        });
    </script>
@endpush
