@inject('categoryRepo', 'App\Repositories\Categorys\CategoryRepositoryInterface')

@php
    $conut = count($categoryRepo->getCateNews($parentId));
@endphp

@if ($conut > 0)
    <i class="fas fa-caret-down"></i>
    </div>
    <div class="drop-lv-2"
        style="background-image: url('{{ URL::asset('view/style/themes/wecangroup-child/dist/images/bg-menu.png') }}');">
        <div class="drop-lv-2--inner">
            <div class="row">
                <div class="col-md col-left">
                    <div class="list-item-link-2">
                        <div class="row">
                            @include('view.partials.category-news', [
                                'parentId' => $cate->id,
                            ])
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endif
