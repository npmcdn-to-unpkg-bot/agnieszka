<div class="col-xs-12 col-md-6">
    <div class="panel panel-blue panel-widget">
        <div class="row no-padding">
            <div class="col-sm-3 col-lg-5 widget-left">
                <svg class="glyph stroked camera "><use xlink:href="#stroked-camera"/></svg>
            </div>
            <div class="col-sm-9 col-lg-7 widget-right">
                <div class="large">{{ $photosessions->count() }}</div>
                <div class="text-muted">PhotoSessions</div>
            </div>
        </div>
    </div>
</div>

<div class="col-xs-12 col-md-6 number-of-photosessions-request-submitted">
    <div class="panel panel-teal panel-widget">
        <div class="row no-padding">
            <div class="col-sm-3 col-lg-5 widget-left">
                <svg class="glyph stroked basket "><use xlink:href="#stroked-basket"/></svg>
            </div>
            <div class="col-sm-9 col-lg-7 widget-right">
                <div class="large">{{ \App\Photosession::requestSubmitted()->count() }}</div>
                <div class="text-muted">Submitted requested</div>
            </div>
        </div>
    </div>
</div>

<div class="col-xs-12 col-md-6 number-of-photosessions-request-awaiting">
    <div class="panel panel-red panel-widget">
        <div class="row no-padding">
            <div class="col-sm-3 col-lg-5 widget-left">
                <svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"/></svg>
            </div>
            <div class="col-sm-9 col-lg-7 widget-right">
                <div class="large">{{ \App\Photosession::awaitingRequest()->count() }}</div>
                <div class="text-muted">Awaiting requests</div>
            </div>
        </div>
    </div>
</div>

<div class="col-xs-12 col-md-6 number-of-clients">
    <div class="panel panel-green panel-widget">
        <div class="row no-padding">
            <div class="col-sm-3 col-lg-5 widget-left">
                <svg class="glyph stroked female user "><use xlink:href="#stroked-female-user"/></svg>
            </div>
            <div class="col-sm-9 col-lg-7 widget-right">
                <div class="large">{{ $users->count() }}</div>
                <div class="text-muted">Clients</div>
            </div>
        </div>
    </div>
</div>