@extends('layouts.app')

@section('title', 'Admin')
@section('meta_description', 'Admin dashboard')

@section('content')
    
    <section id="admin-dashboard">

        <div class="col-md-8 col-md-offset-2 add-client">
            <div class="row">
                <h1>Add new client</h1>
                
                @include('errors.errors')
                @include('admin.partials.forms.register_new_client')

            </div>
        </div>

        <div class="col-md-8 col-md-offset-2 add-photosession">
            <div class="row">
                <h1>Add new Photo Session</h1>
                
                @include('errors.errors')
                @include('admin.partials.forms.add_new_photosession')

            </div>
        </div>
        
    </section>

@endsection

@section('customJS')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>
    <script>
        Dropzone.options.addPortfolioPhotosForm = {
            paramName: 'photo',
            maxFilesize: 3,
            acceptedFiles: '.jpg, .jpeg, .png, .bmp'
        }
    </script>
@stop