<div class="card">
    <div class="card-header">
        <h5 class="card-title float-left text-uppercase">quản lý System</h5>
        <button type="button" class="btn btn-sm rounded-0 btn-primary text-uppercase float-right" data-toggle="modal"
            data-target="#crudSystemModal">
            Thêm mới
        </button>
    </div>
    <div class="card-table table-responsive shadow-none mb-0">
        <table class="table table-bordered ">
            <thead>
                <tr class="bg-secondary text-white">
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Hình Ảnh</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($systems as $system)
                    <tr class="border border-secondary text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $system->name }}</td>
                        <td class="w-50"><img src="{{ asset('storages/' . $system->pic) }}" class="w-25"
                                alt=""></td>
                        <td>
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                data-target="#crudSystemModal" data-system-id={{ $system->id }}><i
                                    class="fa-solid fa-pen"></i></button>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                data-target="#crudSystemModal" data-system-id={{ -$system->id }}><i
                                    class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
