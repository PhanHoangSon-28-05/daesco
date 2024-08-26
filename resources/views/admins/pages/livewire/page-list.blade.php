<div class="card">
    <div class="card-header">
        <h5 class="card-title float-left text-uppercase">quản lý trang</h5>
        <button type="button" class="btn btn-sm rounded-0 btn-primary text-uppercase float-right" data-toggle="modal"
            data-target="#crudPageModal">
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
                    <th>Mô tả</th>
                    <th>Hình Ảnh</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody id="myTable">
                @if ()
                @foreach ($pages as $page)
                <tr class="border border-secondary">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $page->name_vi }}</td>
                    <td>{{ $page->description_vi }}</td>
                    <td class="w-50"><img src="{{ asset('storages/' . $page->pic) }}" class="w-25"
                            alt=""></td>
                    </td>
                    <td>
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                            data-target="#crudPageModal" data-page-id={{ $page->id }}><i
                                class="fa-solid fa-pen"></i></button>
                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                            data-target="#crudPageModal" data-page-id={{ -$page->id }}><i
                                class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
                @endforeach    
                @else
                <tr class="border border-secondary">
                    <td class="text-center" colspan="5">(Không tìm thấy trang)</td>
                </tr>
                @endif
                
            </tbody>
        </table>
    </div>
</div>
