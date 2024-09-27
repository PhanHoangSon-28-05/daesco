@push('style')
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }

        .crud-input,
        .input-group-text {
            border-color: rgb(158, 158, 158);
        }

        .crud-label {
            font-weight: bold;
        }
    </style>
@endpush

<div class="modal fade" id="crudServiceTypeModal" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" wire:loading.remove wire:target="modalSetup">
                    @if ($action == 'create')
                        Thêm mới danh mục
                    @elseif ($action == 'update')
                        Chỉnh sửa danh mục
                    @elseif ($action == 'delete')
                        Xác nhận xóa
                    @endif
                </h5>
                {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> --}}
            </div>

            <div class="container py-4" wire:loading wire:target="modalSetup">
                <div class="row align-items-center justify-content-center">
                    <div class="spinner-border spinner-border-sm" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <span class="ml-2">Vui lòng đợi</span>
                </div>
            </div>

            <form wire:submit.prevent="{{ $action }}"> {{-- Gọi sự kiện --}}
                <div class="modal-body" wire:loading.remove wire:target="modalSetup">

                    @if ($action == 'delete')
                        <div class="container-fluid">
                            <div class="row">
                                <span>Bạn có muốn xóa danh mục "{{ $title_vi }}
                                    @if ($title_vi == $title_en)
                                    @else
                                        {{ $title_en }}
                                        @endif"?
                                </span>
                            </div>
                        </div>
                    @else
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="row">
                                        <label class="crud-label p-0 mt-2 mb-0">Tên danh mục</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">VN:</span>
                                            </div>
                                            <input type="text" class="form-control input-group-append" wire:model.lazy="title_vi">
                                        </div>
                                        @error('title_vi')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="input-group mt-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">EN:</span>
                                            </div>
                                            <input type="text" class="form-control input-group-append" wire:model.lazy="title_en">
                                        </div>
                                        @error('title_en')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <label class="crud-label p-0 mt-2 mb-0">Hình thức</label>
                                        <div class="input-group">
                                            <select class="form-control" wire:model.lazy="type" @disabled($lock_type)>
                                                <option value="product">Sản phẩm</option>
                                                <option value="service">Dịch vụ</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="crud-label p-0 mt-2 mb-0">Loại mục cha</label>
                                        <div class="input-group">
                                            <select class="form-control" wire:model.lazy="parent_id">
                                                <option value="0">---</option>
                                                @foreach ($service_types as $value)
                                                @continue($value->id == ($service_type->id ?? 0))
                                                <option value="{{ $value->id }}">
                                                    {{ $value->title_vi }}
                                                    @if (strlen($value->title_en) > 0)
                                                        ({{ $value->title_en }})
                                                    @endif
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1"></div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <label class="crud-label p-0 mt-2 mb-0">Ảnh bìa</label>

                                        <div class="input-group">
                                            <input type="file" wire:model="pic" hidden id="cover_img">
                                            <label for="cover_img" class="w-100 border shadow mt-2">
                                                <img src="{{ asset($cover_img) }}" alt="" class="w-100" id="image-preview">
                                            </label>
                                        </div>

                                        @error('pic')
                                            <span class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            {{-- <span class="text-danger">{{ $message }}</span>
                            @enderror --}}
                        </div>
                </div>
                @endif
                <div class="modal-footer mt-2" wire:loading.remove wire:target="modalSetup">
                    <button type="button" class="btn btn-sm btn-secondary"
                        data-dismiss="modal">{{ $action == 'delete' ? 'Hủy' : 'Đóng' }}</button>
                    <button type="submit"
                        class="btn btn-sm btn-primary">{{ $action == 'delete' ? 'Đồng ý' : 'Lưu' }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('script')
    <script>
        $(document).ready(function() {
            $('#crudServiceTypeModal').on('show.bs.modal', function(e) {
                var id = e.relatedTarget.getAttribute('data-service-type-id') ?? 0
                @this.call('modalSetup', id)
            })

            $(document).on('closeCrudServiceType', function() {
                $('#crudServiceTypeModal').modal('hide')
            })
        })
    </script>
@endpush
