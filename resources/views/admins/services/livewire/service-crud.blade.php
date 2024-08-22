@push('style')
@endpush
<!-- Modal -->
<div class="">
    <div class="modal fade" id="crudServiceModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
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
                                        <div class="row" wire:ignore>
                                            <label class="crud-label p-0 mt-2 mb-0">Thông tin chung</label>
                                            <div class="col-12 p-0">
                                                <textarea class="form-control detail" wire:model.lazy="detail_vi" id="editor_detail_vi"
                                                    placeholder="Required example textarea"></textarea>
                                            </div>
                                            @error('detail_vi')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="row">
                                            <input type="file" wire:model="pic">

                                            @php
                                                $src =
                                                    $pic && method_exists($pic, 'temporaryUrl')
                                                        ? $pic->temporaryUrl()
                                                        : $pic;
                                            @endphp
                                            <img src="{{ $src }}" class="p-0 mr-2 mb-1 col-4">

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
                                        Create service
                                    @elseif ($action == 'update')
                                        Update service
                                    @elseif ($action == 'delete')
                                        Confirm service deletion
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
                                        <div class="row" wire:ignore>
                                            <label class="crud-label p-0 mt-2 mb-0">Detail</label>
                                            <div class="col-12 p-0">
                                                <textarea class="form-control  detail" wire:model.lazy="detail_en" id="editor_detail_en"
                                                    placeholder="Required example textarea"></textarea>
                                            </div>
                                            @error('detail_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>


                                        <div class="row">
                                            <input type="file" wire:model="pic">

                                            @php
                                                $src =
                                                    $pic && method_exists($pic, 'temporaryUrl')
                                                        ? $pic->temporaryUrl()
                                                        : $pic;
                                            @endphp
                                            <img src="{{ $src }}" class="p-0 mr-2 mb-1 col-4">

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
        var options = {
            selector: ".detail",
            theme: "modern",
            width: 1000,
            height: 500,
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
                "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
            ],
            toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
            toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor | print preview code ",
            image_advtab: true,

            external_filemanager_path: "/admins/assets/js/responsive_filemanager/filemanager/",
            filemanager_title: "Trình quản lý tệp",
            external_plugins: {
                "filemanager": "/admins/assets/js/responsive_filemanager/filemanager/plugin.min.js"
            }
        };
        $(document).ready(function() {
            $('#crudServiceModal').on('show.bs.modal', function(e) {
                var id = e.relatedTarget.getAttribute('data-service-id') ?? 0;
                @this.call('modalSetup', id);
            });

            $(document).on('closeCrudService', function() {
                $('#crudServiceModal').modal('hide');
            });


            $('#crudServiceModal').on('shown.bs.modal', function() {
                // CKEDITOR.replace('editor_detail_vi');
                // CKEDITOR.instances.editor_detail_vi.on('change', function() {
                //     @this.set('detail_vi', CKEDITOR.instances
                //         .editor_detail_vi.getData());
                // });
                tinymce.init(options);
            });

            // $('#crudServiceModal').on('shown.bs.modal', function() {
            //     CKEDITOR.replace('editor_detail_en');
            //     CKEDITOR.instances.editor_detail_en.on('change', function() {
            //         @this.set('detail_en', CKEDITOR.instances
            //             .editor_detail_en.getData());
            //     });
            // });

            $('#crudServiceModal').on('hidden.bs.modal', function() {
                for (instance in CKEDITOR.instances) {
                    CKEDITOR.instances[instance].destroy(true);
                }
            });
        });
    </script>
@endpush
