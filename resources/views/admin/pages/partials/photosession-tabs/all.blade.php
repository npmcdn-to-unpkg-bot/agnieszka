@if(count($photosessions) > 0)
    @foreach($photosessions as $photosession)
        <div class="col-xs-6 col-sm-4 photosession">
            <div class="row">
                <div class="col-xs-12 bg-img" style="background-image: url('/{{ asset($photosession->background_image_path_thumbnail) }}')"></div>
            </div>

            <div class="row">
                <div class="col-xs-8 details">
                    <div class="info">
                        <div class="meta">
                            <span class="category">
                                <svg class="glyph stroked tag"><use xlink:href="#stroked-tag"/></svg>
                                {{ ucfirst($photosession->category) }}
                            </span>
                            <span class="date">
                                <svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"/></svg>
                                <span>{{ $photosession->date }}</span>
                            </span>
                        </div> {{-- ./meta --}}
                        <div class="title-and-name">
                            <h3>{{ $photosession->title }}</h3>
                            <h5>
                                <svg class="glyph stroked female user"><use xlink:href="#stroked-female-user"/></svg>
                                {{ $photosession->user->getFullName() }}
                            </h5>
                        </div>
                    </div> {{-- ./info --}}
                </div> {{-- ./details --}}

                {{-- <div class="controls">
                    <div class="view-photosession">
                        <form method="GET" action="{{ route('client-gallery', [$photosession->user->id,$photosession->id ]) }}">
                            <button type="submit" class="btn btn-success">
                                <svg class="glyph stroked eye"><use xlink:href="#stroked-eye"/></svg>
                            </button>
                        </form>
                    </div>
                </div> --}} {{-- ./controls --}}

            </div> {{-- ./row --}}

            <div class="button-edit-photosession">
                <form method="GET" action="/admin/photosessions/{{ $photosession->id }}/edit">
                    <button type="submit" class="btn btn-success">
                        <svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"/></svg>
                    </button>
                </form>
            </div>
        </div> {{-- ./photosession --}}
    @endforeach
@else
    <p>You have not created any photosessions yet!</p>
@endif