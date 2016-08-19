@extends('layouts.app')

@section('title', 'Admin')
@section('meta_description', 'Admin dashboard')
@section('customCSS')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
@stop

@section('content')
    
    <section id="admin-dashboard">

        <div class="col-xs-12 col-md-10 col-md-offset-1 top-nav">
            <ul class="inline">
                <li>All PhotoSessions: {{ $photosessions->count() }}</li>
                <li>List of clients: {{ $users->count() }}</li>
                <li>List of submitted requests</li>
                <li>List of awaiting requests</li>
            </ul>
        </div>
        
        <div class="col-xs-12 col-md-12 forms">
            <div class="form-error-msg">
                @include('errors/errors')
            </div>
        
            <div class="col-md-6 add-client">
                <div class="row">
                    <h1>Add new client</h1>
            
                    @include('admin.partials.forms.register_new_client')
            
                </div>
            </div>
            
            <div class="col-md-6 add-photosession">
                <div class="row">
                    <h1>Add new Photo Session</h1>
            
                    @include('admin.partials.forms.add_new_photosession')
            
                </div>
            </div>
        </div>
        
    </section>

@endsection

@section('customJS')
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>
    <script src="{{ asset('js/libs.js') }}"></script>
    <script>
        $( function() {
            Dropzone.options.addPhotoSessionPhotosForm = {
                paramName: 'photo',
                maxFilesize: 3,
                acceptedFiles: '.jpg, .jpeg, .png, .bmp'
            };

            $("#datepicker").datepicker({
                dateFormat: "dd/mm/yy"
            });
        });
    </script>
@stop