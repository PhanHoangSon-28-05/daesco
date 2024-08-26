<div class="card">
    <div class="card-header">
        <h5 class="card-title float-left text-uppercase">quản lý tuyển dụng</h5>
        <button type="button" class="btn btn-sm rounded-0 btn-primary text-uppercase float-right" data-toggle="modal"
            data-target="#crudRecruitModal">
            Thêm mới
        </button>
    </div>
    {{-- @livewire('search') --}}
    <div class="row justify-content-end p-2 m-0">
        <div class="col-sm-5">
            <label class="sr-only" for="myInput">Username</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text bg-secondary text-white"><i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                </div>
                <input type="text" class="form-control" id="myInput" wire:model.live="name"
                    placeholder="Search for names..">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="row justify-content-end">
                <div class="col-form-label"><i class="icon-filter3 mr-1"></i>Năm</div>
                <select class="form-control w-auto ml-1" wire:model.lazy="selected_year">
                    <option value="">Tất cả</option>
                    @foreach ($years as $year)
                    <option value="{{ $year->name }}">{{ $year->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="card-table table-responsive shadow-none mb-2">
        <table class="table table-bordered">
            <thead>
                <tr class="bg-secondary text-white">
                    <th>STT</th>
                    <th>Tiêu đề</th>
                    <th>Vị trí</th>
                    <th>Ngày hết hạn</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody id="myTable">
                @include('admins.recruits.livewire.partials.recruit-table', ['recruits' => $recruits])
            </tbody>
        </table>
    </div>
    <div class="mb-5 mx-2">
        {{ $recruits->links('vendor.livewire.table') }}
    </div>
</div>
