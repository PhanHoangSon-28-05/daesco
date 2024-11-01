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
<div>
    <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <a href="{{ route('info-products.index') }}" class="breadcrumb-item">Info Product</a>
            </div>

            <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
        </div>
    </div>
    <div class="card-header">
        <h2 class="card-title">Info Product
        </h2>
    </div>
    <form wire:submit.prevent="update">
        <div class="card-body">
            <div class="form-group">
                <label>
                    Address
                </label>
                <input type="text" wire:model.lazy="address" class="form-control" placeholder="address">
            </div>
            <div class="form-group">
                <label>Hotline</label>
                <input type="text" wire:model.lazy="hotline" class="form-control" placeholder="hotline">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" wire:model.lazy="email" class="form-control" placeholder="email">
            </div>
            <div class="d-flex flex-row-reverse bd-highlight">
                <button type="submit" class="btn btn-primary bd-highlight">Submit <i
                        class="icon-paperplane ml-2"></i></button>
            </div>
        </div>
    </form>
</div>
