@inject('categoryRepo', 'App\Repositories\Categorys\CategoryRepositoryInterface')

@php
    $childCateNews = $categoryRepo->getCateNews($parentId);
    $num = 0;
@endphp

@foreach ($childCateNews as $value)
    @if ($num % 3 == 0)
        <div class="col-md-4 link-item">
    @endif
    <h3><a href="{{ URL::route(\App\Models\View::PAGE_CATE_PRO, $value->slug) }}">{{ $value->name_vi }}</a>
    </h3>
    @if (count($categoryRepo->getChildNew($value->id)) > 0 || count($categoryRepo->getChildPro($value->id)) > 0)
        @include('view.partials.category-child', [
            'parentId' => $value->id,
        ])
        @php
            $num += 1;
        @endphp
    @endif

    @if (($num + 1) % 3 == 0 || count($childCateNews) == count($childCateNews) - 1)
        </div>
    @endif
    @php
        $num += 1;
    @endphp
@endforeach
