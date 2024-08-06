<div class="card">
    <div class="card-header">
        <h5 class="card-title float-left text-uppercase">quản lý chức vụ</h5>
        <button type="button" class="btn btn-sm rounded-0 btn-primary text-uppercase float-right" data-toggle="modal"
            data-target="#crudRoleModal">
            Thêm mới
        </button>
    </div>
    <div class="card-table table-responsive shadow-none mb-0">
        <table class="table table-bordered ">
            <thead>
                <tr class="bg-secondary text-white">
                    <th>STT</th>
                    <th>Tên chức vụ</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr class="border border-secondary">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $role->display_name }}</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                data-target="#crudRoleModal" data-role-id={{ $role->id }}><i
                                    class="fa-solid fa-pen"></i></button>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                data-target="#crudRoleModal" data-role-id={{ -$role->id }}><i
                                    class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
