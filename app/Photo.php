<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Photo extends Model
{
    /*
     * Fillable fields for a photo.
     *
     * @var array
     */
	protected $table = 'photosession_photos';
    protected $fillable = ['path'];

    protected $photosBaseDir = 'images/photosessions/photos';

    /**
     * A Photo belongs to a Photosession
     * @return Illuminate\Database\Eloquent\Relationships\BelongsTo
     */
    public function photosession()
    {
        return $this->belongsTo('App\PhotoSession');
    }

    public static function fromPhotoSessionPhotoForm(UploadedFile $file)
    {
        $photo = new static;

        $name = time() . $file->getClientOriginalName();

        $photo->path = $photo->photosBaseDir . '/' . $name;

        $file->move($photo->photosBaseDir, $name);

        return $photo;
    }
}
