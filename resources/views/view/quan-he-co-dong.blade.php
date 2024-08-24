<?php
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
?>

@inject('categoryRepos', 'App\Repositories\Categorys\CategoryRepositoryInterface')

@extends('view.index')

@section('content')
    <!-- Content -->
    <main id="content-wrapper" class="relation main-v2">
        <section class="pv__activity--1 pv__relation--1"
            style="background-image: url('{{URL::asset('storages/'.$cate->image)}}')">
            <div class="container">
                <div class="content">
                    <div class="title">
                        @php($title = $categoryRepos->getCateSlug(Session::get('shareholders'))->name_vi ?? 'Quan hệ cổ đông')
                        <div class="link-title"><span><span class="breadcrumb_last" aria-current="page">{{ $title }}</span></span></div>
                        <h1>{{ $title }}</h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="pv__relation--2">
            <div class="relation-sidebar">
                <h3>
                    <a class="{{ Session::get('shareholders') == '' ? 'current' : '' }}"
                    href="{{ route('shareholders') }}">Quan hệ cổ đông</a>
                </h3>
                <ul>
                    @foreach ($categories as $category)
                    <li>
                        <a class="{{ Session::get('shareholders') == $category->slug ? 'current' : '' }}"
                        href="{{ route('shareholders', ['subCate' => $category->slug]) }}">
                            {{ $category->name_vi }}
                        </a>
                    </li>
                    @endforeach

                </ul>
            </div>
            <div class="content-relation">
                <div class="container">
                    <div class="relation-list">
                        <div class="relation-title">
                            <h2>{{ $title }}</h2>
                            <div class="right-order">
                                <span><i class="icon-filter4"></i>Lọc theo năm:</span>
                                <select id="filter_nam_ph">
                                    <option value="">Tất cả</option>
                                    @foreach ($years as $year)
                                    <option value="{{ $year->name }}" {{ $year->name == $selected_year ? 'selected' : '' }}>
                                        {{ $year->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="relation-table">
                            @if ($documents->count() > 0)
                            <table class="table-list">
                                <thead>
                                    <tr>
                                        <th class="text-left">Tên báo cáo</th>
                                        <th class="text-center">Ngày phát hành</th>
                                        <th class="text-center">Lượt tải</th>
                                        <th class="text-center">Tải xuống</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($documents as $document)
                                    <tr>
                                        <td><i class="icon-file-download"></i>{{ $document->title ?? 0 }}</td>
                                        <td class="text-center">
                                            {{ Carbon::parse($document->created_at ?? '1-1-1999')->format('d/m/Y') }}
                                        </td>
                                        <td class="text-center">{{ $document->download_count ?? 0 }}</td>
                                        <td class="text-center">
                                            <a class="download_tailieu" data-id="{{ $document->id }}" href="{{ Storage::url($document->file) }}">
                                            <i class="icon-download4"></i>Download</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                            <div class="row" style="height: 50vh">
                                <h5 class="text-center w-100">(Không tìm thấy tài liệu)</h5>
                            </div>
                            @endif
                            <div class="parag">
                                {!! $documents->appends(Request::all())->links('helpers.paginate') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

{{ Session::forget('shareholders') }}

@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.download_tailieu').click(function(e) {
            let documentId = e.target.getAttribute('data-id') ?? 0;
            $.ajax({
                url: "{{ route('document.add-download-count') }}",
                method: 'GET',
                data: {
                    document_id: documentId
                },
            })
        })
    })
</script>
@endpush
