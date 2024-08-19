@inject('categoryRepo', 'App\Repositories\Categorys\CategoryRepositoryInterface')

@php
    $childCateNews = $categoryRepo->getCateNews($parentId);
@endphp

@foreach ($childCateNews as $value)
    <div class="col-md-3 link-item">
        @if (Route::has($value->slug))
            <h3><a href="{{ URL::route($value->slug) }}">{{ $value->name_vi }}</a></h3>
        @else
            <h3>{{ $value->name_vi }}</h3>
        @endif

        @if (count($categoryRepo->getChildNew($value->id)) > 0)
            @include('view.partials.category-child', [
                'parentId' => $value->id,
            ])
        @endif
    </div>
@endforeach
