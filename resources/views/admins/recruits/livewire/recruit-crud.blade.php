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
</style>
@endpush
<!-- Modal -->
<div class="">
    <div class="modal fade" id="crudRecruitModal" data-focus="false" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="container py-4" wire:loading wire:target="modalSetup">
                    <div class="row align-items-center justify-content-center">
                        <div class="spinner-border spinner-border-sm" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <span class="ml-2">Vui lòng đợi</span>
                    </div>
                </div>

                <div class="modal-header border-bottom" wire:loading.remove wire:target="modalSetup">
                    <div class="row">
                        <ul class="nav nav-pills mb-1" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link py-1 active" data-toggle="pill" href="#pill_detail_vi"
                                    role="tab" aria-selected="true">Tiếng Việt</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link py-1" data-toggle="pill" href="#pill_detail_en"
                                    role="tab" aria-selected="false">Tiếng Anh</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="modal-body" wire:loading.remove wire:target="modalSetup">
                    <form wire:submit.prevent="{{ $action }}" id="recruitCrudForm"> {{-- Gọi sự kiện --}}
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pill_detail_vi" role="tabpanel" wire:ignore.self>
                                <div class="container-fluid">
                                    <div class="row flex-column-reverse flex-lg-row">
                                        <div class="col-12 col-lg-8">
                                            <div class="row" wire:ignore>
                                                <div class="col-12 p-0">
                                                    <textarea class="form-control detail" id="editor_detail_vi"></textarea>
                                                </div>
                                                @error('content_vi')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-1 d-none d-lg-flex"></div>
                                        <div class="col-12 col-lg-3">
                                            <div class="row">
                                                <label class="label">Tiêu đề</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" wire:model.lazy="title_vi">
                                                </div>
                                                @error('title_vi')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="row">
                                                <label class="label">Vị trí</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" wire:model.lazy="position_vi">
                                                </div>
                                                @error('position_vi')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="row">
                                                <label class="label">Nơi làm việc</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" wire:model.lazy="workplace_vi">
                                                </div>
                                                @error('workplace_vi')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="row">
                                                <label class="label">Số lượng</label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control" wire:model.lazy="amount">
                                                </div>
                                                @error('amount')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="row">
                                                <label class="label">Lương</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" wire:model.lazy="salary">
                                                </div>
                                                @error('salary')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="row">
                                                <label class="label">Email liên hệ</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" wire:model.lazy="email">
                                                </div>
                                                @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="row">
                                                <label class="label">Ngày hết hạn</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control datepicker" readonly wire:model.lazy="expired_at">
                                                </div>
                                                @error('expired_at')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pill_detail_en" role="tabpanel" wire:ignore.self>
                                <div class="container-fluid">
                                    <div class="row flex-column-reverse flex-lg-row">
                                        <div class="col-12 col-lg-8">
                                            <div class="row" wire:ignore>
                                                <div class="col-12 p-0">
                                                    <textarea class="form-control detail" id="editor_detail_en"></textarea>
                                                </div>
                                                @error('content_en')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-1 d-none d-lg-flex"></div>
                                        <div class="col-12 col-lg-3">
                                            <div class="row">
                                                <label class="label">Title</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" wire:model.lazy="title_en">
                                                </div>
                                                @error('title_en')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="row">
                                                <label class="label">Position</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" wire:model.lazy="position_en">
                                                </div>
                                                @error('position_en')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="row">
                                                <label class="label">Workplace</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" wire:model.lazy="workplace_en">
                                                </div>
                                                @error('workplace_en')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="row">
                                                <label class="label">Amount</label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control" wire:model.lazy="amount">
                                                </div>
                                                @error('amount')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="row">
                                                <label class="label">Salary</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" wire:model.lazy="salary">
                                                </div>
                                                @error('salary')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="row">
                                                <label class="label">Contact email</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" wire:model.lazy="email">
                                                </div>
                                                @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="row">
                                                <label class="label">Expired date</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control datepicker" readonly wire:model.lazy="expired_at">
                                                </div>
                                                @error('expired_at')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer pt-1 border-top" wire:loading.remove wire:target="modalSetup">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary" form="recruitCrudForm">Lưu</button>
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
            selector: ".detail",theme: "modern",width: '100%',max_height: 300,min_height: 300,
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
                @this.set('content_vi', tinymce.get("editor_detail_vi").getContent());
            });
            tinymce.get("editor_detail_en").on('change', (e) => {
                @this.set('content_en', tinymce.get("editor_detail_en").getContent());
            });

            $('.datepicker').daterangepicker({
                // parentEl: '.content-inner',
                singleDatePicker: true,
                drops: 'auto',
                locale: {
                    format: 'DD/MM/YYYY'
                }
            },        
            function(start) {
                @this.expired_at = start.format('DD/MM/YYYY');
            });

            $('#crudRecruitModal').on('show.bs.modal', function(e) {
                var id = e.relatedTarget.getAttribute('data-recruit-id') ?? 0;
                @this.call('modalSetup', id);
            });

            $(document).on('closeCrudRecruit', function() {
                $('#crudRecruitModal').modal('hide');
            });

            $(document).on('setDetailEditorContent', function() {
                tinymce.get("editor_detail_vi").setContent(@this.get('content_vi'));
                tinymce.get("editor_detail_en").setContent(@this.get('content_en'));
            });

            $(document).on('setDatetpickerValue', function() {
                var datetime = @this.expired_at;
                $('.datepicker').data('daterangepicker').setStartDate(datetime);
            });
        });
    </script>
@endpush
