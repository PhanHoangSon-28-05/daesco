<div class="card">
    <div class="card-header">
        <h5 class="card-title float-left text-uppercase">quản lý năm phát hành</h5>
        <button type="button" class="btn btn-sm rounded-0 btn-primary text-uppercase float-right" data-toggle="modal"
            data-target="#crudYearModal">
            Thêm mới
        </button>
    </div>
    @livewire('search')
    <div class="card-table table-responsive shadow-none mb-0">
        <table class="table table-bordered ">
            <thead>
                <tr class="bg-secondary text-white">
                    <th>STT</th>
                    <th>Name</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody id="myTable">
                @foreach ($years as $year)
                    <tr class="border border-secondary">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $year->name }}</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                data-target="#crudYearModal" data-year-id={{ $year->id }}><i
                                    class="fa-solid fa-pen"></i></button>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                data-target="#crudYearModal" data-Year-id={{ -$year->id }}><i
                                    class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
