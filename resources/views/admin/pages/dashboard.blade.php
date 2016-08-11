@extends('layouts.app')

@section('title', 'Admin')
@section('meta_description', 'Admin dashboard')

@section('content')

<div class="container">
    <div class="row">

    	<div class="col-md-6 col-md-offset-3">

	    	@if (count($errors) > 0)
		        <div class="alert alert-danger">
		            <ul>
		                @foreach ($errors->all() as $error)
		                    <li>{{ $error }}</li>
		                @endforeach
		            </ul>
		        </div>
    		@endif

    	</div>

    </div> {{-- ./row --}}
</div> {{-- ./container --}}

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