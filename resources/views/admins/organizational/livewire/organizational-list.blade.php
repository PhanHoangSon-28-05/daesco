<div class="card">
    <div class="card-header">
        <h5 class="card-title float-left text-uppercase">quản lý cơ cấu tổ chức</h5>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle float-right" type="button" data-toggle="dropdown"
                aria-expanded="false">
                Thêm mới
            </button>
            <div class="dropdown-menu">
                <button type="button" class="dropdown-item btn rounded-0 text-uppercase" data-toggle="modal"
                    data-target="#crudOrganizationalModal">
                    Thành viên
                </button>
                <button type="button" class="dropdown-item btn text-uppercase" data-toggle="modal"
                    data-target="#MenuOrganizational">Chức vụ</button>
            </div>
        </div>

    </div>
    <div class="card-table table-responsive shadow-none mb-0">
        <table class="table table-bordered ">
            <thead>
                <tr class="bg-secondary text-white">
                    <th>STT</th>
                    <th>Hình Ảnh</th>
                    <th>Tên</th>
                    <th>Chức vụ</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($organizationals as $organizational)
                    <tr class="border border-secondary text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td class="w-50"><img src="{{ asset('storages/' . $organizational->pic) }}" class="w-25"
                                alt=""></td>
                        <td>{{ $organizational->name_vi }} </td>
                        <td>{{ $organizational->position_vi }} </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                data-target="#crudOrganizationalModal"
                                data-organizational-id={{ $organizational->id }}><i
                                    class="fa-solid fa-pen"></i></button>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                data-target="#crudOrganizationalModal"
                                data-organizational-id={{ -$organizational->id }}><i
                                    class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
