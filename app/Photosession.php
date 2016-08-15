<?php

namespace App;

use App\Photo;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class PhotoSession extends Model
{
    /*
	 * Fillable fields for a photo.
	 *
	 * @var array
	 */
    protected $fillable = [
        'user_id',
    	'title',
    	'category',
    	'background_image_path',
    	'date_of_photosession'
    ];
    protected $table = 'photosessions';

    /**
     * A Photosession belongs to a User (client)
     * @return Illuminate\Database\Eloquent\Relationships\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * A Photosession is comprises of many photos
     * @return Illuminate\Database\Eloquent\Relationships\HasMany
     */
    public function photos()
    {
        return $this->hasMany('App\Photo', 'photosession_id');
    }

    public function setDateOfPhotosessionAttribute($date)
    {
    	$this->attributes['date_of_photosession'] = Carbon::createFromFormat('d/m/Y',$date);   
    }

    public function addPhoto(Photo $photo)
    {
        return $this->photos()->save($photo);
    }
}
