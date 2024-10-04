@inject('categoryRepo', 'App\Repositories\Categorys\CategoryRepositoryInterface')

@php
    $subCate = $categoryRepo->find($parentId);
    $childCategories = $categoryRepo->getChildNew($parentId);
@endphp

<ul class="text-bold" style="font-weight: bold !important">
    {{-- @if (in_array($subCate->slug, ['tong-quan', 'about-us']))
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
    <li>
        <a href="#!">{{ $childCategory->name_vi }}</a>
    </li>
    @endif --}}
    @foreach ($childCategories as $childCategory)
        @if ($parentId == 74)
            @if ($childCategory->id == 66)
                    <h3>
                        <a href="{{ URL::route('home', '#' . $childCategory->slug) }}" 
                            style="font-weight: bold !important">{{ $childCategory->name_vi }}</a>
                    </h3>
            @else
                    <h3>
                        <a href="{{ URL::route('about-us', '#' . $childCategory->slug) }}" 
                            style="font-weight: bold !important">{{ $childCategory->name_vi }}</a>
                    </h3>
            @endif
        @elseif ($parentId == 57)
                <h3>
                    <a
                        href="{{ URL::route('development-apparatus', '#' . $childCategory->slug) }}" 
                        style="font-weight: bold !important">{{ $childCategory->name_vi }}</a>
                </h3>
        @else
                <h3>
                    <a href="" style="font-weight: bold !important">{{ $childCategory->name_vi }}</a>
                </h3>
        @endif
    @endforeach
</ul>
