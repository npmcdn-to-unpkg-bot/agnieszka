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
        'background_image_path_thumbnail',
    	'date',
        'photo_download_limit',
        'published',
        'ordered',
        'has_permission_to_download',
        'purchased',
        'expiry_date'
    ];
    
    protected $table = 'photosessions';
    protected $dates = ['created_at', 'updated_at', 'date', 'expiry_date'];

    public function setDateAttribute($date) {
        $this->attributes['date'] = Carbon::createFromFormat('d/m/Y', $date);
    }

    public function setExpiryDateAttribute($date) {
        $this->attributes['expiry_date'] = Carbon::createFromFormat('d/m/Y', $date);
    }

    public function getDate()
    {
        return $this->date->toDateString();
    }

    public function getExpiryDate()
    {
        return $this->expiry_date->toDateTimeString();
    }

    public function expires_in()
    {
        return Carbon::now()->diffInDays($this->expiry_date);
    }
    
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

    /**
     * Photos has been ordered by the client
     * @return boolean
     */
    public function ordered()
    {
        return $this->ordered;
    }

    /**
     * Photosession has permission to be downloadable by the client
     * @return boolean
     */
    public function has_permission_to_download()
    {
        return $this->has_permission_to_download;
    }

    /**
     * Photos has been purchased.
     * @return boolean
     */
    public function purchased()
    {
        return $this->purchased;
    }

    /**
     * Client of the photosession has been notified via email.
     * @return boolean
     */
    public function published()
    {
        return $this->published;
    }

    public function photo_download_limit()
    {
        $this->photo_download_limit;
    }

    public function addPhoto(Photo $photo)
    {
        return $this->photos()->save($photo);
    }
}
