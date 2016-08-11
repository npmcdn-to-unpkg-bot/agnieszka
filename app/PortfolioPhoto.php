<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class PortfolioPhoto extends Model
{
	/*
	 * Fillable fields for a photo.
	 *
	 * @var array
	 */
    protected $fillable = ['path', 'category'];

}