<?php

namespace App;

use Image;
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
    protected $fillable = ['path', 'name', 'thumbnail_path'];

    /*
     * The base directory where photos are stored.
     *
     * @var string
     */
    protected $photosBaseDir = 'images/photosessions/photos';

    /**
     * A Photo belongs to a Photosession
     * @return Illuminate\Database\Eloquent\Relationships\BelongsTo
     */
    public function photosession()
    {
        return $this->belongsTo('App\PhotoSession');
    }
    /**
     * Build a new photo instance from a file upload
     * @param  string $name
     * @return self
     */
    public static function named($name)
    {
        return (new static)->saveAs($name);
    }

    protected function saveAs($name)
    {
        $this->name = sprintf("%s-%s", time(), $name);
        $this->path = sprintf("%s/%s", $this->photosBaseDir, $this->name);
        $this->thumbnail_path = sprintf("%s/tn-%s", $this->photosBaseDir, $this->name);

        return $this;
    }

    public function move(UploadedFile $file)
    {
        $file->move($this->photosBaseDir, $this->name);

        $this->makeThumbnail();

        return $this;
    }

    protected function makeThumbnail()
    {
        Image::make($this->path)
            ->fit(200)
            ->save($this->thumbnail_path); // save() is an Image Intervention method, not Laravels.
    }
    public function delete()
    {
        \File::delete([
            $this->path,
            $this->thumbnail_path
        ]);

        parent::delete();
    }
}
