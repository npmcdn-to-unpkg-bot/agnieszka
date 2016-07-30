@extends('layouts.app')

@section('title', 'Create a new photo')
@section('meta_description', 'Create a new photo and upload it to the database')

@section('content')
    
    <div class="container">
        <div class="row">
            <h1>Upload a new photo</h1>
                <div class="row">

                    <form id="addPortfolioPhotosForm" method="POST" action="/portfolio_photos/engagement" class="dropzone col-md-6">
                        {{ csrf_field() }}
                    </form>

                </div>
        </div>
    </div>

@endsection

@section('customJS')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>
    {{-- <script>
        Dropzone.options.addPortfolioPhotosForm = {
            paramName: 'photo',
            maxFilesize: 3,
            acceptedFiles: '.jpg, .jpeg, .png, .bmp'
        }
    </script> --}}
@stop

{{-- <a href="/photo/create" class="btn btn-primary" title="create photo">Create a photo</a> --}}