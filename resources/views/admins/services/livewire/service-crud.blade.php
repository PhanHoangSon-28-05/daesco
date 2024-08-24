@push('style')
@endpush
<!-- Modal -->
<div class="">
    <div class="modal fade" id="crudServiceModal" data-focus="false" tabindex="-1" aria-hidden="true"
        wire:ignore.self>
        <div class="modal-dialog {{ $action != 'delete' ? 'modal-xl' : '' }} modal-dialog-scrollable" role="document">
            <div class="container py-4" wire:loading wire:target="modalSetup">
                <div class="row align-items-center justify-content-center">
                    <div class="spinner-border spinner-border-sm" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <span class="ml-2">Vui lòng đợi</span>
                </div>
            </div>

            <div class="modal-content" wire:loading.remove wire:target="modalSetup">
                <div class="modal-header border-bottom">
                    @if ($action != 'delete')
                    <div class="row">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pill_detail_vi"
                                role="tab" aria-selected="true">Tiếng Việt</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pill_detail_en"
                                role="tab" aria-selected="false">Tiếng Anh</a>
                        </li>
                    </ul>
                    </div>
                    @else
                    <h5>Xác nhận xóa</h5>
                    @endif
                </div>
                <div class="modal-body" wire:loading.remove wire:target="modalSetup">
                    <form wire:submit.prevent="{{ $action }}" id="pageCrudForm"> {{-- Gọi sự kiện --}}
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
                        @endif
                        <div class="tab-content {{ $action == 'delete' ? 'd-none' : '' }}" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pill_detail_vi" role="tabpanel" wire:ignore.self>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-7">
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
                                            <div class="row">
                                                <label class="crud-label p-0 mt-2 mb-0">Dịch vụ</label>
                                                <div class="input-group">
                                                    <select class="form-control" wire:model.lazy="slug_sections">
                                                        <option value="0">---</option>
                                                        <option value="dich-vu-san-pham">Sản phẩm (Product)</option>
                                                        <option value="dich-vu-bai">Bãi đổ xe (Parking lot)</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-1"></div>
                                        <div class="col-4">
                                            <div class="row">
                                                <label class="crud-label p-0 mt-2 mb-0">Ảnh bìa:</label>
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
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pill_detail_en" role="tabpanel" wire:ignore.self>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-7">
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
                                            <div class="row">
                                                <label class="crud-label p-0 mt-2 mb-0">Service</label>
                                                <div class="input-group">
                                                    <select class="form-control" wire:model.lazy="slug_sections">
                                                        <option value="0">---</option>
                                                        <option value="dich-vu-san-pham">Sản phẩm (Product)</option>
                                                        <option value="dich-vu-bai">Bãi đổ xe (Parking lot)</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-1"></div>
                                        <div class="col-4">
                                            <div class="row">
                                                <label class="crud-label p-0 mt-2 mb-0">Cover Image:</label>
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
                                    
                                    <div class="row" wire:ignore>
                                        <label class="crud-label p-0 mt-2 mb-0">Detail</label>
                                        <div class="col-12 p-0">
                                            <textarea class="form-control detail" wire:model.lazy="detail_en" id="editor_detail_en"
                                                placeholder="Required example textarea"></textarea>
                                        </div>
                                        @error('detail_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer pt-1 border-top">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary" form="pageCrudForm">
                        @if ($action == 'create')
                            Thêm
                        @elseif ($action == 'update')
                            Cập nhật
                        @elseif ($action == 'delete')
                            Xóa
                        @endif
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


@push('script')
    <script>
        // var options = {
        //     filebrowserBrowseUrl : '{{route("filemanager")}}',
        //     filebrowserUploadUrl : '{{route("filemanager")}}',
        //     filebrowserImageBrowseUrl : '{{route("filemanager")}}'
        // };

        var options = { 
            selector: ".detail",theme: "modern",width: '100%',height: 500, 
            plugins: [ 
                "advlist autolink link image lists charmap print preview hr anchor pagebreak", 
                "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking", 
                "table contextmenu directionality emoticons paste textcolor responsivefilemanager code" 
            ], 
            toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect", 
            toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor | print preview code ", 
            image_advtab: true , 
            
            external_filemanager_path:"/admins/assets/js/responsive_filemanager/filemanager/", 
            filemanager_title:"Trình quản lý tệp" , 
            external_plugins: { "filemanager" : "/admins/assets/js/responsive_filemanager/filemanager/plugin.min.js"} 
        };

        $(document).ready(function() {
            tinymce.init(options);
            tinymce.get("editor_detail_vi").on('change', (e) => {
                @this.set('detail_vi', tinymce.get("editor_detail_vi").getContent());
            });
            tinymce.get("editor_detail_en").on('change', (e) => {
                @this.set('detail_en', tinymce.get("editor_detail_en").getContent());
            });

            $('#crudServiceModal').on('show.bs.modal', function(e) {
                var id = e.relatedTarget.getAttribute('data-service-id') ?? 0;
                @this.call('modalSetup', id);
            });

            $(document).on('closeCrudService', function() {
                $('#crudServiceModal').modal('hide');
            });

            $(document).on('setDetailEditorContent', function() {
                tinymce.get("editor_detail_vi").setContent(@this.get('detail_vi'));
                tinymce.get("editor_detail_en").setContent(@this.get('detail_en'));
            });

            // $('#crudServiceModal').on('shown.bs.modal', function() {
            //     CKEDITOR.replace('editor_detail_vi', options);
            //     CKEDITOR.instances.editor_detail_vi.on('change', function() {
            //         @this.set('detail_vi', CKEDITOR.instances
            //             .editor_detail_vi.getData());
            //     });
            //     tinymce.init(options);
            //     tinymce.get("editor_detail_vi").on('change', (e) => {
            //         @this.set('detail_vi', tinymce.get("editor_detail_vi").getContent());
            //     });
            //     tinymce.get("editor_detail_en").on('change', (e) => {
            //         @this.set('detail_vi', tinymce.get("editor_detail_en").getContent());
            //     });
            // });

            // $('#crudServiceModal').on('shown.bs.modal', function() {
            //     CKEDITOR.replace('editor_detail_en', options);
            //     tinymce.init(options);
            //     CKEDITOR.instances.editor_detail_en.on('change', function() {
            //         @this.set('detail_en', CKEDITOR.instances
            //             .editor_detail_en.getData());
            //     });
            // });

            // $('#crudServiceModal').on('hidden.bs.modal', function() {
            //     for (instance in CKEDITOR.instances) {
            //         CKEDITOR.instances[instance].destroy(true);
            //     }
            //     tinymce.remove();
            // });
        });
    </script>
@endpush
