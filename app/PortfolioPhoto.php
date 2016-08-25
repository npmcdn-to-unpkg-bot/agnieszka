<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class PortfolioPhoto extends Model
{
	/*
	 * Fillable fields for a photo.
	 *
	 * @var array
	 */
    protected $fillable = ['path', 'category'];

    protected $baseDir = 'images/portfolio_photos';

    public static function fromForm($category, UploadedFile $file)
    {
    	$photo = new static;

    	$name = time() . $file->getClientOriginalName();

    	$photo->path = $photo->baseDir . '/' . $name;
    	$photo->category = $category;

    	$file->move($photo->baseDir, $name);

    	$photo->save();

    	return $photo;
    }
    public function delete()
    {
        \File::delete([
            $this->path,
            $this->category
        ]);

        parent::delete();
    }
}