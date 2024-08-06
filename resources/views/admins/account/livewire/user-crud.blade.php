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
    <div class="modal fade" id="crudAccountModal" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" wire:loading.remove wire:target="modalSetup">
                        @if ($action == 'create')
                            Thêm mới tài khoản
                        @elseif ($action == 'update')
                            Chỉnh sửa tài khoản
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

                <form wire:submit.prevent="{{ $action }}">
                    <div class="modal-body" wire:loading.remove wire:target="modalSetup">

                        @if ($action == 'delete')
                            <div class="container-fluid">
                                <div class="row">
                                    <span>Bạn có muốn xóa "{{ $name }}"?</span>
                                </div>
                            </div>
                        @else
                            <div class="container-fluid">
                                <div class="row">
                                    <label class="crud-label">Họ & Tên</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control crud-input" wire:model.lazy="name">
                                    </div>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="row">
                                    <label class="crud-label">Tên đăng nhập</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control crud-input"
                                            wire:model.lazy="username">
                                    </div>
                                    @error('username')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                @if ($action == 'create')
                                    <div class="row">
                                        <label class="crud-label">Mật khẩu</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control crud-input"
                                                wire:model.lazy="password">
                                        </div>
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                @endif
                                <div class="row">
                                    <label class="crud-label">Chức vụ</label>
                                    <div class="input-group" wire:ignore>
                                        <select class="form-control crud-input select" wire:model.lazy="role_id">
                                            <option value="0">Hãy chọn chức vụ</option>
                                            @foreach ($roles as $key => $role)
                                                <option value="{{ $role->id ?? 0 }}"
                                                    @if ($role->id == $role_id) selected @endif>
                                                    {{ $role->display_name ?? '' }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <a href="{{ route('roles.index') }}" class="btn btn-success ms-1">Danh sách</a>
                                    </div>
                                    {{-- @error('')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror --}}
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
            $('#crudAccountModal').on('show.bs.modal', function(e) {
                var id = e.relatedTarget.getAttribute('data-account-id') ?? 0
                @this.call('modalSetup', id)
            })

            $(document).on('closeCrudAccount', function() {
                $('#crudAccountModal').modal('hide')
            })

            $('.select').select();
        })
    </script>
    </script>
@endpush
