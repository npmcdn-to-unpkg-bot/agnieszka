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
            @include('admin.pages.partials.photosession-tabs.awaiting-ordered')
        </div> {{-- ./tab-pane --}}
    </div> {{-- ./tab-content --}}
</div>