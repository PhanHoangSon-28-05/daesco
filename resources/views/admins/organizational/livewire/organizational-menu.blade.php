@push('style')
    <style>

    </style>
@endpush

<div>
    <div class="modal fade" id="MenuOrganizational" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Danh sách nhóm tổ chức
                    </h5>
                    <p>
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                            data-target="#crudMenuModal">
                            Thêm chức vụ
                        </button>
                    </p>
                </div>
                <div class="row flex-row-reverse">
                    <div class="col" wire:ignore.self wire:loading.remove>
                        <table class="table table-bordered ">
                            <thead>
                                <tr class="bg-secondary text-white">
                                    <th>STT</th>
                                    <th>Tên</th>
                                    <th>Name</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($menus as $value)
                                    <tr class="border border-secondary text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $value->name_vi }} </td>
                                        <td>{{ $value->name_en }} </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                                data-target="#crudMenuModal" data-menu-id={{ $value->id }}>
                                                <i class="fa-solid fa-pen"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                                data-target="#crudMenuModal" data-menu-id={{ -$value->id }}><i
                                                    class="fa-solid fa-trash"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="crudMenuModal" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
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
                                    <span>Bạn có muốn xóa menu "{{ $name_vi }}"?</span>
                                </div>
                            </div>
                        @else
                            <div class="col-12">
                                <label class="crud-label p-0 mt-2 mb-0">Tên: </label>
                                <div class="input-group">
                                    <input type="text" class="form-control" wire:model="name_vi">
                                </div>
                            </div>
                            <div class="col-12">
                                <label class="crud-label p-0 mt-2 mb-0">Name: </label>
                                <div class="input-group">
                                    <input type="text" class="form-control" wire:model="name_en">
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="modal-footer mt-2" wire:loading.remove wire:target="modalSetup">
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">
                            {{ $action == 'delete' ? 'Hủy' : 'Đóng' }}</button>
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
            $('#crudMenuModal').on('show.bs.modal', function(e) {
                var id = e.relatedTarget.getAttribute('data-menu-id') ?? 0
                @this.call('modalSetup', id)
            })

            $(document).on('closeMenuModel', function() {
                $('#crudMenuModal').modal('hide')
            })

            $(document).on('closeMenu', function() {
                $('#MenuOrganizational').modal('hide')
            })

        })
    </script>
@endpush
