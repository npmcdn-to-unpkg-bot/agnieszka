<div class="col-xs-12">
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active">
            <a href="#ps-all" aria-controls="ps-all" role="tab" data-toggle="tab">All</a>
        </li>
        <li role="presentation">
            <a href="#ps-request-submitted" aria-controls="ps-request-submitted" role="tab" data-toggle="tab">Requests sent</a>
        </li>
        <li role="presentation">
            <a href="#ps-request-awaiting" aria-controls="ps-request-awaiting" role="tab" data-toggle="tab">Awaiting requests</a>
        </li>
    </ul> {{-- Tapanel tabs --}}

    <div role="tabpanel" class="tabpanel">
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="ps-all">
                @include('admin.pages.partials.photosession-tabs.all')
            </div> {{-- ./tab-pane --}}

            <div role="tabpanel" class="tab-pane fade" id="ps-request-submitted">
                @if(count($photosessions->where('request_submitted',1)) > 0)
                    <div class="row">
                        @foreach($photosessions->where('request_submitted',1) as $photosession)
                            <div class="col-xs-6 col-sm-4 col-lg-3 photosession">
                                <div class="controls">
                                    <div class="edit-photosession">
                                        <form method="GET" action="/admin/photosessions/{{ $photosession->id }}/edit">
                                            <button type="submit" class="btn btn-success">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="view-photosession">
                                        <form method="GET" action="/admin/photosessions/{{ $photosession->id }}">
                                            <button type="submit" class="btn btn-success">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="banner" style="background-image: url('/{{ asset($photosession->background_image_path_thumbnail) }}')"></div>
                                <div class="title">{{ $photosession->title }}</div>
                                <div class="client">{{ $photosession->user->getFullName() }}</div>
                                @if(count($photosession->photos) > 0)
                                    <div class="row photos">
                                        @foreach($photosession->photos as $photo)
                                            <div class="col-md-6">
                                                <img class="img-responsive" src="{{ $photo->thumbnail_path }}" width="100" height="100">
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                                <div class="footer">
                                    <span>{{ $photosession->category }}</span>
                                    <span>{{ $photosession->date_of_photosession }}</span>
                                </div>
                            </div> {{-- ./photosession --}}
                        @endforeach
                    </div> {{-- ./row --}}
                @else
                <p>There is no photosession with submitted request! </p>
                @endif
            </div> {{-- ./tab-pane --}}

            <div role="tabpanel" class="tab-pane fade" id="ps-request-awaiting">
                @if(count($photosessions->where('request_submitted',0)) > 0)
                    <div class="row">
                        @foreach($photosessions->where('request_submitted',0) as $photosession)
                            <div class="col-xs-6 col-sm-4 col-lg-3 photosession">
                                <div class="controls">
                                    <div class="edit-photosession">
                                        <form method="GET" action="/admin/photosessions/{{ $photosession->id }}/edit">
                                            <button type="submit" class="btn btn-success">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="view-photosession">
                                        <form method="GET" action="/admin/photosessions/{{ $photosession->id }}">
                                            <button type="submit" class="btn btn-success">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="banner" style="background-image: url('/{{ asset($photosession->background_image_path_thumbnail) }}')"></div>
                                <div class="title">{{ $photosession->title }}</div>
                                <div class="client">{{ $photosession->user->getFullName() }}</div>
                                @if(count($photosession->photos) > 0)
                                    <div class="row photos">
                                        @foreach($photosession->photos as $photo)
                                            <div class="col-md-6">
                                                <img class="img-responsive" src="{{ $photo->thumbnail_path }}" width="100" height="100">
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                                <div class="footer">
                                    <span>{{ $photosession->category }}</span>
                                    <span>{{ $photosession->date_of_photosession }}</span>
                                </div>
                            </div> {{-- ./photosession --}}
                        @endforeach
                    </div> {{-- ./row --}}
                @else
                <p>There is no photosession with awaiting request! </p>
                @endif
            </div> {{-- ./tab-pane --}}
        </div> {{-- ./tab-content --}}
    </div> {{-- ./tabpanel --}}
</div>