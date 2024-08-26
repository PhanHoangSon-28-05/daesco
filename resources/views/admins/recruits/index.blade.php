@extends('admins.layouts.master')
@section('title', 'Recruit')

@section('style')
    <script src="{{ URL::asset('admins/global_assets/js/plugins/editors/ckeditor/ckeditor.js') }}"></script>
    {{-- <script src="{{ URL::asset('admins/global_assets/js/demo_posts/editor_ckeditor_default.js') }}"></script> --}}
    <script src="{{ asset('admins/assets/js/tinymce/js/tinymce/tinymce.min.js') }}"></script>
    <!-- <link href='https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.16.0/codemirror.css' rel='stylesheet'>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.16.0/codemirror.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.16.0/mode/htmlmixed/htmlmixed.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.16.0/mode/javascript/javascript.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.16.0/mode/xml/xml.js'></script> -->
@endsection
@section('content')
    <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <a href="{{ route(\App\Models\Recruit::INDEX) }}" class="breadcrumb-item">Recruit</a>
            </div>

            <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
        </div>
    </div>
    @livewire('recruits.recruit-list')

    @livewire('recruits.recruit-crud')
    @livewire('recruits.recruit-delete')
@endsection
