@extends('admins.layouts.master')
@section('title', 'Organizational')
@section('content')
    <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <a href="{{ route(\App\Models\Organizational::INDEX) }}" class="breadcrumb-item">Organizational</a>
            </div>

            <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
        </div>
    </div>
    @livewire('organizationals.organizational-list')

    @livewire('organizationals.organizational-crud')
    @livewire('organizationals.organizational-menu')
@endsection
