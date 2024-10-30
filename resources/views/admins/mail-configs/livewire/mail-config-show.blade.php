@push('style')
    <style>
        label {
            font-size: 20px;
        }

        .form-group {
            margin-top: 5px;
            margin-bottom: 5px;
        }
    </style>
@endpush
<div class="card">
    <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <a href="{{ route('mail-configs.index') }}" class="breadcrumb-item">Mail Config</a>
            </div>

            <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
        </div>
    </div>
    <div class="card-header">
        <h2 class="card-title">
        </h2>
    </div>
    <form wire:submit.prevent="save">
        <div class="card-body">
            <stron class="mb-2"><strong>Thiết lập Email gửi</strong></stron>
            <div class="form-group">
                <input type="text" wire:model.lazy="username" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="text" wire:model.lazy="password" class="form-control" placeholder="Mật khẩu ứng dụng">
            </div>
            <span class="mb-2"><strong>Thông tin người gửi</strong></span>
            <div class="form-group">
                <input type="text" wire:model.lazy="from_address" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="text" wire:model.lazy="from_name" class="form-control" placeholder="Tên">
            {{-- </div>
            <span class="mb-2">Nơi nhận thư</span>
            <div class="form-group">
                <input type="text" wire:model.lazy="to_address" class="form-control" placeholder="Email">
            </div> --}}
            <div class="d-flex flex-row-reverse bd-highlight">
                <button type="submit" class="btn btn-primary bd-highlight">Lưu <i
                        class="icon-paperplane ml-2"></i></button>
            </div>
        </div>
    </form>
</div>
