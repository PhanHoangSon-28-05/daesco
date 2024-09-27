@extends('admins.layouts.master')
@section('title', 'Service Type')
@section('content')
    <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <a href="{{ route(\App\Models\ServiceType::INDEX) }}" class="breadcrumb-item">Service Types</a>
            </div>

            <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
        </div>
    </div>
    @livewire('service-types.service-type-list')

    @livewire('service-types.service-type-crud')
@endsection
