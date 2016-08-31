@extends('layouts.admin')

@section('title', 'Admin Dashboard')
@section('meta_description', 'Admin Dashboard')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2" id="admin-dashboard">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active">Dashboard</li>
            </ol>
        </div> {{-- ./row --}}

        <div class="row">
            <div class="col-xs-12">
                <h1 class="page-header">Dashboard</h1>
            </div>
        </div> {{-- ./row --}}

        <div class="row general-infos">
            @include('admin.pages.partials.general-infos')
        </div>

    </div> {{-- ./admin-dashboard --}}
@endsection