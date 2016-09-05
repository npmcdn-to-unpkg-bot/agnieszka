@if(count($photosessions->where('order',false)) > 0)
    @foreach($photosessions->where('order',false) as $photosession)
        <div class="col-xs-6 col-md-4 photosession">
            <div class="row">

                @if($photosession->background_image_path_thumbnail !== null)
                    <div class="col-xs-12 bg-img" style="background-image: url('/{{ asset($photosession->background_image_path_thumbnail) }}')">
                        <div class="overlay"></div>
                        <h3>{{ $photosession->title }}</h3>
                    </div> {{-- ./bg-img --}}
                @else
                <div class="col-xs-12 bg-img">
                    <svg class="glyph stroked landscape"><use xlink:href="#stroked-landscape"/></svg>
                </div>
                @endif

            </div> {{-- ./row --}}

            <div class="row">

                <div class="col-xs-12 details">
                    <div class="button-edit-photosession">
                        <form method="GET" action="/admin/photosessions/{{ $photosession->id }}/edit">
                            <button type="submit" class="btn btn-success">
                                <svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"/></svg>
                            </button>
                        </form>
                    </div>

                    <div class="info">
                        <div class="row meta">

                            <div class="col-xs-6 text-center">
                                <p><span>{{ count($photosession->photos) }}</span><br>Number of Photos</p>
                            </div>
                            <div class="col-xs-6 text-center">
                                <p><span>{{ $photosession->expires_in() }}</span><br>Days left to download</p>
                            </div>

                        </div> {{-- ./meta --}}

                        <div class="row info-icons">
                            
                            @include('admin.pages.partials.photosession-tabs.notifications')

                        </div> {{-- ./info-icons --}}
                    </div> {{-- ./info --}}
                </div> {{-- ./details --}}

            </div> {{-- ./row --}}
            
            <div class="row button-view-photosession">
                <a href="{{ route('client-gallery', [$photosession->user->id,$photosession->id ]) }}">Preview</a>
            </div>

        </div> {{-- ./photosession --}}
    @endforeach
@else
    <p>There is no photosession with awaiting orderes! </p>
@endif