@push('style')
@endpush
<!-- Modal -->
<div class="">
    <div class="modal fade" id="crudDocumentModal" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">

            <div class="modal-content">
                <div class="container py-4" wire:loading wire:target="modalSetup">
                    <div class="row align-items-center justify-content-center">
                        <div class="spinner-border spinner-border-sm" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <span class="ml-2">Vui lòng đợi</span>
                    </div>
                </div>

                <div class="modal-header" wire:loading.remove wire:target="modalSetup">
                    @if ($action == 'create')
                    <h5>Thêm tài liệu</h5>
                    @elseif ($action == 'update')
                    <h5>Chỉnh sửa tài liệu</h5>
                    @elseif ($action == 'delete')
                    <h5>Xác nhận</h5>
                    @endif
                </div>

                <div class="modal-body" wire:loading.remove wire:target="modalSetup">
                    <form wire:submit.prevent="{{ $action }}" id="documentCrudForm"> {{-- Gọi sự kiện --}}
                        @if ($action == 'delete')
                        <div class="container-fluid">
                            <div class="row">
                                <span>Bạn có muốn xóa "{{ $document->title }}"?</span>
                            </div>
                        </div>
                        @else
                        <div class="container-fluid">
                            <div class="row">
                                <label class="label">Tiêu đề:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" wire:model.lazy="title">
                                </div>
                                @error('title')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row">
                                <label class="label">Danh mục:</label>
                                <div class="input-group">
                                    <select class="form-control custom-select" wire:model="category_id">
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name_vi }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row">
                                <label class="label">Năm phát hành:</label>
                                <div class="input-group">
                                    <select class="form-control custom-select" wire:model="published_year">
                                        @foreach ($years as $year)
                                        <option value="{{ $year->name }}">{{ $year->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('year')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row">
                                <label class="label">File:</label>
                                <div class="input-group">
                                    <input type="file" class="custom-file-input" id="documentFile" accept=".pdf,.docx,.doc" wire:model.lazy="file">
                                    <label class="custom-file-label" for="documentFile">
                                        @if (!$file)
                                        Chọn file
                                        @elseif (gettype($file) == 'string')
                                        {{ trim($file, 'documents/') }}
                                        @else
                                        {{ $file->getClientOriginalName() }}
                                        @endif
                                    </label>
                                </div>
                                @error('file')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        @endif
                    </form>
                </div>
                <div class="modal-footer" wire:loading.remove wire:target="modalSetup">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    @if ($action == 'delete')
                    <button type="submit" class="btn btn-danger" form="documentCrudForm">Đồng ý</button>
                    @else
                    <button type="submit" class="btn btn-primary" form="documentCrudForm">Lưu</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


@push('script')
    <script>
        $(document).ready(function() {
            $('#crudDocumentModal').on('show.bs.modal', function(e) {
                var id = e.relatedTarget.getAttribute('data-document-id') ?? 0;
                @this.call('modalSetup', id);
            });

            $(document).on('closeCrudDocument', function() {
                $('#crudDocumentModal').modal('hide');
            });
        });
    </script>
@endpush
