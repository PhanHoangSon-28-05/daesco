<div class="card">
    <div class="card-header">
        <h5 class="card-title float-left text-uppercase">Danh sách tài khoản</h5>
        <button type="button" class="btn btn-sm rounded-0 btn-primary text-uppercase float-right" data-toggle="modal"
            data-target="#crudAccountModal">
            Thêm mới
        </button>
    </div>
    <div class="card-table table-responsive shadow-none mb-0">
        <table class="table table-bordered ">
            <thead>
                <tr class="bg-secondary text-white">
                    <th scope="col" class="text-center">STT</th>
                    <th scope="col" class="text-center">Họ & Tên</th>
                    <th scope="col" class="text-center">Tên đăng nhập</th>
                    <th scope="col" class="text-center">Chức vụ</th>
                    <th scope="col" class="text-center">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($accounts as $account)
                    <tr class="border border-secondary">
                        <td scope="row" class="text-center">{{ $loop->iteration }}</td>
                        <td scope="row" class="text-center">{{ $account->name }}</td>
                        <td scope="row" class="text-center">{{ $account->username }}</td>
                        <td scope="row" class="text-center">{{ $account->role->display_name ?? '' }}
                        </td>
                        <td scope="row" class="text-center">
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                data-target="#crudAccountModal" data-account-id={{ $account->id }}><i
                                    class="fa-solid fa-pen"></i></button>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                data-target="#crudAccountModal" data-account-id={{ -$account->id }}><i
                                    class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
