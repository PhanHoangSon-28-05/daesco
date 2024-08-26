@push('style')
@endpush
<!-- Modal -->
<div class="">
    <div class="modal fade" id="deleteRecruitModal" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Xác nhận xóa</h5>
                </div>

                <div class="container py-4" wire:loading wire:target="getData">
                    <div class="row align-items-center justify-content-center">
                        <div class="spinner-border spinner-border-sm" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <span class="ml-2">Vui lòng đợi</span>
                    </div>
                </div>

                <div class="modal-body" wire:loading.remove wire:target="getData">
                    <form wire:submit.prevent="delete" id="recruitDeleteForm"> {{-- Gọi sự kiện --}}
                        <div class="container-fluid">
                            <div class="row">
                                <span>Bạn có muốn xóa "{{ $recruit->title_vi ?? '' }}"?</span>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-danger" form="recruitDeleteForm">Đồng ý</button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
<script>
    $(document).ready(function() {
        $('#deleteRecruitModal').on('show.bs.modal', function(e) {
            var id = e.relatedTarget.getAttribute('data-recruit-id') ?? 0;
            @this.call('getData', id);
        });

        $(document).on('closeDeleteRecruit', function() {
            $('#deleteRecruitModal').modal('hide');
        });
    })
</script>
@endpush