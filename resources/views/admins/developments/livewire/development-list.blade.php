<div class="card">
    <div class="card-header">
        <h5 class="card-title float-left text-uppercase">quản lý development</h5>
        <button type="button" class="btn btn-sm rounded-0 btn-primary text-uppercase float-right" data-toggle="modal"
            data-target="#crudDevelopmentModal">
            Thêm mới
        </button>
    </div>
    <div class="card-table table-responsive shadow-none mb-0">
        <table class="table table-bordered ">
            <thead>
                <tr class="bg-secondary text-white">
                    <th>STT</th>
                    <th>Ngày</th>
                    <th>Nội dung</th>
                    <th>Hình Ảnh</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($developments as $development)
                    <tr class="border border-secondary text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $development->date }}</td>
                        <td>{{ $development->description }}</td>
                        <td class="w-50"><img src="{{ asset('storages/' . $development->pic) }}" class="w-25"
                                alt=""></td>
                        <td>
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                data-target="#crudDevelopmentModal" data-development-id={{ $development->id }}><i
                                    class="fa-solid fa-pen"></i></button>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                data-target="#crudDevelopmentModal" data-development-id={{ -$development->id }}><i
                                    class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
