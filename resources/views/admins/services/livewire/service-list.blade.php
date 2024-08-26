<div class="card">
    <div class="card-header">
        <h5 class="card-title float-left text-uppercase">quản lý dịch vụ</h5>
        <button type="button" class="btn btn-sm rounded-0 btn-primary text-uppercase float-right" data-toggle="modal"
            data-target="#crudServiceModal">
            Thêm mới
        </button>
    </div>
    {{-- @livewire('search') --}}
    <div class="d-flex justify-content-center">
        <div class="col-sm-5 my-1">
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
    </div>
    <div class="card-table table-responsive shadow-none mb-0">
        <table class="table table-bordered ">
            <thead>
                <tr class="bg-secondary text-white">
                    <th>STT</th>
                    <th>Tiêu đề</th>
                    <th>Hình Ảnh</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody id="myTable">
                @if ($services->count() > 0)
                @foreach ($services as $service)
                <tr class="border border-secondary">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $service->name_vi }}</td>
                    <td class="w-50"><img src="{{ asset('storages/' . $service->pic) }}" class="w-25"
                            alt=""></td>
                    </td>
                    <td>
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                            data-target="#crudServiceModal" data-service-id={{ $service->id }}><i
                                class="fa-solid fa-pen"></i></button>
                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                            data-target="#crudServiceModal" data-service-id={{ -$service->id }}><i
                                class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
                @endforeach    
                @else
                <tr class="border border-secondary">
                    <td class="text-center" colspan="4">(Không tìm thấy dịch vụ)</td>
                </tr>
                @endif
                
            </tbody>
        </table>
    </div>
</div>
