@inject('categoryRepo', 'App\Repositories\Categorys\CategoryRepositoryInterface')

@php
    $count = count($categoryRepo->getCateNews($parentId));
@endphp


@if ($count > 0)
    <i class="fas fa-caret-down"></i>
    </div>
    <div class="drop-lv-2"
        style="background-image: url('{{ URL::asset('view/style/themes/wecangroup-child/dist/images/bg-menu.png') }}');
       @if ($count == 2) width: 50%;
    left: auto;
@elseif ($count == 3)
    width: 75%;
    left: 0;
@elseif ($count > 4)
   width: 100%;
    left: 0;
    @elseif ($count > 4) @endif
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
