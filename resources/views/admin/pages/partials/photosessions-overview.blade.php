<div class="col-xs-12">
    <ul id="tabs" class="nav nav-tabs">
        <li class="active"><a href="#ps-all" data-toggle="tab">All</a></li>
        <li><a href="#ps-ordered" data-toggle="tab">Ordered</a></li>
        <li><a href="#ps-awaiting-order" data-toggle="tab">Awaiting order</a></li>
    </ul> {{-- Tapanel nav-tabs --}}

    <div class="tab-content">
        <div class="tab-pane fade in active" id="ps-all">
            @include('admin.pages.partials.photosession-tabs.all')
        </div> {{-- ./tab-pane --}}

        <div class="tab-pane fade" id="ps-ordered">
            @include('admin.pages.partials.photosession-tabs.ordered')
        </div> {{-- ./tab-pane --}}

        <div class="tab-pane fade" id="ps-awaiting-order">
            @if(count($photosessions->where('order',false)) > 0)
                <div class="row">
                    @foreach($photosessions->where('order',false) as $photosession)
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
                                <span>{{ $photosession->date }}</span>
                            </div>
                        </div> {{-- ./photosession --}}
                    @endforeach
                </div> {{-- ./row --}}
            @else
            <p>There is no photosession with awaiting orderes! </p>
            @endif
        </div> {{-- ./tab-pane --}}
    </div> {{-- ./tab-content --}}
</div>