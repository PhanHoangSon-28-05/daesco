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
    <div class="modal fade" id="crudDevelopmentModal" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" wire:loading.remove wire:target="modalSetup">
                        @if ($action == 'create')
                            Thêm mới development
                        @elseif ($action == 'update')
                            Chỉnh sửa development
                        @elseif ($action == 'delete')
                            Xác nhận development
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
                                    <span>Bạn có muốn xóa development "{{ $date }}"?</br>
                                    Nội dung: {{ $description }}
                                    </span>
                                </div>
                            </div>
                        @else
                            <div class="container-fluid">
                                <div class="row mb-2">
                                    <label class="crud-label p-0 mt-2 mb-0">Ngày phát triển</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control crud-input" wire:model.lazy="date">
                                    </div>
                                    @error('date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="row mb-2">
                                    <label class="crud-label p-0 mt-2 mb-0">Nội dung:</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control crud-input" wire:model.lazy="description">
                                    </div>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="row">
                                    <input type="file" wire:model="pic">

                                    @if ($pic)
                                        @if (gettype($pic) == 'string')
                                            <img src="{{ asset('storage/' . $pic) }}" class="p-0 mr-2 mb-1 col-4"
                                                id="image-preview">
                                        @else
                                            <img src="{{ asset($pic->temporaryUrl()) }}" class="p-0 mr-2 mb-1 col-4"
                                                id="image-preview">
                                        @endif
                                    @endif

                                    @error('pic')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
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
            $('#crudDevelopmentModal').on('show.bs.modal', function(e) {
                var id = e.relatedTarget.getAttribute('data-development-id') ?? 0
                @this.call('modalSetup', id)
            })

            $(document).on('closeCrudDevelopment', function() {
                $('#crudDevelopmentModal').modal('hide')
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