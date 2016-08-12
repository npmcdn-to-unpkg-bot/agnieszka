<form 	id="addPortfolioPhotosForm"
		method="POST"
		action="{{ route('store_photo', $category) }}"
		enctype="multipart/form-data"
		class="dropzone">
{{ csrf_field() }}
</form>