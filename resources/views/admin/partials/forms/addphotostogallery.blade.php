<form 	id="addPhotosToGallery"
		method="POST"
		action="{{ route('add_photos_to_gallery', $photosession->id) }}"
		enctype="multipart/form-data"
		class="dropzone">
{{ csrf_field() }}
</form>