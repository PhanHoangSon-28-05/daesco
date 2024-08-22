<div class="d-flex align-items-stretch align-items-lg-start flex-column flex-lg-row p-2">

    <!-- Left content -->
    <div class="flex-1 order-2 order-lg-1">

        <!-- Post grid -->
        <div class="row">
            <div class="col-lg-4">
                <div class="card cursor-pointer" style="aspect-ratio: 2 / 3;" data-toggle="modal" data-target="#crudPostModal">
                    <div class="card-body">
                        <div class="row rounded h-100 align-items-center" style="border:5px dashed lightgray;">
                            <div class="col text-center">
                                <i class="icon-plus-circle2" style="color:lightgray;font-size:5vw"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if ($posts && $posts->count() > 0)
            @foreach ($posts as $post)
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body" style="aspect-ratio: 2 / 3;">
                        <div class="card-img-actions mb-3">
                            <img class="card-img img-fluid" style="aspect-ratio: 3 / 2;"
                            src="{{ (isset($post->pic) && $post->pic != '') ? asset('storage/'.$post->pic) : asset('images/placeholder/placeholder.png') }}" alt="">
                        </div>

                        <h5 class="font-weight-semibold mb-1">
                            <a href="#" class="text-body" style="display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden">
                                {{ $post->name_vi ?? '' }}
                            </a>
                        </h5>

                        <ul class="list-inline list-inline-dotted text-muted mb-3">
                            <li class="list-inline-item">{{ $post->category->name_vi ?? '' }}</li>
                            <li class="list-inline-item"></li>
                        </ul>

                        <div style="display:-webkit-box;-webkit-line-clamp:4;-webkit-box-orient:vertical;overflow:hidden">
                            {{ $post->description_vi }}
                        </div>
                    </div>

                    <div class="card-footer d-flex">
                        {{-- <a href="#" class="text-body"><i class="icon-heart6 text-pink mr-2"></i></a> --}}
                        {{-- <a href="#" class="ml-auto">Read more <i class="icon-arrow-right8 ml-2"></i></a> --}}
                        <div class="list-icons list-icons-extended ml-auto">
                            <a href="#" class="list-icons-item" data-toggle="modal" 
                            data-target="#crudPostModal" data-post-id={{ $post->id }}>
                                <i class="icon-pencil top-0"></i>
                            </a>
                            <a href="#" class="list-icons-item" data-toggle="modal"
                            data-target="#crudPostModal" data-post-id={{ -$post->id }}>
                                <i class="icon-bin top-0"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
        <!-- /post grid -->


        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-3 mb-3">
            {{-- <ul class="pagination">
                <li class="page-item"><a href="#" class="page-link"><i class="icon-arrow-left8"></i></a></li>
                <li class="page-item active"><a href="#" class="page-link">1</a></li>
                <li class="page-item"><a href="#" class="page-link">2</a></li>
                <li class="page-item"><a href="#" class="page-link">3</a></li>
                <li class="page-item"><a href="#" class="page-link">4</a></li>
                <li class="page-item"><a href="#" class="page-link">5</a></li>
                <li class="page-item"><a href="#" class="page-link"><i class="icon-arrow-right8"></i></a></li>
            </ul> --}}
            {{ $posts->links('helpers.livewire-paginate') }}
        </div>
        <!-- /pagination -->

    </div>
    <!-- /left content -->


    <!-- Right sidebar component -->
    <div class="sidebar sidebar-light bg-transparent sidebar-component sidebar-component-right border-0 shadow-none order-1 order-lg-2 sidebar-expand-lg">

        <!-- Sidebar content -->
        <div class="sidebar-content">

            <!-- Search -->
            <div class="card">
                <div class="card-header bg-transparent">
                    <span class="card-title font-weight-semibold">Tìm kiếm</span>
                </div>

                <div class="card-body">
                    <form action="#">
                        <div class="form-group-feedback form-group-feedback-right">
                            <input type="search" class="form-control" placeholder="Search..." wire:model.live="name">
                            <div class="form-control-feedback">
                                <i class="icon-search4 font-size-base text-muted"></i>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /search -->


            <!-- Categories -->
            <div class="card">
                <div class="card-header bg-transparent">
                    <span class="card-title font-weight-semibold">Danh mục</span>
                </div>

                <div class="card-body p-0">
                    <div class="nav nav-sidebar my-2">
                        <li class="nav-item" wire:click.prevent="$set('category_id', '')">
                            <a href="#" class="nav-link">
                                Tất cả
                                <span class="text-muted font-size-sm font-weight-normal ml-auto" wire:ignore>
                                    {{ $posts->total() }}
                                </span>
                            </a>
                        </li>
                        @foreach ($cates as $cate)
                        <li class="nav-item" wire:click.prevent="$set('category_id', {{ $cate->id }})">
                            <a href="#" class="nav-link">
                                <span class="mr-2">
                                    {{ $cate->name_vi }}
                                </span>
                                <span class="text-muted font-size-sm font-weight-normal ml-auto">
                                    {{ $cate->posts->count() }}
                                </span>
                            </a>
                        </li>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- /categories -->

        </div>
        <!-- /sidebar content -->

    </div>
    <!-- /right sidebar component -->

</div>