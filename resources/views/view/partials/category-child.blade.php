@inject('categoryRepo', 'App\Repositories\Categorys\CategoryRepositoryInterface')

@php
    $subCate = $categoryRepo->find($parentId);
    $childCategories = $categoryRepo->getChildNew($parentId);
@endphp

<ul>
    @if (in_array($subCate->slug, ['tong-quan', 'about-us']))
    <li>
        <a href="{{ URL::route('about-us', '#gt1') }}">Giới thiệu chung</a>
    </li>
    <li>
        <a href="{{ URL::route('about-us', '#gt2') }}">Lĩnh vực hoạt động</a>
    </li>
    @elseif (in_array($subCate->slug, ['bo-may-phat-trien', 'development-apparatus']))
    <li>
        <a href="{{ URL::route('development-apparatus', '#about2') }}">Quá trình phát triển</a>
    </li>
    <li>
        <a href="{{ URL::route('development-apparatus', '#activity-4b') }}">Cơ cấu tổ chức</a>
    </li>
    <li>
        <a href="{{ URL::route('development-apparatus', '#about4') }}">Sơ đồ tổ chức</a>
    </li>
    <li>
        <a href="{{ URL::route('development-apparatus', '#about5') }}">Hệ thống đại lý</a>
    </li>
    @else
    @foreach ($childCategories as $childCategory)
<<<<<<< HEAD
        @if ($parentId == 57)
            <li>
                <a
                    href="{{ URL::route('development-apparatus', '#' . $childCategory->slug) }}">{{ $childCategory->name_vi }}</a>
            </li>
        @else
            <li>
                <a href="">{{ $childCategory->name_vi }}</a>
            </li>
        @endif
=======
    <li>
        <a href="#!">{{ $childCategory->name_vi }}</a>
    </li>
>>>>>>> 4b7772c76ffb598e79cb5b5c8e789360cf21d5ed
    @endforeach
    @endif
</ul>
