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

<div>
    <div class="modal fade" id="crudRoleModal" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" wire:loading.remove wire:target="modalSetup">
                        @if ($action == 'create')
                            Thêm mới chức vụ
                        @elseif ($action == 'update')
                            Chỉnh sửa chức vụ
                        @elseif ($action == 'delete')
                            Xác nhận chức vụ
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
                                    <span>Bạn có muốn xóa chức vụ "{{ $display_name }}"?</span>
                                </div>
                            </div>
                        @else
                            <div class="container-fluid">
                                <div class="row">
                                    <label class="crud-label p-0 mt-2 mb-0">Tên chức vụ</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control crud-input"
                                            wire:model.lazy="display_name">
                                    </div>
                                    @error('display_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="row">
                                    <label class="crud-label p-0 mt-2 mb-0">Miêu tả chức vụ</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control crud-input"
                                            wire:model.lazy="description">
                                    </div>
                                    {{-- @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror --}}
                                </div>
                                <div class="row">
                                    <label class="crud-label p-0 mt-2 mb-0">Vai trò</label>
                                    <div class="input-group">
                                        {{-- {{ dd($permissions) }} --}}
                                        {{-- {{ dd($permission_select_ids) }} --}}
                                        @foreach ($permissions as $groupName => $permission)
                                            <div class="w-100 border-bottom border-secondary rounded pl-1 pr-1 mb-1">
                                                <div class="w-25 d-inline-flex">
                                                    <h5 class="m-0">{{ $groupName }}</h5>
                                                </div>
                                                @foreach ($permission as $item)
                                                    <div class="form-check form-check-inline">
                                                        <input wire:model="permission_ids.{{ $item->id }}"
                                                            class="form-check-input checkbox" type="checkbox"
                                                            value="{{ $item->id ?? 0 }}" id="{{ $item->id ?? 0 }}">
                                                        <label style="font-weight: bold; font-size:13px;"
                                                            class="form-check-label"
                                                            for="{{ $item->id ?? 0 }}">{{ $item->display_name ?? '' }}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endforeach
                                    </div>
                                    {{-- @error('')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror --}}
                                </div>
                            </div>
                        @endif
                    </div>
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
</div>

@push('script')
    <script>
        $(document).ready(function() {
            $('#crudRoleModal').on('show.bs.modal', function(e) {
                var id = e.relatedTarget.getAttribute('data-role-id') ?? 0
                @this.call('modalSetup', id)
            })

            $(document).on('closeCrudRole', function() {
                $('#crudRoleModal').modal('hide')
            })
        })
    </script>
@endpush
