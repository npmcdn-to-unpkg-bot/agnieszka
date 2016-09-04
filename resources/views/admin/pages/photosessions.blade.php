@extends('layouts.admin')

@section('title', 'Photosessions')
@section('meta_description', 'List of all Photosessions by Agnieszka Krol')
@section('customCSS')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css">
@stop

@section('content')
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2" id="index-of-photosessions">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active">Photosessions</li>
            </ol>
        </div> {{-- ./row --}}

        <div class="row">
            <div class="col-xs-12">
                <h1 class="page-header">Photosessions</h1>
            </div>
        </div> {{-- ./row --}}

        <div class="row photosessions-overview">
            @include('admin.pages.partials.photosessions-overview')
        </div>
        
    </div> {{-- ./photosessions --}}
@stop