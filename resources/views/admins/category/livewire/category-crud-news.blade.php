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

<div class="modal fade" id="crudCategoryNewsModal" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" wire:loading.remove wire:target="modalSetup">
                    @if ($action == 'create')
                        Thêm mới loại tin tức
                    @elseif ($action == 'update')
                        Chỉnh sửa loại tin tức
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
                                <span>Bạn có muốn xóa loại "{{ $name_vi }}
                                    @if ($name_vi == $name_en)
                                    @else
                                        {{ $name_en }}
                                        @endif"?
                                </span>
                            </div>
                        </div>
                    @else
                        <div class="container-fluid">
                            <div class="row">
                                <label class="crud-label p-0 mt-2 mb-0">Tên loại</label>
                                <div class="input-group">
                                    <div class="col-6 p-0">
                                        <label class="crud-label col-1 mx-1 p-0">VN:</label>
                                        <input class="col-10 p-0" type="text" class="form-control crud-input"
                                            wire:model.lazy="name_vi">
                                        @error('name_vi')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-6 p-0">
                                        <label class="crud-label col-1 mx-1 p-0">EN:</label>
                                        <input class="col-10 p-0" type="text" class="form-control crud-input"
                                            wire:model.lazy="name_en" @if (in_array($name_en, ['Home', 'Introduce', 'Recruitment', 'Contact'])) readonly @endif>
                                        @error('name_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="crud-label p-0 mt-2 mb-0">Loại mục cha</label>
                                <div class="input-group">
                                    <select class="form-control" wire:model.lazy="parent_id">
                                        <option value="0">---</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name_vi }}
                                                ({{ $category->name_en }})
                                            </option>
                                            @include('admins.category.livewire.partials.category-options', [
                                                'parentId' => $category->id,
                                                'type' => $category->type,
                                                'prefix' => 1,
                                            ])
                                        @endforeach
                                    </select>
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
            $('#crudCategoryNewsModal').on('show.bs.modal', function(e) {
                var id = e.relatedTarget.getAttribute('data-category-id') ?? 0
                @this.call('modalSetup', id)
            })

            $(document).on('closeCrudCategoryNews', function() {
                $('#crudCategoryNewsModal').modal('hide')
            })
        })
    </script>
@endpush
