<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    /*
     * Fillable fields for a photo.
     *
     * @var array
     */
	protected $table = 'photosession_photos';
    protected $fillable = ['path'];

    /**
     * A Photo belongs to a Photosession
     * @return Illuminate\Database\Eloquent\Relationships\BelongsTo
     */
    public function photosession()
    {
        return $this->belongsTo('App\PhotoSession');
    }
}
