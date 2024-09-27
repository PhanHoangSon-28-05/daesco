@push('style')
    <style>
        i {
            font-size: 10px;
        }

        .list-group-item {
            transition: border 0.3s ease;
        }

        .list-group-item:hover {
            border: 1px solid #007bff;
        }
    </style>
@endpush

<div class="content-fluid">
    <div class="card">
        <!-- Title -->
        <button type="button" class="btn btn-sm rounded-0 btn-primary text-uppercase float-right w-25" data-toggle="modal"
            data-target="#crudServiceTypeModal">
            Thêm mới
        </button>

        <div class="list">
            <ul class="list-group">
                @foreach ($service_types as $value)
                    <li class="list-group-item p-0 mb-1">
                        <div class="col-10">
                            <p class="mb-0 font-weight-bold">{{ $loop->iteration }}.
                                {{ $value->title_vi }}
                                @if (strlen($value->title_en) > 0)
                                    ({{ $value->title_en }})
                                @endif
                            </p>
                        </div>

                        <div class="col-2 p-0">
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                data-target="#crudServiceTypeModal" data-service-type-id="{{ $value->id }}">
                                <i class="fa-solid fa-pen"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                data-target="#crudServiceTypeModal" data-service-type-id="{{ -$value->id }}">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    </li>
                    @foreach ($value->childs as $child)
                    <li class="list-group-item p-0 mb-1 ml-1">
                        <div class="col-10">
                            <p class="mb-0">
                                <i class="fa-solid fa-circle"></i>
                                {{ $child->title_vi }}
                                @if (strlen($child->title_en) > 0)
                                ({{ $child->title_en }})
                                @endif
                            </p>
                        </div>
                
                        <div class="col-2 p-0">
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" 
                            data-target="#crudServiceTypeModal" data-service-type-id="{{ $child->id }}">
                                <i class="fa-solid fa-pen"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                            data-target="#crudServiceTypeModal" data-service-type-id="{{ -$child->id }}">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    </li>
                    @endforeach
                @endforeach
            </ul>
        </div>
    </div>
</div>
