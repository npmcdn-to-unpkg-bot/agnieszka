@extends('layouts.admin')

@section('title', 'Admin Dashboard')
@section('meta_description', 'Admin Dashboard')

@section('customCSS')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
@stop

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

        <div class="row forms">

            <div class="col-xs-12 form-error-msg">
                @include('errors/errors')
            </div>
            @include('admin.partials.forms.add_new_photosession')

            @include('admin.partials.forms.register_new_client')
        </div> {{-- ./forms --}}

    </div> {{-- ./admin-dashboard --}}
@stop

@section('customJS')
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
    <script>
        $(function() {
            $("#date").datepicker({
                dateFormat: "dd/mm/yy"
            });
             $("#expiry_date").datepicker({
                dateFormat: "dd/mm/yy"
            });
        });
    </script>
@stop
