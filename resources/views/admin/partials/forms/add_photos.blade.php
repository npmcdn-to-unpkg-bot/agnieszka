<form id="addPortfolioPhotosForm" method="POST" action="/admin/portfolio_photos/{{  $category }}" enctype="multipart/form-data" class="dropzone">
{{ csrf_field() }}
</form>