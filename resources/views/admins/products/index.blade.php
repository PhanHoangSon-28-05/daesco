@extends('admins.layouts.master')

@section('title')
    Product
@endsection

@section('style')
    <script src="{{ URL::asset('admins/global_assets/js/plugins/editors/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ URL::asset('admins/global_assets/js/demo_posts/editor_ckeditor_default.js') }}"></script>
    <script src="{{ asset('admins/assets/js/tinymce/js/tinymce/tinymce.min.js') }}"></script>
@endsection

@section('content')
    <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <a href="{{ route(\App\Models\Product::INDEX) }}" class="breadcrumb-item">Products</a>
            </div>

            <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
        </div>
    </div>
    <div class="container-fluid" style="flex:1;">

        @livewire('product.product-list')

    </div>

    @livewire('product.product-crud')
    @livewire('product.product-image-crud')
@endsection

@section('script')
@endsection
