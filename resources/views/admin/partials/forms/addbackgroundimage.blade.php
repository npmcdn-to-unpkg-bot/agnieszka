<form 	id="addBackgroundImageToGalleryForm"
		method="POST"
		action="{{ route('add_bg_to_gallery', $photosession->id) }}"
		enctype="multipart/form-data"
		class="dropzone">
{{ csrf_field() }}
</form>