@extends('layouts.admin')

@section('title', 'Admin')
@section('meta_description', 'Admin dashboard')
@section('customCSS')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
@stop

@section('content')
    
    <div id="admin-dashboard">
        <div class="container-fluid">
            <div class="row">

                <div class="col-xs-12">
                    <div class="row general-infos">

                        <div class="col-xs-3 number-of-photosessions">
                            <div class="col-xs-4 icon">
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                            </div>
                            <div class="col-xs-8 data">
                                <span class="count">{{ $photosessions->count() }}</span><br>
                                <span class="title">Number of PhotoSessions</span>
                            </div>
                        </div>

                        <div class="col-xs-3 number-of-photosessions-request-submitted">
                            <div class="col-xs-4 icon">
                                {{-- <i class="fa fa-shopping-basket" aria-hidden="true"></i> --}}
                                <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                            </div>
                            <div class="col-xs-8 data">
                                <span class="count">{{ $photosessions->count() }}</span><br>
                                <span class="title">Number of PhotoSessions</span>
                            </div>
                        </div>

                        <div class="col-xs-3 number-of-photosessions-awaiting-request">
                            <div class="col-xs-4 icon">
                                <i class="fa fa-thumbs-o-down" aria-hidden="true"></i>
                            </div>
                            <div class="col-xs-8 data">
                                <span class="count">{{ $photosessions->count() }}</span><br>
                                <span class="title">Number of PhotoSessions</span>
                            </div>
                        </div>

                        <div class="col-xs-3 number-of-clients">
                            <div class="col-xs-4 icon">
                                <i class="fa fa-users" aria-hidden="true"></i>
                            </div>
                            <div class="col-xs-8 data">
                                <span class="count">{{ $users->count() }}</span><br>
                                <span class="title">Number of clients</span>
                            </div>
                        </div>

                    </div>

                    <div class="row photosessions-overview">
                        <div class="col-xs-12">
                            <ul class="portfolio-tabs" role="tablist">
                                <li role="presentation">
                                    <a href="#ps-all" aria-controls="ps-all" role="tab" data-toggle="tab">All PhotoSessions</a>
                                </li>
                                <li role="presentation">
                                    <a href="#ps-request-submitted" aria-controls="ps-request-submitted" role="tab" data-toggle="tab">Request sent</a>
                                </li>
                                <li role="presentation">
                                    <a href="#ps-request-awaiting" aria-controls="ps-request-awaiting" role="tab" data-toggle="tab">Awaiting request</a>
                                </li>
                            </ul> {{-- Tapanel tabs --}}

                            <div class="col-xs-12" role="tabpanel" class="tabpanel">
                                <div class="tab-content photosession">
                                        <div role="tabpanel" class="tab-pane" id="{{ $value }}">
                                        
                                            @if (count($photos->where('category', $value)) > 0)
                                                <div class="row masonry-container">
                                                    @foreach ($photos->where('category', $value) as $photo)
                                                        <div class="col-xs-12 col-sm-6 col-md-4 item">
                                                             @if(Auth::check() && Auth::user()->hasRole('admin'))
                                                                <div class="delete-photo">
                                                                    <form method="POST" action="/portfoliophoto/{{ $photo->id }}">
                                                                        {!! csrf_field() !!}
                                                                        <input type="hidden" name="_method" value="DELETE">

                                                                        <button type="submit" class="btn btn-danger">
                                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            @endif
                                                            <img class="lazy img-responsive" src="{{ $photo->path }}" alt="Agnieszka Krol Portfolio photo">
                                                        </div>
                                                </div> {{-- ./masonry-container --}}

                                                <div class="row photo-upload">
                                                    <div class="col-xs-12">
                                                         @include('admin/partials/forms/add_photos', ['category' => $value])
                                                    </div>
                                                    <div class="text-center col-xs-4 col-xs-offset-4">
                                                    <a href="{{ route('refresh-page') }}" role="button" class="btn btn-success refresh-page">
                                                        <i class="fa fa-refresh" aria-hidden="true"></i>
                                                    </a>
                                                    </div>
                                                </div>
                                        </div> {{-- ./tab-pane --}}
                                </div> {{-- ./portfolio-photos --}}
                </div> {{-- ./tabpanel --}}


                        </div>
                    </div>

                </div>
                
                {{--
                
                <div class="col-xs-12 col-md-12 forms">
                    <div class="form-error-msg">
                        @include('errors/errors')
                    </div>
                
                    <div class="col-md-5 add-client">
                        <div class="row">
                            <h1>Add new client</h1>
                    
                            @include('admin.partials.forms.register_new_client')
                    
                        </div>
                    </div>
                    
                    <div class="col-md-5 col-md-offset-1 add-photosession">
                        <div class="row">
                            <h1>Add new Photo Session</h1>
                    
                            @include('admin.partials.forms.add_new_photosession')
                    
                        </div>
                    </div>
                </div> --}}

            </div>
        </div>
    </div>

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