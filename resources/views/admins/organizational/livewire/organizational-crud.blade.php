@push('style')
    <style>

    </style>
@endpush

<div>
    <div class="modal fade" id="crudOrganizationalModal" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" wire:loading.remove wire:target="modalSetup">
                        @if ($action == 'create')
                            Thêm mới thành viên tổ chức
                        @elseif ($action == 'update')
                            Chỉnh sửa thành viên tổ chức
                        @elseif ($action == 'delete')
                            Xác nhận thành viên tổ chức
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
                                    <span>Bạn có muốn xóa thành viên tổ chức "{{ $name_vi }}"?</span>
                                </div>
                            </div>
                        @else
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="row mb-2">
                                            <div class="col-6 px-1">
                                                <label class="crud-label p-0 mt-2 mb-0">Tên VI: </label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control crud-input"
                                                        wire:model.lazy="name_vi">
                                                </div>
                                                @error('name_vi')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-6 px-1">
                                                <label class="crud-label p-0 mt-2 mb-0">Name (EN): </label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control crud-input"
                                                        wire:model.lazy="name_en">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-6 px-1">
                                                <label class="crud-label p-0 mt-2 mb-0">Chức vụ: </label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control crud-input"
                                                        wire:model.lazy="position_vi">
                                                </div>
                                                @error('position_vi')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-6 px-1">
                                                <label class="crud-label p-0 mt-2 mb-0">Position: </label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control crud-input"
                                                        wire:model.lazy="position_en">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="crud-label p-0 mt-2 mb-0">Nhóm tổ chức:</label>
                                            <div class="input-group">
                                                <select class="form-control mr-1" wire:model.lazy="parent_id">
                                                    <option value="0">---</option>
                                                    @foreach ($menu as $value)
                                                        <option value="{{ $value->id }}">{{ $value->name_vi }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="row">
                                            <label class="crud-label p-0 mt-2 mb-0">Ảnh chân dung:</label>
                                            <div class="input-group">
                                                <input type="file" wire:model="pic" hidden id="cover_img">
                                                <label for="cover_img" class="w-100 border shadow mt-2">
                                                    <img src="{{ asset($cover_img) }}" alt="" class="w-100"
                                                        id="image-preview">
                                                </label>
                                            </div>
                                            @error('pic')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
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
            $('#crudOrganizationalModal').on('show.bs.modal', function(e) {
                var id = e.relatedTarget.getAttribute('data-organizational-id') ?? 0
                @this.call('modalSetup', id)
            })

            $(document).on('closeCrudOrganizational', function() {
                $('#crudOrganizationalModal').modal('hide')
            })

            let input = document.getElementById('file-input');
            input.addEventListener('change', (e) => {
                let image = document.getElementById('img-preview');
                if (e.target.files.length) {
                    let src = URL.createObjectURL(e.target.files[0]);
                    image.src = src;
                }
            });
        })
    </script>
@endpush
