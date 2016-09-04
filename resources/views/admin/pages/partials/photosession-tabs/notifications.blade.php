<div class="col-xs-4">
    @if($photosession->published())
        <svg class="glyph stroked email color-teal"><use xlink:href="#stroked-email"/></svg>
        <span class="color-teal">Published</span>
    @else
        <svg class="glyph stroked open letter color-red"><use xlink:href="#stroked-open-letter"/></svg>
        <span class="color-red">Unpublished</span>
    @endif
</div>

<div class="col-xs-4">
    @if($photosession->ordered())
        <svg class="glyph stroked basket color-teal"><use xlink:href="#stroked-basket"/></svg>
        <span class="color-teal">Ordered</span>
    @else
        <svg class="glyph stroked hourglass color-red"><use xlink:href="#stroked-hourglass"/></svg>
        <span class="color-red">Unordered</span>
    @endif
</div>

<div class="col-xs-4">
    @if($photosession->purchased())
        <svg class="glyph stroked checkmark color-teal"><use xlink:href="#stroked-checkmark"/></svg>
        <span class="color-teal">Purchased</span>
    @else
        <svg class="glyph stroked cancel color-red"><use xlink:href="#stroked-cancel"/></svg>
        <span class="color-red">Unpurchased</span>
    @endif
</div>
<div class="clearfix"></div>
<div class="col-xs-6">
    <svg class="glyph stroked tag"><use xlink:href="#stroked-tag"/></svg>
   <span>{{ $photosession->category }}</span>
</div>

<div class="col-xs-6">
    <svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"/></svg>
    <span>{{ $photosession->getDate() }}</span>
</div>