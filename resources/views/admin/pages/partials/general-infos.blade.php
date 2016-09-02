<div class="col-xs-12 col-md-6 col-lg-3">
    <div class="panel panel-blue panel-widget">
        <div class="row no-padding">
            <div class="col-sm-3 col-lg-4 widget-left">
                <svg class="glyph stroked camera "><use xlink:href="#stroked-camera"/></svg>
            </div>
            <div class="col-sm-9 col-lg-8 widget-right">
                <div class="large">{{ $photosessions }}</div>
                <div class="text-muted">PhotoSessions</div>
            </div>
        </div>
    </div>
</div>

<div class="col-xs-12 col-md-6 col-lg-3">
    <div class="panel panel-teal panel-widget">
        <div class="row no-padding">
            <div class="col-sm-3 col-lg-4 widget-left">
                <svg class="glyph stroked basket "><use xlink:href="#stroked-basket"/></svg>
            </div>
            <div class="col-sm-9 col-lg-8 widget-right">
                <div class="large">{{ $ordered }}</div>
                <div class="text-muted">Orders</div>
            </div>
        </div>
    </div>
</div>

<div class="col-xs-12 col-md-6 col-lg-3">
    <div class="panel panel-red panel-widget">
        <div class="row no-padding">
            <div class="col-sm-3 col-lg-4 widget-left">
                <svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"/></svg>
            </div>
            <div class="col-sm-9 col-lg-8 widget-right">
                <div class="large">{{ $awaiting_orders }}</div>
                <div class="text-muted">Awaiting orders</div>
            </div>
        </div>
    </div>
</div>

<div class="col-xs-12 col-md-6 col-lg-3 number-of-clients">
    <div class="panel panel-pink panel-widget">
        <div class="row no-padding">
            <div class="col-sm-3 col-lg-4 widget-left">
                <svg class="glyph stroked female user "><use xlink:href="#stroked-female-user"/></svg>
            </div>
            <div class="col-sm-9 col-lg-8 widget-right">
                <div class="large">{{ $clients }}</div>
                <div class="text-muted">Clients</div>
            </div>
        </div>
    </div>
</div>