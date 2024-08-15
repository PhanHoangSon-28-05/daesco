<div class="card">
    <div class="card-header">
        <h5 class="card-title float-left text-uppercase">quản lý Backlink</h5>
        <button type="button" class="btn btn-sm rounded-0 btn-primary text-uppercase float-right" data-toggle="modal"
            data-target="#crudAdsModal">
            Thêm mới
        </button>
    </div>
    <div class="card-table table-responsive shadow-none mb-0">
        <table class="table table-bordered ">
            <thead>
                <tr class="bg-secondary text-white">
                    <th>STT</th>
                    <th>Url</th>
                    <th>Hình Ảnh</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ads as $value)
                    <tr class="border border-secondary">
                        <td style="width: 61px;">{{ $loop->iteration }}</td>
                        <td style="width: 450px;">{{ $value->url }}</td>
                        <td class="w-25"> <img src="{{ asset('storages/' . $value->pic) }}"
                                class="p-0 mr-2 mb-1 col-4"></td>
                        <td class="w-25">
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                data-target="#crudAdsModal" data-ads-id={{ $value->id }}><i
                                    class="fa-solid fa-pen"></i></button>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                data-target="#crudAdsModal" data-ads-id={{ -$value->id }}><i
                                    class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
