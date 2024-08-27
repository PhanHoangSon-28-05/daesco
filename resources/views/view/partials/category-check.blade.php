@inject('categoryRepo', 'App\Repositories\Categorys\CategoryRepositoryInterface')

@php
    $count = count($categoryRepo->getCateNews($parentId));
@endphp


@if ($count > 0)
    <i class="fas fa-caret-down"></i>
    </div>
    <div class="drop-lv-2"
        style="background-color: #ffffffc7; left: 15%;
       @if ($parentId == 58) width: 75%;
    @else
   width: 25%;
    left: auto;
    margin-left: -5% @endif
        ">
        <div class="drop-lv-2--inner">
            <div class="row">
                <div class="col-md col-left">
                    <div class="list-item-link-2">
                        <div class="row">
                            @include('view.partials.category-news', [
                                'parentId' => $cate->id,
                                'count' => $count,
                            ])
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endif
